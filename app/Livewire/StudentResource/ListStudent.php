<?php

namespace App\Livewire\StudentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListStudent extends Component
{
    public $students, $studentId;

    public function mount()
    {
        $this->students = Student::with('classroom')->get();
    }

    #[On("reloadStudents")]
    public function reloadStudents()
    {
        $this->students = Student::with('classroom')->get();
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
        $this->dispatch("reloadStudents");
    }
    public function render()
    {
        return view('livewire.student-resource.list-student');
    }
}
