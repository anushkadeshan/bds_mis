<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class CreateTask extends Component
{
    public $task_id, $name, $type, $task_start_at, $task_end_at, $importance;
    public $updateMode = false;

    protected $listeners = ['editTask' => 'edit'];

    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'task_start_at' => 'required',
        'task_end_at' => 'required',
        'importance' => 'required',
    ];

    public function store(){
        $this->validate();

        $task = Task::create([
            'name' => $this->name,
            'type' => $this->type,
            'task_start_at' => $this->task_start_at,
            'task_end_at' => $this->task_end_at,
            'importance' => $this->importance,
            'added_by' => auth()->user()->id
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->clear();
        session()->flash('message', 'Task Created Successfully.');
    }

    public function clear(){
        $this->name = '';
        $this->type = '';
        $this->task_start_at = '';
        $this->task_end_at = '';
        $this->importance = '';
    }

    public function edit($id){

        $this->updateMode = true;
        $task = Task::find($id);
        $this->task_id = $task->id;
        $this->name = $task->name;
        $this->type = $task->type;
        $this->task_start_at = $task->task_start_at;
        $this->task_end_at = $task->task_end_at;
        $this->importance = $task->importance;
        $this->openModal();
    }

    public function update(){
        $task = Task::find($this->task_id);
        $task->name = $this->name;
        $task->type = $this->type;
        $task->task_start_at = $this->task_start_at;
        $task->task_end_at = $this->task_end_at;
        $task->importance = $this->importance;
        $task->save();

        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
        $this->updateMode = false;
        $this->clear();
        session()->flash('message', 'Task Updated Successfully.');
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.task.create-task');
    }
}
