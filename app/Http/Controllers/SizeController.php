<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes')->with('sizes', $sizes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'EU'=>'required|numeric|between:1,99.5|unique:sizes',
            'UK'=>'required|numeric|between:1,99.5|unique:sizes',
            'US_male'=>'required|numeric|between:1,99.5|unique:sizes',
            'US_female'=>'nullable|numeric|between:1,99.5|unique:sizes',
        ]);
        $size = Size::create([
            'EU' => $request->input('EU'),
            'UK' => $request->input('UK'),
            'US_male' => $request->input('US_male'),
            'US_female' => $request->input('US_female'),
        ]);
        return redirect('/admin/sizes');
    }

    /**
     * Display the specified resource.
     *
     * @param Size $size
     * @return Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Id $id
     * @return Response
     */
    public function edit($id)
    {

        $size = Size::find($id);
        return view('admin.edit')->with('size', $size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Id $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'EU'=>'required|numeric|between:1,99.5|unique:sizes',
            'UK'=>'required|numeric|between:1,99.5|unique:sizes',
            'US_male'=>'required|numeric|between:1,99.5|unique:sizes',
            'US_female'=>'nullable|numeric|between:1,99.5|unique:sizes',
        ]);

        $size = Size::find($id);
        $size= Size::where('id',$id)->update([
            'EU' => $request->input('EU'),
            'UK' => $request->input('UK'),
            'US_male' => $request->input('US_male'),
            'US_female' => $request->input('US_female')
        ]);


        return redirect('/admin/sizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Id $id
     * @return Response
     */
    public function destroy($id)
    {
        $size = Size::destroy($id);
        return redirect('/admin/sizes');

    }
}
