<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = [
        'organization_id',
        'owner_id',
        'name',
        'description',
        'deadline',
        'is_required'
    ];
}
