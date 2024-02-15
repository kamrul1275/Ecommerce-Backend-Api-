<?php

namespace App\Http\Controllers\api_controller\payment;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PaymentDetails= PaymentDetails::get();
         
        return response()->json([
         
        'stastus'=>'success',
        'message'=>'Payment List',
        'data'=>$PaymentDetails,
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
        $PaymentDetails=PaymentDetails::insert([
            'user_id' => $request->user_id,
            'ammount' => $request->ammount,
            'account_no' => $request->account_no,
            'payment_type' => $request->payment_type,
            'created_by' =>  Auth::user()->id,
            'modified_by' =>  Auth::user()->id,
           
        ]);

        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Payment Create Succesfully',
            'data'=>$PaymentDetails,
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
        $PaymentDetails = PaymentDetails::findOrFail($id);

       $PaymentDetails=PaymentDetails::findOrFail($id)->delete();

        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Payment Deleted Successfully',
            'data'=>$PaymentDetails,
            ]);
    }
}
