<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'story',
        'count',
    ];

    /**
     * Get the user associated with the StoryTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function CategoryTable()
    {
        return $this->hasOne(CategoryTable::class,'id','category_id');
    }
}
