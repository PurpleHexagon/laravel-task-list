<?php
declare(strict_types=1);
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 */
class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details',
    ];
}
