<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\PaymentDetails;

class Order extends Model
{
    use HasFactory;
    protected $guarded= [];


    

    public function payments()
    {
        return $this->hasOne(PaymentDetails::class);
    }
    //end product method


    public function users()
    {
        return $this->belonhagsTo(User::class);
    }// end method




}
