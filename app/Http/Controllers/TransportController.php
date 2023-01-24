<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\Carrier;
use App\Models\Transport;
use http\Client\Curl\User;
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

    public function showAssignTransport(){

        $applications = Application::all()->where('paid_for', true)->where('transport_id', null);
        return view('transport.assign')->with('applications', $applications);

    }
    public function assignTransport($id){

        $carriers = Carrier::all();
        $application = Application::find($id);
        $buyer = \App\Models\User::find($application->reserved_by);
        $seller = \App\Models\User::find($application->seller_id);



        return view('transport.assignform')->with('application_id', $id)
            ->with('carriers', $carriers)->with('date_now', date('Y-m-d'))
            ->with('seller', $seller)->with('buyer', $buyer);
    }


    public function storeTransport(Request $request ){

        $transport = Transport::create([
            'pickup_date'=> $request->input('pickup_date'),
            'transport_from'=> $request->input('transport_from'),
            'transport_to'=> $request->input('transport_to'),
            'carrier_id'=> $request->input('carrier_id'),
            ]);




        $application = Application::find($request->input('application_id'));

        $application->update([
            'transport_id' => $transport->id
        ]);

        return redirect('/transport_assign');

    }





}
