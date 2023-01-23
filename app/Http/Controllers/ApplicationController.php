<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\User;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('application.create');
    }

    public function store(Request $request){
        Application::create([
            'cattle' => $request->input('cattle'),
            'price' => $request->input('price'),
            'application_date' => date('Y-m-d')

        ]);
        return "Twoje zgłoszenie wkrótce zatwierdzone";
    }




}
