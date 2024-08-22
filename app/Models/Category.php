<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the items for the category.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
