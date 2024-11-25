<?php

namespace App\Models;

use App\Models\CategoryImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'category',
        'Day_Rate',
        'Night_Rate',
        'pax',
    ];

    public function productImages()
    {
        return $this->hasMany(CategoryImage::class, 'category_id', 'id');
    }
}
