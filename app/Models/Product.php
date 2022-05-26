<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'selling_price',
        'original_price',
        'status',
        'hot',
    ]; 
}
