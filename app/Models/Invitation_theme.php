<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Invitation_theme extends Model
{
    use HasFactory;

    protected $table = 'invitation_themes';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by = Auth::user()->username;
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->username;
        });
    }
}
