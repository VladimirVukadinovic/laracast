<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $fillable = ['title', 'description'];
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($description)
    {

//        return Task::create([
//           'project_id' => $this->id,
//           'description' => $description
//        ]);
        //dd($description);
        //dd(compact('description'));
        $this->tasks()->create(compact('description'));
    }
}
