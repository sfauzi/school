<?php

namespace App\Livewire\ClassroomResource;

use Flux\Flux;
use Livewire\Component;
use App\Models\Classroom;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ClassroomEdit extends Component
{
    public $name, $classroomId;

    #[On("editClassroom")]
    public function editClassroom($id)
    {

        $classroom = Classroom::find($id);

        $this->classroomId = $classroom->id;
        $this->name = $classroom->name;


        Flux::modal('edit-classroom')->show();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update data di database
        Classroom::where('id', $this->classroomId)->update([
            'name' => $this->name,
        ]);

        LivewireAlert::title('Changes saved!')
            ->text('Classroom has been updated.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal('edit-classroom')->close();
        $this->dispatch('reloadClassrooms');
    }

    public function render()
    {
        return view('livewire.classroom-resource.classroom-edit');
    }
}
