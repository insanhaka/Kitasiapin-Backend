<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_has_permission extends Model
{
    use HasFactory;
    protected $table = 'menu_permission';
    protected $fillable = [
        'menu_id',
        'permission_id',
        'role_id',
    ];
}
