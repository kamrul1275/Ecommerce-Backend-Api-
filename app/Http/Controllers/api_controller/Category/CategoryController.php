<?php

namespace App\Http\Controllers\api_controller\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;

use Intervention\Image\Facades\Image;
//use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::get();
         
        return response()->json([
         
        'stastus'=>'success',
        'message'=>'All Category',
        'data'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return "store category";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $image = $request->file('category_image');

        //dd($image);
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        $categories=Category::insert([
            'category_name' => $request->category_name,
            // 'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url, 
        ]);


        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Category Inserted Successfully',
            'data'=>$categories,
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
        return "update category";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image;
       // unlink($img ); 

       $categories=Category::findOrFail($id)->delete();

        // $notification = array(
        //     'message' => 'Category Deleted Successfully',
        //     'alert-type' => 'success'
        // );
       
        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Category Deleted Successfully',
            'data'=>$categories,
            ]);
    }
}
