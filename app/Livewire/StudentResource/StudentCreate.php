<?php

namespace App\Livewire\StudentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use App\Models\Classroom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class StudentCreate extends Component
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
        Student::create([
            'name' => $this->name,
            'class_id' => $this->class_id,
        ]);

        // Reset input setelah sukses
        $this->reset('name', 'class_id');

        LivewireAlert::title('Student created!')
            ->text('Student has been created.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal('create-student')->close();

        $this->dispatch('reloadStudents');
    }


    public function render()
    {
        return view('livewire.student-resource.student-create');
    }
}
