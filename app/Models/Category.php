<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;

    protected $guarded= [];



    function SubCategory(){

        return $this->hasOne(SubCategory::class);
    }//end method



    function Product(){

        return $this->belongsTo(Product::class);
    }//end method


}
