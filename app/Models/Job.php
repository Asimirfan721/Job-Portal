<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // ✅ Add this line to allow mass assignment
    protected $fillable = ['title', 'description', 'category_id'];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}

