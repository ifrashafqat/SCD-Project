<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'image_path', 'date', 'venue', 'category_id'];

    // Define the relationship with Category (Many events belong to one category)
    public function category()
{
    return $this->belongsTo(Category::class);
}

}
