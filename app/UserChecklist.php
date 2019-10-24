<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChecklist extends Model
{
    protected $fillable = [
        'checklist_id',
        'deadline_at',
        'name',
        'description',
        'is_required',
        'status',
        'is_completed',
        'user_id'
    ];

    protected $dates = [
        'deadline_at'
    ];
}
