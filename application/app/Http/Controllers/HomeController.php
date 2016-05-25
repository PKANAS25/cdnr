<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Client;
use App\Contact;
use App\ClientCall;

use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
         $dated = date('Y-m-d', strtotime("-15 days"));
         $today = date('Y-m-d');
         $totalClients = Client::where('deleted',0)->count();
         $newClients = Client::where('created_at','>',$dated)->count();
         $totalContacts = Contact::where('deleted',0)->count();
         $newCalls = ClientCall::whereRaw("created_at LIKE '%".$today."%'")->count(); 
         
         $industries = DB::table('clients')
                 ->select('industry', DB::raw('count(*) as counter'),'industries.name AS industryName')
                 ->leftjoin('industries','clients.industry', '=', 'industries.id')
                 ->where('deleted',0)
                 ->groupBy('industry')
                 ->get();
 
         return view('hr.dashboard',compact('totalClients','newClients','totalContacts','newCalls','industries'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
