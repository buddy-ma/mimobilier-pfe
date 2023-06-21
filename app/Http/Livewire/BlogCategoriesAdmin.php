<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConseilCategory;

class BlogCategoriesAdmin extends Component
{
    public $categories;
    public $addCategory = false, $categorie_title;
    public $editCategory = false, $selectedId, $deletedId;
    protected $listeners = ['confirmDelete'];

    public function mount()
    {
        $this->categories = ConseilCategory::get();
    }

    public function render()
    {
        return view('livewire.blog-categories-admin');
    }

    public function addCategory()
    {
        $this->addCategory = !$this->addCategory;
    }

    public function storeCategory()
    {
        $this->validate([
            'categorie_title' => 'required|string|min:2|max:255'
        ]);

        $categorie = new ConseilCategory();
        $categorie->title = $this->categorie_title;
        $categorie->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Saved Successfully!',
        ]);
        $this->resetInput();
    }

    public function updateCategory()
    {
        $this->validate([
            'categorie_title' => 'required|string|min:2|max:255'
        ]);

        $categorie = ConseilCategory::find($this->selectedId);
        $categorie->title = $this->categorie_title;
        $categorie->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Updated Successfully!',
        ]);
        $this->resetInput();
    }

    public function editCategory($id)
    {
        $this->selectedId = $id;
        $c = ConseilCategory::find($id);
        $this->categorie_title = $c->title;
        $this->editCategory = true;
    }

    public function delete($id)
    {
        $this->deletedId = $id;

        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'fun' => 'confirmDelete'
        ]);
    }

    public function confirmDelete()
    {
        $c = ConseilCategory::find($this->deletedId);
        $c->delete();
        $this->categories = ConseilCategory::get();
    }

    public function resetInput()
    {
        $this->categorie_title = '';
        $this->editCategory = false;
        $this->addCategory = false;
        $this->selectedId = null;
        $this->categories = ConseilCategory::get();
    }
}