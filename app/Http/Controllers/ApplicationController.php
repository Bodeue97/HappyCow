<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
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
            'application_date' => date('Y-m-d'),
            'account_number' => $request->input('account_number'),
            'seller_id' => Auth::id(),


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

    public function myReservedApplications(){

        $applications = Application::all()->where('reserved_by',Auth::id() );
        $transportsTemp = Transport::all();
        $transports[] = null;
        foreach ($transportsTemp as $transport){
            foreach ($applications as $application){
                if ($application->transport_id == $transport->id){
                    $transports[] = $transport;
                }
            }
        }


        return view('application.show_my_reserved')->with('applications', $applications)->with('transports', $transports);
    }


    public function finalizeOrders(){
        $applications = Application::all()->where('paid_for', false)->where('reserved_by', '!=', 0 )->where('verified', true);
        $users = User::all();




        foreach ($applications as $application  ){
            foreach ($users as $user) {
                if ($user->id == $application->seller_id) {
                    $sellers []= $user;
                }
            }
        }
        foreach ($applications as $application  ){
            foreach ($users as $user) {
                if ($user->id == $application->reserved_by) {
                    $buyers []= $user;
                }
            }
        }




        return view('accountant.finalize')->with('applications', $applications)->with('sellers', $sellers)->with('buyers', $buyers);
    }

    public function finalizeUpdate($id){
        $application = Application::find($id);
        $application->update([
            'paid_for' => true
        ]);

        return redirect('/accountant_finalize_orders');
    }

    public function showMyApplications(){
        $applications = Application::all()->where('seller_id', Auth::id());
        $transportsTemp = Transport::all();
        $transports[] = null;
        foreach ($transportsTemp as $transport){
            foreach ($applications as $application){
                if ($application->transport_id == $transport->id){
                    $transports[] = $transport;
                }
            }
        }

        return view('application.show_my_applications')->with('applications', $applications)->with('transports', $transports);
    }



}
