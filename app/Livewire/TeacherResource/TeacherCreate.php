<?php

namespace App\Livewire\TeacherResource;

use App\Models\Classroom;
use Flux\Flux;
use App\Models\Teacher;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class TeacherCreate extends Component
{

    public $name;
    public $class_id;
    public $classrooms; // Untuk menampung daftar kelas

    public function mount()
    {
        $this->classrooms = Classroom::all(); // Ambil daftar kelas dari database
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classrooms,id', // Pastikan ID kelas valid
        ]);

        // Simpan data ke database
        Teacher::create([
            'name' => $this->name,
            'class_id' => $this->class_id,
        ]);

        // Reset input setelah sukses
        $this->reset('name', 'class_id');

        LivewireAlert::title('Teacher created!')
            ->text('Teacher has been created.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal('create-teacher')->close();

        $this->dispatch('reloadTeachers');
    }


    public function render()
    {
        return view('livewire.teacher-resource.teacher-create');
    }
}
