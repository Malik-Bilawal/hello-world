<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producttbl extends Model
{
    use HasFactory;

 protected $fillable = [
        'product_name',
        'product_price',
        'product_discount_price',
        'product_description',
        'product_images',
        'category_id',
        'sizechart_id',
        'sizes'
    ];

    protected $casts = [
        'sizes' => 'array', // Ensure sizes are treated as an array
    ];
    
    public function chart()
{
    return $this->belongsTo(chart::class, 'sizechart_id');
}

}
