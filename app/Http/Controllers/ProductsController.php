<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{
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
            $query->where('color', '=', $color);
        }
        $projects = $query->orderBy($sortBy,$orderBy)->paginate($pageSize);
        
        return view('products',compact('projects'));
    }
}
