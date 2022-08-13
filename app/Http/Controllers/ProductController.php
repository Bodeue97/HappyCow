<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shoe;
use App\Models\Size;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shoes = Shoe::all();
        $sizes = Size::all();


        return view('product.index', compact(['shoes', 'sizes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shoes = Shoe::all();
        $sizes = Size::all();

        return view('product.create')->with('shoes', $shoes)->with('sizes', $sizes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $shoe_id= json_decode($request->get('shoe'))->id;
        $size_id = json_decode($request->get('size'))->id;

        $shoe = Shoe::find($shoe_id);

        if($shoe->size_ids == null){
            $sizesToAdd = $size_id;

        }
        if(gettype($shoe->size_ids) == 'integer'){
            $sizesToAdd[] = $shoe->size_ids;

            array_push($sizesToAdd, $size_id);


        }if(gettype($shoe->size_ids) == 'array'){
            $sizesToAdd = $shoe->size_ids;

            array_push($sizesToAdd, $size_id);
        }





        $shoe->update([
            'size_ids' => $sizesToAdd
        ]);







        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
