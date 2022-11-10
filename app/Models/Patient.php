<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 *
 * @package App\Models
 *
 * @property int $id
 */
class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
