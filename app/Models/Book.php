<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation', 'description', 'prix', 'auteur', 'cover', 'tag_id',
        'langue', 'editeur', 'category_id', 'type'
    ];

    public function category()
    {
        return $this->belongsTo(Caterories::class, 'category_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }
}