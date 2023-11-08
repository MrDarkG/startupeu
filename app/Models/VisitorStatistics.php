<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static get()
 * @method static orderBy(string $string, string $string1)
 */
class VisitorStatistics extends Model
{
    use HasFactory;
    protected $fillable = [
        'counted'
    ];
}
