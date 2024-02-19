<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded= [];


    // public function images()
    // {
    //     return $this->hasMany(Product_Image::class);
    // }

    function Brand(){

        return $this->hasMany(Brand::class);
    }//end method


    function Category(){

        return $this->hasMany(Category::class);
    }//end method



    function SubCategory(){

        return $this->hasMany(SubCategory::class);
     }//end method


  

    function MultiImage(){

        return $this->belongsTo(Product_Image::class);
     }//end method

     function order_iteams(){

        return $this->hasMany(OrderIteam::class);
    }//end method



}
