<?php

namespace App\Livewire\TeacherResource;

use Flux\Flux;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListTeacher extends Component
{

    public $teachers, $teacherId;

    public function mount()
    {
        $this->teachers = Teacher::with('classroom')->get();
    }

    #[On("reloadTeachers")]
    public function reloadTeachers()
    {
        $this->teachers = Teacher::with('classroom')->orderBy('created_at', 'desc')->get();
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
        $this->dispatch("reloadTeachers");
    }

    public function render()
    {
        return view('livewire.teacher-resource.list-teacher');
    }
}
