<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id', 'user_id', 'assigned_at', 'returned_at', 'action_by', 'activity_notes', 'activity_images'
    ];

    // Relationship: an asset assignment belongs to an asset
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    // Relationship: an asset assignment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // Relationship: an asset assignment was performed by a user (admin)
    public function actionBy()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
    public function returnRequest()
    {
        return $this->hasOne(AssetReturnRequest::class, 'asset_assignment_id');
    }
}
