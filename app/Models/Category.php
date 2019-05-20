<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function tasks()
    {
        $this->hasMany(Task::class);
    }
}
