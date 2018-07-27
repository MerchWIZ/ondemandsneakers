<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    static function getProducts($query) {
        
        
        $products = Products::leftJoin('products_categories as pc', 'pc.product_id', '=', 'products.id')
                ->select('products.*','pc.id as pppid');
        if(isset($query['category_id'])){
            
            $subq=$products->where('pc.category_id', '=', $query['category_id']);
        }
        $products = $products->groupBy('products.id');
        return $products = $products->get();
    }
    
    static function getProductSearch($cat_id,$keyword) {
        
        $products = Products::leftJoin('products_categories as pc', 'pc.product_id', '=', 'products.id')
                ->select('products.*','pc.id as pppid');

         $subq=$products->where('pc.category_id', '=', $cat_id) 
                 ->where("name", "like", "%$keyword%");
//        if(isset($query['category_id'])){
//            
//            $subq=$products->where('pc.category_id', '=', $query['category_id']);
//        }
        $products = $products->groupBy('products.id');
        return $products = $products->paginate(9);
    }

}
