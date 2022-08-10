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
        $size = Size::create([
            'EU'=>$request->input('EU'),
            'UK'=>$request->input('UK'),
            'US_male'=>$request->input('US_male'),
            'US_female'=>$request->input('US_female'),
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
     * @param Size $size
     * @return Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Size $size
     * @return Response
     */
    public function update(Request $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Size $size
     * @return Response
     */
    public function destroy(Size $size)
    {
        //
    }
}
