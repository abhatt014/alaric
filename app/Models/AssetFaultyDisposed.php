<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetFaultyDisposed extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'action',
        'notes',
        'images',
        'action_date',
    ];
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
