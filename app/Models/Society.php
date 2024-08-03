<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'president_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the president of the society.
     */
    public function president()
    {
        return $this->belongsTo(User::class, 'president_id');
    }
}
