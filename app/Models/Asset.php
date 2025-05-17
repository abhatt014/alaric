<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'asset_type',
        'asset_brand',
        'asset_model',
        'asset_name',
        'asset_serial',
        'asset_status',
        'purchase_date',
        'purchase_cost',
        'image_path',
    ];
    public function assetType()
    {
        return $this->belongsTo(AssetType::class, 'asset_type');
    }

    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class, 'asset_id');
    }

    public function activityTimeline()
    {
        return $this->hasMany(AssetActivityTimeline::class, 'asset_id');
    }
    public function currentAssignment()
    {
        return $this->hasOne(AssetAssignment::class, 'asset_id')
            ->whereNull('returned_at'); // Only fetch the current assignment (not returned)
    }
    public function returnRequests()
    {
        return $this->hasMany(AssetReturnRequest::class);
    }
}
