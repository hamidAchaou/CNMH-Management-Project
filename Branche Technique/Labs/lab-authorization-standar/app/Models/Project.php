<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];

    public function task() {
        return $this->hasMany(Task::class, 'projetId', 'id');
    }
}
