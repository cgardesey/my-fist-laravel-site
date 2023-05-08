<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $guarded = [];
//    protected $fillable = [
//        'title', 'description'
//    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::created(function ($project) {
//            Mail::to('jane@example.com')->send(
//                new ProjectCreated($project)
//            );
//        });
//    }

    protected $dispatchesEvents = [
        'created' => \App\Events\ProjectCreated::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
