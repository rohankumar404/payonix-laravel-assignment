<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
    ];

    /**
     * Get the user who created the item.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}