<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'due_date', 'device_id', 'done'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public static function completedTasks()
    {
        return static::where('done', true)->count();
    }

    public static function overdueTasks()
    {
        return static::where('due_date', '<', now())->where('done', false)->count();
    }

    public static function tasksByDay()
    {
        return static::selectRaw('date(created_at) as date, count(*) as count')
                    ->groupBy('date')
                    ->pluck('count', 'date')
                    ->toArray();
    }
}


