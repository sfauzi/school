<?php

namespace App\Livewire\ParentResource;

use Flux\Flux;
use App\Models\Student;
use Livewire\Component;
use App\Models\OrangTua;
use App\Models\Classroom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ParentCreate extends Component
{

    public $name;
    public $student_id;
    // public $class_id;
    public $students; // Untuk menampung daftar kelas
    public $classrooms; // Untuk menampung daftar kelas


    public function mount()
    {
        $this->students = Student::all(); // Ambil daftar kelas dari database
        // $this->classrooms = Classroom::all();
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id', // Pastikan ID kelas valid
            // 'class_id' => 'required|exists:classrooms,id', // Pastikan ID kelas valid
        ]);

        // Simpan data ke database
        OrangTua::create([
            'name' => $this->name,
            'student_id' => $this->student_id,
            // 'class_id' => $this->class_id,
        ]);

        // Reset input setelah sukses
        $this->reset('name', 'student_id');

        LivewireAlert::title('Parent created!')
            ->text('Parent has been created.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal('create-parent')->close();

        $this->dispatch('reloadParents');
    }


    public function render()
    {
        return view('livewire.parent-resource.parent-create');
    }
}
