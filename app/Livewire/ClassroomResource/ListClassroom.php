<?php

namespace App\Livewire\ClassroomResource;

use Flux\Flux;
use Livewire\Component;
use App\Models\Classroom;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListClassroom extends Component
{

    public $classrooms, $classroomId;
    public function mount()
    {
        $this->classrooms  = Classroom::all();
    }
    public function render()
    {
        return view('livewire.classroom-resource.list-classroom');
    }


    #[On("reloadClassrooms")]
    public function reloadClassrooms()
    {
        $this->classrooms  = Classroom::all();
    }

    public function edit($id)
    {

        $this->dispatch("editClassroom", $id);
    }

    public function delete($id)
    {
        $this->classroomId = $id;
        Flux::modal("delete-classroom")->show();
    }

    public function destroy()
    {

        Classroom::find($this->classroomId)->delete();

        LivewireAlert::title('Classroom deleted!')
            ->text('Classroom has been deleted.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal("delete-classroom")->close();
        $this->dispatch("reloadClassrooms");
    }
}
