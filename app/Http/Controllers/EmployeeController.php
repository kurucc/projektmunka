<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Order;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function getDashboard()
    {
        return view('worker');
    }
    public function showProductsCount(Request $request)
    {
        $csempeCount = Products::where('type', '=', 'csempe')->sum('actual_stock');
        $parkettaCount = Products::where('type', '=', 'parketta')->sum('actual_stock');
        $sumCount = $csempeCount + $parkettaCount;
        $parkettaMaxPrice = Products::where('type', '=', 'parketta')->max('gross_price');
        $csempeMaxPrice = Products::where('type', '=', 'csempe')->max('gross_price');
        $csempeOnSale = Products::where('type', '=', 'csempe')->count('sale');
        $parkettaOnSale = Products::where('type', '=', 'parketta')->count('sale');
        $sumSale = $csempeOnSale + $parkettaOnSale;

        $from = $request->get('dateFrom', now());
        $to = $request->get('dateTo', now());

        $ordersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])->count();
        $parkettaOrdersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'parketta')
        ->count();

        $csempeOrdersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'csempe')
        ->count();

        $parkettaSumBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'parketta')
        ->sum('gross_sum');

        $csempeSumBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'csempe')
        ->sum('gross_sum');

        $ordersSumBetweenDates = $parkettaSumBetweenDates + $csempeSumBetweenDates;
        
        return view('workerdash', compact('csempeCount', 'parkettaCount', 'sumCount', 'parkettaMaxPrice', 
        'csempeMaxPrice', 'csempeOnSale', 'parkettaOnSale', 'sumSale', 'ordersCountBetweenDates', 'parkettaOrdersCountBetweenDates', 
        'csempeOrdersCountBetweenDates', 'parkettaSumBetweenDates', 'csempeSumBetweenDates', 'ordersSumBetweenDates', 'from', 'to'));
    }
    public function downloadStats(Request $request)
    {

        $csempeCount = Products::where('type', '=', 'csempe')->sum('actual_stock');
        $parkettaCount = Products::where('type', '=', 'parketta')->sum('actual_stock');
        $sumCount = $csempeCount + $parkettaCount;
        $parkettaMaxPrice = Products::where('type', '=', 'parketta')->max('gross_price');
        $csempeMaxPrice = Products::where('type', '=', 'csempe')->max('gross_price');
        $csempeOnSale = Products::where('type', '=', 'csempe')->count('sale');
        $parkettaOnSale = Products::where('type', '=', 'parketta')->count('sale');
        $sumSale = $csempeOnSale + $parkettaOnSale;

        $from = $request->get('dateFrom', now());
        $to = $request->get('dateTo', now());

        $ordersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])->count();
        $parkettaOrdersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'parketta')
        ->count();

        $csempeOrdersCountBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'csempe')
        ->count();

        $parkettaSumBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'parketta')
        ->sum('gross_sum');

        $csempeSumBetweenDates = Order::whereBetween('created_at', [$from, $to])
        ->join('item', 'order_id', 'orders.id')
        ->join('products', 'product_id', 'products.id')
        ->where('products.type', '=', 'csempe')
        ->sum('gross_sum');

        $ordersSumBetweenDates = $parkettaSumBetweenDates + $csempeSumBetweenDates;
        
        return response()->streamDownload(function() 
        use($csempeCount, $parkettaCount, $sumCount, $parkettaMaxPrice, $csempeMaxPrice, $parkettaOnSale,
            $csempeOnSale, $sumSale, $ordersCountBetweenDates, $parkettaOrdersCountBetweenDates, $csempeOrdersCountBetweenDates, $parkettaSumBetweenDates,
            $csempeSumBetweenDates, $ordersSumBetweenDates)
        {

            echo 'Csempe k??szlet: ' . $csempeCount . ' db' . "\n" .
            'Parketta k??szlet: ' . $parkettaCount . ' db' . "\n" .
            '??sszes k??szlet: ' . $sumCount . ' db' . "\n" .
            'A parkett??k maxim??lis ??ra: ' . $parkettaMaxPrice . ' Ft' . "\n" .
            'A csemp??k maxim??lis ??ra: ' . $csempeMaxPrice . ' Ft' . "\n" .
            'Parketta le??razva: ' . $parkettaOnSale  . ' db' . "\n" .
            'Csemp??k le??razva: ' . $csempeOnSale . ' db' . "\n" .
            '??sszes le??razott term??k: ' . $sumSale . ' db' . "\n" .
            'Rendel??sek k??t d??tum k??z??tt: ' . $ordersCountBetweenDates . ' db' . "\n" .
            'Parketta rendel??sek k??t d??tum k??z??tt' . $parkettaOrdersCountBetweenDates . ' db' . "\n" .
            'Csempe rendel??sek k??t d??tum k??z??tt: ' . $csempeOrdersCountBetweenDates . ' db' . "\n" .
            'Bev??telek parkett??b??l k??t d??tum k??z??tt: ' . $parkettaSumBetweenDates . ' Ft' . "\n" .
            'Bev??telek csemp??b??l k??t d??tum k??z??tt: ' . $csempeSumBetweenDates  . ' ft' . "\n" .
            'Bev??telek ??sszesen k??t d??tum k??z??tt: ' . $ordersSumBetweenDates . ' db' . "\n";

        },'stats.csv');

    }
    public function getOrders()
    {
        $parkettak = Products::where('type', '=', 'parketta')->get();
        $csempek = Products::where('type', '=', 'csempe')->get();
        return view('workerOrder', compact('parkettak', 'csempek'));
    }
    public function saveOrders(Request $request)
    {
        if($request->has('csempeRendeles'))
        {
            $invoice = Invoice::create(['invoice_number' => rand(111111,999999), 'billed' => 0]);
            $orders = Order::create([
                'order_number' => $invoice->id,
                'user_id' => Users::where('employee_id' , '=', Auth::guard('employee')->user()->id)->get()[0]['id'],
                'direction' => 1,
                'net_sum' => 0,
                'gross_sum' => 0,
                'VAT_sum' => 27,
                'delivered' => 0,
                'invoice_id' => $invoice->id
            ]);
            foreach ($request->csempe as $key => $value) 
            {
                if(!empty($value))
                {
                    Item::create([
                        'order_id' => $orders->id,
                        'product_id' => $key,
                        'quantity' => $value
                    ]);
                }
            }
            return redirect('dashboard/worker/order');
        }
        else if($request->has('parkettaRendeles'))
        {
            $invoice = Invoice::create(['invoice_number' => rand(111111,999999), 'billed' => 0]);
            $orders = Order::create([
                'order_number' => $invoice->id,
                'user_id' => Users::where('employee_id' , '=', Auth::guard('employee')->user()->id)->get()[0]['id'],
                'direction' => 1,
                'net_sum' => 0,
                'gross_sum' => 0,
                'VAT_sum' => 27,
                'delivered' => 0,
                'invoice_id' => $invoice->id
            ]);
            foreach ($request->parketta as $key => $value) 
            {
                if(!empty($value))
                {
                    Item::create([
                        'order_id' => $orders->id,
                        'product_id' => $key,
                        'quantity' => $value
                    ]);
                }
            }
        }
        return redirect('dashboard/worker/order');
    }
}