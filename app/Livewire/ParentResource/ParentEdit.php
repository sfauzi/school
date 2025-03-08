<?php

namespace App\Livewire\ParentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use App\Models\OrangTua;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ParentEdit extends Component
{
    public $parentId;
    public $name;
    public $student_id;
    public $studentes = [];

    #[On("editParent")]
    public function editParent($id)
    {

        $parent = Parent::find($id);

        if (!$parent) {
            return;
        }

        $this->parentId = $parent->id;
        $this->name = $parent->name;
        $this->student_id = $parent->student_id;

        $this->studentes = Student::all() ?? [];

        Flux::modal('edit-parent')->show();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
        ]);

        $parent = OrangTua::findOrFail($this->parentId);
        $parent->update([
            'name' => $this->name,
            'student_id' => $this->student_id,
        ]);

        Flux::modal('edit-parent')->close();

        LivewireAlert::title('Changes saved!')
            ->text('Parent has been updated.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        $this->dispatch('reloadParents');
    }
    
    public function render()
    {
        return view('livewire.parent-resource.parent-edit');
    }
}
