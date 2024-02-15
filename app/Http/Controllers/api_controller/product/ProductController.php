<?php


namespace App\Http\Controllers\api_controller\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::latest()->get();
    
        return response()->json([
            'message' => 'Product list',
            'data' => $products,
        ]);
    }


// total product count

    public function getTotalProducts() {

       // return "oky";
        $totalProducts = Product::count();
    
        // Now you can use $totalUsers in your code as needed
       // return view('your_view')->with('totalUsers', $totalUsers);
        return response()->json([
    
            'message'=>'All Product',
            'data'=>$totalProducts,
    
        ]);
    }
    
    



  

    public function create()
    {
        //
    }




    public function store(StoreProductRequest $request)
    {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;


        //dd($save_url);




        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            // 'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'status' => 1,
            'created_at' => Carbon::now(),

            // return redirect()->back();

        ]);




        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

//    dd($uploadPath);

// return $uploadPath;

    Product_Image::insert([

            'product_id' =>$product_id,
            //dd($request->product_id),
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]); 
        } // end foreach

      
        return response()->json([
         
            'stastus'=>'success',
            'message'=>'Product Inserted Successfully',
           
            ]);


    }



    public function editProduct(Product $product,$id)
    {
        //return "working";
        $product = Product::find($id);

        //return $product;
        return response()->json([
            'message'=>'Product list',
            'data'=>$product,
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->title= $request->title;
        $product->price= $request->price;
        $product->save();
        $msg="Product update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Product $product)
    {
        $product->delete();
        $msg="Product Delete succesfully";
        return response()->json(['success'=>$msg],200);


    }//end method
}
