<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Classroom;

class Listing extends Component
{

    public $class_id;
    public $students = [];
    public $classes;
    public $teachers = [];

    public function mount()
    {
        $this->classes = Classroom::all();
        $this->teachers = Teacher::with('classroom')->get();
        $this->students = Student::with('classroom')->get();
    }

    public function updatedClassId()
    {
        $this->students = Student::where('class_id', $this->class_id)->get();
        $this->teachers = Teacher::whereHas('classroom', function ($query) {
            $query->where('id', $this->class_id);
        })->get();
    }


    public function render()
    {
        return view('livewire.listing');
    }
}
