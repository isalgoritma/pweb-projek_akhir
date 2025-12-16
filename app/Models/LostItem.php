<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Verification;

class LostItem extends Model
{
    protected $table = 'lost_items';
    protected $fillable = [
        'title',
        'category',
        'type',
        'description',
        'location',
        'date_lost',
        'status',
        'user_id',
        'image_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class);
    }

}
