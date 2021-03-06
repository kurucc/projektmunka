<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{
    public function showUniqueProducts($name, $color)
    {
        $currentProduct = DB::table('products')
        ->where('color', '=', $color)
        ->where('name', '=', $name)
        ->get();

        if(count($currentProduct) < 1)
        {
            return redirect('404');
        }
        $products        = Products::all()->toArray();
        $selectedId      = $currentProduct[0]->id;
        $selectedProduct = $currentProduct;

        $productSimilarity = new \App\ProductSimilarity($products);
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);
        return view('product', compact('selectedProduct', 'products'));
    }
    public function saveToCart($name, $color, Request $request)
    {
        if(empty(Auth::guard('buyer')->id()))
        {
            return redirect('auth');
        }

        $id = DB::table('products')
        ->where('color', '=', $color)
        ->where('name', '=', $name)
        ->get()[0]->id;

        $products = Products::find($id);
        $rowId = rand(0,9999999999);
        $userID = Auth::guard('buyer')->id();
        $items = \Cart::session(Auth::guard('buyer')->id())->getContent();
        foreach ($items as $item) {
            if(($item->associatedModel->color == $request->color) && ($item->name == $request->name))
            {
                \Cart::session(Auth::guard('buyer')->id())->update($item->id,[
                    'quantity' => $request->mennyiség,
                ]);
                return redirect('cart');
            }
        }
        if(empty($products->sale))
        {
            $price = $products->gross_price;
        }
        else
        {
            $price = $products->gross_price * (1.00 - ($products->sale/100));
        }
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $products->name,
            'price' => $price,
            'quantity' => $request->mennyiség,
            'attributes' => array(),
            'associatedModel' => $products
        ));

        return redirect('cart');
    }
    function showProductsPage()
    {
        return view('products');
    }
    function showProducts(ProductRequest $request)
    {
        $searchText = $request->get('searchText');
        $pageSize = $request->get('pageSize', 15);
        $sortBy = $request->get('sortBy','name');
        $orderBy = $request->get('orderBy','asc');
        $priceFrom = $request->get('priceFrom');
        $priceTo = $request->get('priceTo');
        $widthFrom = $request->get('widthFrom');
        $widthTo = $request->get('widthTo');
        $thicknessFrom = $request->get('thicknessFrom');
        $thicknessTo = $request->get('thicknessTo');
        $sale = $request->get('sale');
        $color = $request->get('color');

        $query = Products::query()->where('type', '=', explode('http://127.0.0.1:8000/products/',URL::current())[1]);
        if(!empty($searchText)) {
            $query->where(function($query) use($searchText){
                $query->where('name','like', '%'.$searchText . '%');

            });
        }
        if((!empty($priceFrom)) && (!empty($priceTo))) {
            $query->whereBetween('gross_price', [$priceFrom,$priceTo]);
        }
        if((!empty($widthFrom)) && (!empty($widthTo))) {
            $query->whereBetween('width', [$widthFrom,$widthTo]);
        }
        if((!empty($thicknessFrom)) && (!empty($thicknessTo))) {
            $query->whereBetween('thickness', [$thicknessFrom,$thicknessTo]);
        }
        if(!empty($sale)) {
            $query->where('sale', '<>', 'NULL');
        }
        if(!empty($color)) {
            $array = explode(',',$color);

            if(count($array) > 1)
            {
                $query->where(function($query) use($array){
                    $query->where('color', '=', $array[0]);
                    for ($i=1; $i < count($array); $i++) {
                        $query->orWhere('color', '=', $array[$i]);
                    }
                });
            }
            else
            {
                $query->where('color', '=', $color);
            }
        }
        $projects = $query->orderBy($sortBy,$orderBy)->paginate($pageSize);
        return view('shop2',compact('projects'));
    }
    public function getPreviousOrders()
    {
        $orders = Users::with('orders')->where('buyer_id', '=', Auth::guard('buyer')->id())->get()[0]['orders'];

        return view('previousOrders', compact('orders'));
    }
    public function getPreviousOrderItems($orderId)
    {
        $items = Order::join('item', 'order_id', 'orders.id')
        ->join('products', 'products.id', 'item.product_id')
        ->where('orders.id', '=', $orderId)->get();

        return view('previousOrdersItems', compact('items'));
    }

}
