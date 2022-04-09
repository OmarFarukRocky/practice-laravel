<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name','image_path','stauts'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }  

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }  

}
