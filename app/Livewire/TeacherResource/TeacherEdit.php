<?php

namespace App\Livewire\TeacherResource;

use Flux\Flux;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Classroom;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class TeacherEdit extends Component
{

    public $teacherId;
    public $name;
    public $class_id;
    public $classes = [];

    #[On("editTeacher")]
    public function editClassroom($id)
    {

        $teacher = Teacher::find($id);

        if (!$teacher) {
            return;
        }

        $this->teacherId = $teacher->id;
        $this->name = $teacher->name;
        $this->class_id = $teacher->class_id;

        $this->classes = Classroom::all() ?? [];

        Flux::modal('edit-teacher')->show();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $teacher = Teacher::findOrFail($this->teacherId);
        $teacher->update([
            'name' => $this->name,
            'class_id' => $this->class_id,
        ]);

        Flux::modal('edit-teacher')->close();

        LivewireAlert::title('Changes saved!')
            ->text('Teacher has been updated.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        $this->dispatch('reloadTeachers');
        $this->dispatch('editTeacherList');
    }

    public function render()
    {
        return view('livewire.teacher-resource.teacher-edit');
    }
}
