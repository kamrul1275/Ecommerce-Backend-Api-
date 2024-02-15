<?php

namespace App\Http\Controllers\api_controller\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Subcategories = SubCategory::get();

        return response()->json([

            'stastus' => 'success',
            'message' => 'All SubCategory',
            'data' => $Subcategories,
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
        $validated = $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required',
        ]);
    
    
        $Subcategories= SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
            'category_id' =>$request->category_id,
        ]);
    

    
        return response()->json([

            'stastus' => 'success',
            'message' => 'SubCategory Inserted Successfully',
            'data' => $Subcategories,
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
        $subcategory = SubCategory::findOrFail($id);
        $img = $subcategory->category_image;
       // unlink($img ); 

       $subcategories=SubCategory::findOrFail($id)->delete();

        // $notification = array(
        //     'message' => 'Category Deleted Successfully',
        //     'alert-type' => 'success'
        // );
       
        return response()->json([
         
            'stastus'=>'success',
            'message'=>'SubCategory Deleted Successfully',
            'data'=>$subcategory,
            ]);
    }
}
