<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function Products(){
        return $this->hasMany(Product::class);
    }
    protected $fillable = [
        'name',
        'slug',
        'description',
    ]; 
}
