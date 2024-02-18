<?php

namespace App\Http\Controllers\api_controller\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Resources\Brand\brandResource;

use Intervention\Image\Facades\Image;

class BrandControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands= Brand::get();

        // return new brandResource ($brands;
         
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
    // Check if file was uploaded
    if ($request->hasFile('brand_image')) {
        $image = $request->file('brand_image');
        
        // Check if file is valid
        if ($image->isValid()) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/brand/' . $name_gen;
            
            // Resize and save the image
            Image::make($image)->resize(300, 300)->save(public_path($save_url));

            $brands = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Brand Inserted Successfully',
                'data' => $brands,
            ]);
        } else {
            // Handle invalid file
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid file uploaded.',
            ], 400);
        }
    } else {
        // Handle case where no file was uploaded
        return response()->json([
            'status' => 'error',
            'message' => 'No file uploaded.',
        ], 400);
    }
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
