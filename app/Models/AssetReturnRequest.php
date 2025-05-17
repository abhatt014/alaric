<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetReturnRequest extends Model
{
    //
    protected $fillable = [
        'asset_assignment_id', 'user_id', 'asset_id', 'status', 'notes'
    ];

    // Relationship: a return request belongs to an asset
    public function assetAssignment()
    {
        return $this->belongsTo(AssetAssignment::class, 'asset_assignment_id');
    }

    // Relationship: a return request belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
