<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Bike;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Global_;

class RentsController extends Controller
{
    public $B_brand;
    public $B_price;
    public $R_start;
    public $R_duration;
    public $R_key;
    public $R_total;

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

            $this->B_brand = $brand->brand;
            $this->B_price = intval($price->price);
            $this->R_start = $request->date;
            $this->R_duration = $request->period;
            $this->R_key = $key;
            $this->R_total = $this->B_price * $this->R_duration;
        

            session()->flash('key', $this->R_key);
            session()->flash('brand', $this->B_brand);
            session()->flash('price', $this->B_price);
            session()->flash('date', $this->R_start);
            session()->flash('duration', $this->R_duration);
            session()->flash('total', $this->R_total);

        return redirect(route('blog.booking'));

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
