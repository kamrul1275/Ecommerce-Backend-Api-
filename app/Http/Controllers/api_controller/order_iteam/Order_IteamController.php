<?php

namespace App\Http\Controllers\api_controller\order_iteam;

use App\Http\Controllers\Controller;
use App\Models\OrderIteam;
use Illuminate\Http\Request;

class Order_IteamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oders= OrderIteam::get();
         
        return response()->json([
         
        'stastus'=>'success',
        'message'=>'Order iteam List',
        'data'=>$oders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderItem = OrderIteam::create([
            'product_id' => $request->product_id,
            'order_id' => $request->order_id,
            'quanty'=> $request->quanty,
            'ammount' => $request->ammount,
            'order_date' => $request->order_date,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully',
            'data' => $orderItem,
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
