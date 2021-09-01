<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Order;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getUniqueProducts()
    {
        if(empty(Auth::guard('buyer')->id()))
        {
            return redirect('auth');
        }
        $items = \Cart::session(Auth::guard('buyer')->id())->getContent();
        return view('cart', compact('items'));
    }
    public function orderUniqueProducts(Request $request)
    {
        if($request->has('order')) {
            foreach (\Cart::session(Auth::guard('buyer')->id())->getContent() as $item) 
            {
                $product = Products::where('name', '=', $item->associatedModel->name)->where('color', '=', $item->associatedModel->color)->get()[0]['actual_stock'];
                if($product <= 0){
                    return redirect()->back()->with('error', 'Sajnos a kívánt termékek közül nincs a következőből készleten: ' . $item->associatedModel->name . ' - ' . $item->associatedModel->color);
                }
                else if($product < $item->quantity)
                {
                    return redirect()->back()->with('error', 'A következő termékből elérhető darabszám: ' . $item->associatedModel->name . ' - ' . $item->associatedModel->color . ': ' . $product . '. A kívánt darabszám: ' . $item->quantity );
                }
            }

            $items = \Cart::session(Auth::guard('buyer')->id())->getContent();
            $total_gross = \Cart::session(Auth::guard('buyer')->id())->getTotal();
            $total_net = \Cart::session(Auth::guard('buyer')->id())->getTotal() / 1.27;
            $invoice = Invoice::create(['invoice_number' => rand(111111,999999), 'billed' => 0]);
            $orders = Order::create([
            'order_number' => $invoice->id,
            'user_id' => Users::where('buyer_id' , '=', Auth::guard('buyer')->user()->id)->get()[0]['id'],
            'direction' => 0,
            'net_sum' => \Cart::session(Auth::guard('buyer')->id())->getTotal() / 1.27,
            'gross_sum' => \Cart::session(Auth::guard('buyer')->id())->getTotal(),
            'VAT_sum' => 27,
            'delivered' => 0,
            'invoice_id' => $invoice->id
            ]);

            foreach ($items as $item) {
                Item::create([
                    'order_id' => $orders->id,
                    'product_id' => $item->associatedModel->id,
                    'quantity' => $item->quantity
                ]);
                $currentQuantity = Products::where('name', '=', $item->associatedModel->name)
                ->where('color', '=', $item->associatedModel->color)
                ->get()[0]['actual_stock'] -= $item->quantity;

                DB::update('update products set actual_stock = ' . $currentQuantity . ' where name = ? and color = ?', [$item->associatedModel->name, $item->associatedModel->color]);
                \Cart::session(Auth::guard('buyer')->id())->remove($item->id);
            }

            Mail::to(Auth::guard('buyer')->user()->email)->send(new OrderMail(['name' => Auth::guard('buyer')->user()->username, 'items' => $items,
            'gross' => $total_gross, 'net' => $total_net]));

            return redirect()->back()->with('success', 'A termékek sikeresen megrendelve!');
        }
        else if($request->has('delete'))
        {
            \Cart::session(Auth::guard('buyer')->id())->remove($request->id);
        }
    }
    public function removeProduct($id)
    {
        \Cart::session(Auth::guard('buyer')->id())->remove($id);
        return redirect()->back();
    }
    public function updateProductQuantity($id)
    {
        \Cart::session(Auth::guard('buyer')->id())->update($id,[
            'quantity' => 1,
        ]);
        return redirect()->back();
    }
    public function minusProductQuantity($id)
    {
        \Cart::session(Auth::guard('buyer')->id())->update($id,[
            'quantity' => -1,
        ]);
        return redirect()->back();
    }
}