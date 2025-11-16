<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    use HasFactory;
   protected $fillable = ['order_id', 'product_id', 'deal_id', 'user_id', 'product_name', 'size', 'quantity', 'price', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(orders::class, 'order_id'); // Specify the foreign key column
    }
  public function products()
    {
        return $this->belongsTo(producttbl::class, 'product_id');
    }

    // Define relationship to deals
    public function deals()
    {
        return $this->belongsTo(dealtbl::class, 'deal_id');
    }

}
