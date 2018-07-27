<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemPosts extends Model {

    protected $table = 'items';

    public static function getItem() {
        return $cart = DB::table('items as i')
            ->leftJoin('item_categories as c', 'c.id', '=', 'i.cat_id')
            ->select('i.id as id','i.name as name', 'i.image as image', 'i.cat_id as cat_id', 'c.name as cat_name','i.created_at as created_at','i.updated_at as updated_at')
            ->orderBy('i.name', 'asc')
            ->get();
    }


}
