<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;

class PermissionModal extends Component
{
    public $data, $name, $guard_name, $selected_id, $only_super_admin;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.permission-modal');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->guard_name = null;
        $this->only_super_admin = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ]);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'only_super_admin' => $this->only_super_admin
        ]);

        $this->resetInput();
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'Permission successfully Created.');

    }

    public function edit($id)
    {
        $record = Contact::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->phone = $record->phone;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Contact::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contact::where('id', $id);
            $record->delete();
        }
    }
}
