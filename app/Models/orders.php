<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
 protected $fillable = ['user_id', 'order_number', 'total_amount', 'status', 'address', 'city', 'apartment', 'postal_code', 'first_name', 'last_name', 'phone', 'payment_method', 'payment_ss', 'transaction_sms'];


// Relationship for items
public function items()
    {
        return $this->hasMany(order_items::class , 'order_id'); // Assuming you have an OrderItem model
    }


public function orderItems()
{
    return $this->hasMany(order_items::class, 'order_id');
}

public function products() {
    return $this->hasMany(producttbl::class);
}

public function deals() {
    return $this->hasMany(dealtbl::class);
}


}
