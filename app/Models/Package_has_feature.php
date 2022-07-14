<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_has_feature extends Model
{
    use HasFactory;
    protected $table = 'feature_package';
    protected $fillable = [
        'package_id',
        'feature_id'
    ];
}
