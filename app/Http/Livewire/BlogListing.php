<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Categorie;
use Livewire\Component;

class BlogListing extends Component
{
    public $categories, $selected_category, $deleted;
    public $search, $paginate, $order_by, $sort_by, $perPage;

    protected $listeners = ['confirmDeleteBlog'];

    public function mount($decouvrez = 0)
    {
        if ($decouvrez == 1) {
            $this->selected_category = 9;
        } else {
            $this->selected_category = 0;
        }
        $this->search = '';
        $this->sort_by = 'DESC';
        $this->order_by = 'title';
        $this->perPage = 10;
        $this->categories = Categorie::get();
    }

    public function render()
    {
        $blogs = Blog::leftJoin('blog_has_categories as bc', 'bc.blog_id', 'blogs.id')
            ->when($this->selected_category != 0, function ($query) {
                $query->where('bc.categorie_id', $this->selected_category);
            })
            ->where('blogs.approved', 1)
            ->groupBy('bc.blog_id', 'blogs.id')
            ->select('blogs.*')
            ->search(trim($this->search))
            ->orderby($this->order_by, $this->sort_by)
            ->paginate($this->perPage);

        return view('livewire.blog-listing', [
            'blogs' => $blogs
        ]);
    }

    public function enable($id)
    {
        $b = Blog::find($id);
        $b->status = 1;
        $b->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Saved Successfully!',
        ]);
    }

    public function disable($id)
    {
        $b = Blog::find($id);
        $b->status = 0;
        $b->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Saved Successfully!',
        ]);
    }

    public function delete($id)
    {
        $this->deleted = $id;
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'text' => 'Vous ne pourrez pas revenir en arrière !',
            'fun' => 'confirmDeleteBlog',
        ]);
    }

    public function confirmDeleteBlog()
    {
        $blogg = Blog::find($this->deleted);
        $blogg->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'text' => 'Suprimé en success !'
        ]);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->sort_by = 'ASC';
        $this->order_by = 'title';
        $this->perPage = 10;
        $this->selected_category = 0;
    }
}
