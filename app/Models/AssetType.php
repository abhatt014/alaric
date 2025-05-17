<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetType extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'type_name',
    ];
    public function assets()
    {
        return $this->hasMany(Asset::class, 'asset_type');
    }
}
