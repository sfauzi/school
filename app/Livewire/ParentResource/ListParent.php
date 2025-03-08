<?php

namespace App\Livewire\ParentResource;

use Flux\Flux;
use Livewire\Component;
use App\Models\OrangTua;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ListParent extends Component
{

    public $parents, $parentId;

    public function mount()
    {
        $this->parents = OrangTua::with('student')->orderBy('created_at', 'desc')->get();
    }

    #[On("reloadParents")]
    public function reloadParents()
    {
        $this->parents = OrangTua::with('student')->orderBy('created_at', 'desc')->get();
    }

    public function edit($id)
    {

        $this->dispatch("editParent", $id);
    }

    public function delete($id)
    {
        $this->parentId = $id;
        Flux::modal("delete-parent")->show();
    }

    public function destroy()
    {

        OrangTua::find($this->parentId)->delete();

        LivewireAlert::title('Parent deleted!')
            ->text('Parent has been deleted.')
            ->success()
            ->toast()
            ->position('top-end')
            ->show();

        Flux::modal("delete-parent")->close();
        $this->dispatch("reloadParents");
    }

    public function render()
    {
        return view('livewire.parent-resource.list-parent');
    }
}
