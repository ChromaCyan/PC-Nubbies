<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'status', 'session_id', 'user_address_id',  'created_by', 'updated_by'];
    use HasFactory;
    function order_items()  {
        return $this->hasMany(OrderItem::class);
    }

    public function createBy()
    {
    	return $this->belongsTo(User::class,'created_by');
    }

    public function payments(){
    	return $this->hasMany(Payment::class);
    }
}
