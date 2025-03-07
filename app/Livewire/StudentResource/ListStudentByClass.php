<?php

namespace App\Livewire\StudentResource;

use App\Models\Student;
use Livewire\Component;
use App\Models\Classroom;

class ListStudentByClass extends Component
{

    public $class_id;
    public $students = [];
    public $classes;

    public function mount()
    {
        $this->classes = Classroom::orderBy('name', 'asc')->get();

        // Set default class_id ke kelas pertama jika ada
        $this->class_id = $this->classes->first()->id ?? null;

        // Ambil daftar siswa dari kelas pertama (jika ada)
        if ($this->class_id) {
            $this->getStudents();
        }
    }

    public function updatedClassId()
    {
        $this->getStudents();
    }

    public function getStudents()
    {
        $this->students = Student::where('class_id', $this->class_id)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.student-resource.list-student-by-class');
    }
}
