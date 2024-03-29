<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 * @method static firstOrCreate(array $array)
 * @method static create(array $array)
 * @method static where(string $string, $ip)
 * @method static get()
 * @method static orderBy(string $string, string $string1)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'country',
        'referer'
    ];
}
