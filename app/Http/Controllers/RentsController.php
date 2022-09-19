<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Bike;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'store', 'return', 'destroy']);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.booking'); 
    }

    /**
     * Show the view for the returning action.
     *
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        return view('blog.return');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $request
        ->validate([
            'date' => 'required',
            'period' => 'required'
        ]);

        $price = Bike::first();
        $brand = Bike::first();
        $key = uniqid();
        
        Rental::create([
            'user_id' => Auth::id(),
            'id_bike' => $id,
            'bike_brand' => $brand->brand,
            'bike_price' => intval($price->price),
            'start_date' => $request->date,
            'duration' => $request->period,
            'key' => $key
        ]);


        return redirect(route('blog.booking'))->with('message', 'Booking Confirmed with the Id: ' . $key .
        '.  Thank you for using our bike rentals system. We wish you a safe ride! ');
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
        Rental::destroy($id);

        return redirect(route('blog.return'))->with('message', 
        'Your bike has been returned. Hope you enjoyed your bike!');
    }
}
