<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';

    protected $guarded = [];

    protected $fillable = [
        'name', 'old_price', 'sell_price', 'best', 'premium'
    ];
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

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
