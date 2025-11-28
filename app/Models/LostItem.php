<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    protected $table = 'lost_items';
    protected $fillable = [
        'title',
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

}
