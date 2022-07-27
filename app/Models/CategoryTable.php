<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    /**
     * Get all of the comments for the CategoryTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function StoryTable()
    {
        return $this->hasMany(StoryTable::class, 'category_id');
    }
}
