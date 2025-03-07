<?php

namespace App\Livewire\StudentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use App\Models\Classroom;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class StudentEdit extends Component
{
    public $studentId;
    public $name;
    public $class_id;
    public $classes = [];

    #[On("editStudent")]
    public function editClassroom($id)
    {

        $student = Student::find($id);

        if (!$student) {
            return;
        }

        $this->studentId = $student->id;
        $this->name = $student->name;
        $this->class_id = $student->class_id;

        $this->classes = Classroom::all() ?? [];

        Flux::modal('edit-student')->show();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $student = Student::findOrFail($this->studentId);
        $student->update([
            'name' => $this->name,
            'class_id' => $this->class_id,
        ]);

        Flux::modal('edit-student')->close();

        LivewireAlert::title('Changes saved!')
            ->text('Student has been updated.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        $this->dispatch('reloadStudents');
    }


    public function render()
    {
        return view('livewire.student-resource.student-edit');
    }
}
