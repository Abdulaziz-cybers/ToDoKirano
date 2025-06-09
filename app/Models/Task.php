<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];
    protected $casts = [
        'due_date' => 'datetime',
        'status' => 'string'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
