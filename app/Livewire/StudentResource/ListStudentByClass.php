<?php

namespace App\Livewire\StudentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use App\Models\Classroom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListStudentByClass extends Component
{

    public $class_id;
    public $students = [];
    public $classes;
    public $studentId;

    protected $listeners = [
        'editStudentSuccess' => 'getStudents' // Event untuk reload data setelah edit
    ];

    public function mount()
    {
        $this->classes = Classroom::orderBy('name', 'asc')->get();
        $this->class_id = $this->classes->first()->id ?? null;

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

    public function edit($id)
    {

        $this->dispatch("editStudent", $id);
    }

    public function delete($id)
    {
        $this->studentId = $id;
        Flux::modal("delete-student")->show();
    }

    public function destroy()
    {

        Student::find($this->studentId)->delete();

        LivewireAlert::title('Student deleted!')
            ->text('Student has been deleted.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal("delete-student")->close();
        $this->getStudents();
    }

    public function render()
    {
        return view('livewire.student-resource.list-student-by-class');
    }
}
