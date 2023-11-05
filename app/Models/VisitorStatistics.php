<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static get()
 */
class VisitorStatistics extends Model
{
    use HasFactory;
    protected $fillable = [
        'counted'
    ];
}
