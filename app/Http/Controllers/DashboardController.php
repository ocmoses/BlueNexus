<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();

        if(!$user){
            redirect(route('login'));
        }

        if($user->isAdmin()){
            $clients = User::where('role', 'client')->get();
            return view('dashboard', compact('clients'));
        }else{
            $products = Product::all();
            return view('dashboard', compact('products'));
        }
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
    public function setLimit(Request $request, $id)
    {
        //
        try{

            $newLimit = $request->newLimit;

            if(auth()->user() && auth()->user()->isAdmin() ){
                $client = User::find($id);
                if($client){

                    $client->credit_limit = $newLimit * 100;
                    $client->save();

                    return response()->json(['success' => true, "message" => "Limit set successfully"], 200);

                }else{
                    return response()->json(['success' => false, "message" => "Bad request"], 400);
                }
                
            }else{
                return response()->json(['success' => false, "message" => "Unauthorized"], 413);
            }

        }catch(\Exception $e){
            return response()->json(['success' => false, "message" => "An error occured. \n" . $e->getMessage()], 500);
        }
        
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
