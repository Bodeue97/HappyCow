<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shoe;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index(){

        $brands = DB::table('shoes')->select('brand')->groupBy('brand')->get();



        return view('shop.index')->with('brands', $brands);
    }

    public function brand($brand){

        $temp_models = DB::table('shoes')->select('model')->where('brand', '=', $brand)->groupBy('model')->get();
        $models = array();
        foreach ($temp_models as $model){
            array_push($models, $model->model);
        }



        return view('shop.brand',  compact( 'models'));


    }

    public function model($model){


        $shoes = DB::table('shoes')->select('*')->where('model', '=', $model)->get();
        $sizes = Size::all();

        return view('shop.select', compact('shoes', 'sizes'));


    }

    public function add($size_id, $shoe_id){



    }


}
