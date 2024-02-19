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
    // Check if user is authenticated
    // if (!Auth::check()) {
    //     return response()->json([
    //         'status' => 'error',
    //         'message' => 'User not authenticated',
    //     ], 401); // Unauthorized status code
    // }

    // Now it's safe to access the authenticated user
    $orders = Order::create([
        'total_ammount' => $request->total_ammount,
        // 'product_id' => $request->product_id,
        'order_date' => $request->order_date,
        // 'created_by' => Auth::user()->id,
        // 'modified_by' => Auth::user()->id,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Order created successfully',
        'data' => $orders,
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
