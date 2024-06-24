<?php

namespace App\Livewire;

use App\Models\Todolist as MTodolist;
use Illuminate\Console\View\Components\Task;
use Livewire\Component;


class Todolist extends Component
{
    
    public $task=""; 
    
    
    public function render()
    {
        $tasks = MTodolist::all()->reverse();
        return view('livewire.todolist',compact('tasks'));

    }

    public function addTask(){

        $rules =[
            'task' => 'required|min:5'
        ];

        $messages=[
            'task.required' => 'La tarea es requerida',
            'task.min' => 'La tarea debe tener mínimo 5 letras'
        ];

        $this->validate($rules,$messages);

        $newTask = new MTodolist();
        $newTask->task=$this->task;
        $newTask->save();
        $this->task='';
        session()->flash('msg', 'La tarea ha sido creada');
    }

    
    public function delete(MTodolist $task){
        $task->delete();
        session()->flash('msg', 'La tarea ha sido eliminada');
    }


    public function done(MTodolist $task){
    
        $task->update(['done'=>!$task->done]);
    }
}
