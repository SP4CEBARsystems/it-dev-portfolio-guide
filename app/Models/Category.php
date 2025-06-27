<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = ['name', 'type', 'is_active'];

    /**
     * the 'is_perishable' derived attribute, true when type=='diepvries' || type=='kort houdbaar'
     */
    protected function isPerishable()
    {
        return Attribute::make(
            get: fn (string $value) => $value=='diepvries' || $value=='kort houdbaar',
        );
    }
}
