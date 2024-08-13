<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price'
    ];

    protected $table = 'cd';
    public $incrementing = true;
    public $timestamps = false;
}
