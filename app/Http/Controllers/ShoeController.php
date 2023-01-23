<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {


        $shoes = Shoe::all();




        return view('shoes.index')->with('shoes', $shoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('shoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $request->validate([
            'brand'=>'required|alpha',
            'model'=>'required|string',
            'color'=>'required|alpha',
            'price'=>'required|numeric|between:1,99999.99',
        ]);


        $shoe = Shoe::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'price' => $request->input('price'),

        ]);
        return redirect('/shoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  Id $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $shoe = Shoe::find($id);
        return view('shoes.show')->with('shoe', $shoe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Id $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $shoe=Shoe::find($id);
        return view('shoes.edit')->with('shoe', $shoe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Id $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'brand'=>'required|alpha',
            'model'=>'required|string',
            'color'=>'required|alpha',
            'price'=>'required|numeric|between:1,99999.99',
        ]);
        $shoe = Shoe::find($id);
        $shoe->update([
            'brand'=>$request->input('brand'),
            'model'=>$request->input('model'),
            'color'=>$request->input('color'),
            'price'=>$request->input('price'),
        ]);
        return redirect('/shoes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Id $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Shoe::destroy($id);
        return redirect('/shoes');
    }
}
