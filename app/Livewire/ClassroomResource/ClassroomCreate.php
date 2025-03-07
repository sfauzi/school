<?php

namespace App\Livewire\ClassroomResource;

use Flux\Flux;
use Livewire\Component;
use App\Models\Classroom;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ClassroomCreate extends Component
{

    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        LivewireAlert::title('Classroom created!')
            ->text('Classroom has been created.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal('create-classroom')->close();

        $this->dispatch('reloadClassrooms');
    }

    public function render()
    {
        return view('livewire.classroom-resource.classroom-create');
    }
}
