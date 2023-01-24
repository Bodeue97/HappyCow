<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\Carrier;
use Illuminate\Http\Request;

class TransportController extends Controller
{

    public function addCarrier(){

        return view('transport.add_carrier');
    }

    public function storeCarrier(Request $request){
        Carrier::create([
            'name'=>$request->input('name'),
            'last_name'=>$request->input('last_name'),
            'address'=>$request->input('address'),
            'vehicle'=>$request->input('vehicle')

        ]);
        return redirect('/show_carriers');
    }

    public function showCarriers(){
        $carriers = Carrier::all();

        return view('transport.show')->with('carriers', $carriers);

    }

    public function  delete($id){

        Carrier::destroy($id);
        return redirect('/show_carriers');

    }

    public function assignTransport(){

        $applications = Application::all()->where('paid_for', true);
        return view('transport.assign')->with('applications', $applications);

    }


}
