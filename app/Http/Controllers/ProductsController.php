<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function showProducts(ProductRequest $request)
    {
        $searchText = $request->get('searchText');
        $pageSize = $request->get('pageSize', 15);
        $sortBy = $request->get('sortBy','name');
        $orderBy = $request->get('orderBy','asc');
        $priceFrom = $request->get('priceFrom');
        $widthFrom = $request->get('widthFrom');
        $widthTo = $request->get('widthTo');
        $thicknessFrom = $request->get('thicknessFrom');
        $thicknessTo = $request->get('thicknessTo');
        $sale = $request->get('sale');

        $query = Products::query();
        if(!empty($searchText)) {
            $query->where(function($query) use($searchText){
                $query->where('name','like', '%'.$searchText . '%')
                ->orWhere('color','like', '%'.$searchText . '%');
                
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
        $projects = $query->orderBy($sortBy,$orderBy)->paginate($pageSize);
        
        return view('products',compact('projects'));
    }
}
