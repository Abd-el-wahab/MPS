<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use Validator;
use Auth;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::paginate(100); 
        return ClientResource::collection($client);
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
        $client = new Client;
        $client->username = $request->input('username');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->age = $request->input('age');
        $client->credit_card = $request->input('credit_card');

        $client->save();

        return redirect('/api/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return new ClientResource($client);
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
        $client = Client::findOrFail($id);
        if($client->delete()){
        return new ClientResource($client);
    }
}

function clientlogin(Request $request)
{
    $email = $request->email;
    $password = $request->password;
    $client = Client::where('email', $email)->firstOrFail();
    if(Hash::check($password, $client->password))
    {
    return response()->json([$client]);
    }
    else
    return 'Error Not Working';
}

function logout()
{
 Auth::logout();
return;
}

public function signup(){

    // $downloads=DB::table('lectures')->get();
    return view('signup');

}

public function login(){

    // $downloads=DB::table('lectures')->get();
    return view('login');

}


}
