<?php

namespace App\Livewire\TeacherResource;

use Flux\Flux;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Classroom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListTeacherByClass extends Component
{
    public $class_id;
    public $teachers = [];
    public $classes;
    public $teacherId;

    protected $listeners = [
        'editTeacherList' => 'getTeachers'
    ];

    public function mount()
    {
        $this->classes = Classroom::orderBy('name', 'asc')->get();

        $this->class_id = $this->classes->first()->id ?? null;

        $this->getTeachers();
    }

    public function updatedClassId()
    {
        $this->getTeachers();
    }

    public function getTeachers()
    {
        if ($this->class_id) {
            $this->teachers = Teacher::where('class_id', $this->class_id)
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $this->teachers = [];
        }
    }

    public function edit($id)
    {

        $this->dispatch("editTeacher", $id);
    }

    public function delete($id)
    {
        $this->teacherId = $id;
        Flux::modal("delete-teacher")->show();
    }

    public function destroy()
    {

        Teacher::find($this->teacherId)->delete();

        LivewireAlert::title('Teacher deleted!')
            ->text('Teacher has been deleted.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal("delete-teacher")->close();
        $this->getTeachers();
    }

    public function render()
    {
        return view('livewire.teacher-resource.list-teacher-by-class');
    }
}
