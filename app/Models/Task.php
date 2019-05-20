<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'importance',
    ];

    protected $importanceValues = [
        0 => 'بدون اهمیت',
        1 => 'کم',
        2 => 'متوسط',
        3 => 'زیاد',
    ];

    public function getImportanceName($pos)
    {
        return $this->importanceValues[$pos];
    }

    public function allImportanceName(){
        return $this->importanceValues;
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
