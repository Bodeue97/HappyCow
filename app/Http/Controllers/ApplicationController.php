<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    public function verifyApplications(){

        $applications = Application::all();

        return view('boss.verify_applications')->with('applications', $applications);
    }

    public function confirmVerify($id){
        $application = Application::find($id);

        $application->update([
            'verified' => true
        ]);
        return redirect('/verify_applications');
    }

    public function delete($id){
        Application::destroy($id);
        return redirect('/verify_applications');
    }

    public function show(){
        $applications = Application::all();

        return view('application.show')->with('applications', $applications);
    }
    public function orderCattle($id){
        $user_id = Auth::id();
        $application = Application::find($id);
        $application->update([
            'reserved_by' => $user_id
        ]);

        return redirect('/show_my_orders');


    }

    public function reservedApplications(){
        $applications = Application::all();

        return view('application.show_my_reserved')->with('applications', $applications);
    }

}
