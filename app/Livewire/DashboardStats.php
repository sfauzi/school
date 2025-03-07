<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Classroom;

class DashboardStats extends Component
{

    public $studentsCount;
    public $teachersCount;
    public $classesCount;

    public function mount()
    {
        $this->studentsCount = Student::count();
        $this->teachersCount = Teacher::count();
        $this->classesCount = Classroom::count();
    }


    
    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
