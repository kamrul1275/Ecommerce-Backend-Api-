<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderIteam extends Model
{
    use HasFactory;
    

   protected $guarded= [];
    
   public function products()
   {
       return $this->belonhagsTo(Product::class);
   }
   //end product method


   public function users()
   {
       return $this->belonhagsTo(User::class);
   }// end method

}
