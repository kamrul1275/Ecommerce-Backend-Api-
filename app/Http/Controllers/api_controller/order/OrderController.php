<?php

namespace App\Http\Controllers\api_controller\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oders= Order::get();
         
        return response()->json([
         
        'stastus'=>'success',
        'message'=>'Order List',
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
        $orders=Order::insert([
           
            'total_ammount' => $request->total_ammount,
            'product_id' => $request->product_id,
            'order_date' => $request->order_date,
            // 'created_by' =>  Auth::user()->id,
            // 'modified_by' =>  Auth::user()->id,
           
        ]);

        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Order Create Succesfully',
            'data'=>$orders,
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
        $Orders = Order::findOrFail($id);

        $Orders=Order::findOrFail($id)->delete();
 
         return response()->json([
          
             'stastus'=>'success',
             'message'=>'Order Deleted Successfully',
             'data'=>$Orders,
             ]);
    }
}
