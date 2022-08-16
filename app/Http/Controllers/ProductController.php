<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shoe;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $shoe_id = json_decode($request->get('shoe'))->id;
        $size_id = json_decode($request->get('size'))->id;

        $shoe = Shoe::find($shoe_id);

        if ($shoe->size_ids == null) {
            $sizesToAdd = $size_id;

        }
        if (gettype($shoe->size_ids) == 'integer') {
            $sizesToAdd[] = $shoe->size_ids;

            array_push($sizesToAdd, $size_id);


        }
        if (gettype($shoe->size_ids) == 'array') {
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
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $sizes = Size::all();
        $shoes = Shoe::where('brand', 'LIKE', '%'.$keyword.'%')->orWhere('model', 'LIKE', '%'.$keyword.'%')->get();

        return view('product.search', compact('sizes', 'shoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shoe_id, $size_id)
    {

    $shoe = Shoe::find($shoe_id);
    $key=array_search($size_id, $shoe->size_ids);
    $shoe->size_ids = Arr::except($shoe->size_ids, $key);
    $shoe->update([
        'size_ids'=>$shoe->size_ids
    ]);




        return redirect('/products');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
