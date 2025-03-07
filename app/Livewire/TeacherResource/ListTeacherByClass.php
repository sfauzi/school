<?php

namespace App\Livewire\TeacherResource;

use App\Models\Teacher;
use Livewire\Component;
use App\Models\Classroom;

class ListTeacherByClass extends Component
{
    public $class_id;
    public $teachers = [];
    public $classes;

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

    public function render()
    {
        return view('livewire.teacher-resource.list-teacher-by-class');
    }
}
