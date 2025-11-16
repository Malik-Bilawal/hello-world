<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealtbl extends Model
{
        protected $table = 'dealtbl';

    public function category()
    {
        return $this->belongsTo(categorytbl::class, 'category_id');
    }

    public function sizechart()
    {
        return $this->belongsTo(chart::class, 'sizechart_id');
    }
protected $casts = [
    'deal_images' => 'array',
];


   public function chart()
{
    return $this->belongsTo(chart::class, 'sizechart_id');
}


}
