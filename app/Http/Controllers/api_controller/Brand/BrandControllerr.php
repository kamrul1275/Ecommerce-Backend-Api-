<?php

namespace App\Http\Controllers\api_controller\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands= Brand::get();
         
        return response()->json([
         
        'stastus'=>'success',
        'message'=>'All Brand',
        'data'=>$brands,
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
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

       $brands= Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url, 
        ]);

    
        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Brand Inserted Successfully',
            'data'=>$brands,
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
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img ); 

        $brands= Brand::findOrFail($id)->delete();

       
        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Brand Deleted Successfully',
            'data'=>$brands,
            ]);
    }
}
