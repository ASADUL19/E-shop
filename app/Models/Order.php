<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_item;

class Order extends Model
{
    use HasFactory;

    protected $table="orders";
    protected $fillable=[
  
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pinecode',
        'status',
        'message',
        'tracking_no',
        
    ];

    public function orderitem()
    {
        return $this->hasMany(Order_item::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }

    public function soldes()
    {
        return $this->belongsTo(Product::class,'id');
    }


     
}
