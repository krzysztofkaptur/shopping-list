<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'completed',
        'category_id',
        'user_id',
    ];

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
