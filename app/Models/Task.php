<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function developer(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class, 'developer_tasks')->using(DeveloperTask::class);
    }
}
