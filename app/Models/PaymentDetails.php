<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\User;

class PaymentDetails extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function users()
    {
        return $this->belonhagsTo(User::class);
    }// end method



    //many to many relation
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
