<?php

namespace App\Http\Livewire;

use App\Models\Quartier;
use App\Models\Ville;
use Livewire\Component;

class VillesAdmin extends Component
{
    public $villes, $selected_ville, $deleted_ville;
    public $quartiers, $selected_quartier, $deleted_quartier;

    protected $listeners = ['submitAdd', 'submitEdit', 'confirmDelete', 'submitAddQuartier', 'submitEditQuartier', 'confirmDeleteQuartier'];

    public function mount()
    {
        $this->villes = Ville::get();
    }

    public function render()
    {
        $this->quartiers = Quartier::when($this->selected_ville != 0, function ($query) {
            $query->where('ville_id', $this->selected_ville);
        })->get();

        return view('livewire.villes-admin');
    }

    public function selectVille($id)
    {
        if ($this->selected_ville != $id) {
            $this->selected_ville = $id;
        } else {
            $this->selected_ville = null;
        }
    }
    public function add()
    {
        $this->dispatchBrowserEvent('swal:addVille', [
            'title' => 'Ajouter un ville',
            'button' => 'Ajouter',
            'returnFunction' => 'submitAdd',
        ]);
    }

    public function edit($id)
    {
        $this->selected_ville = $id;
        $p = Ville::find($id);
        $this->dispatchBrowserEvent('swal:addVille', [
            'title' => 'Modifier un ville',
            'button' => 'Modifier',
            'ville' => $p->title,
            'returnFunction' => 'submitEdit',
        ]);
    }

    public function delete($id)
    {
        $this->deleted_ville = $id;
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'text' => 'Vous ne pourrez pas revenir en arrière !',
            'returnFunction' => 'confirmDelete',
        ]);
    }

    public function submitAdd($title)
    {
        $ville = new Ville();
        $ville->title = $title;
        $ville->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'text' => 'Saved successfully !'
        ]);
        $this->villes = Ville::get();
    }

    public function submitEdit($title)
    {
        $ville = Ville::find($this->selected_ville);
        $ville->title = $title;
        $ville->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'ville' => 'success',
            'text' => 'Saved successfully !'
        ]);
        $this->villes = Ville::get();
    }

    public function confirmDelete()
    {
        $ville = Ville::find($this->deleted_ville);
        $ville->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'ville' => 'success',
            'text' => 'Suprimé en success !'
        ]);
    }

    public function addQuartier()
    {
        $this->dispatchBrowserEvent('swal:addVille', [
            'title' => 'Ajouter un quartier',
            'button' => 'Ajouter',
            'returnFunction' => 'submitAddQuartier',
        ]);
    }

    public function editQuartier($id)
    {
        $this->selected_quartier = $id;
        $e = Quartier::find($id);
        $this->dispatchBrowserEvent('swal:addVille', [
            'title' => 'Modifier un quartier',
            'button' => 'Modifier',
            'ville' => $e->title,
            'returnFunction' => 'submitEditQuartier',
        ]);
    }

    public function deleteQuartier($id)
    {
        $this->deleted_quartier = $id;
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'text' => 'Vous ne pourrez pas revenir en arrière !',
            'returnFunction' => 'confirmDeleteQuartier',
        ]);
    }

    public function submitAddQuartier($title)
    {
        $quartier = new Quartier();
        $quartier->ville_id = $this->selected_ville;
        $quartier->title = $title;
        $quartier->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'text' => 'Saved successfully !'
        ]);
    }

    public function submitEditQuartier($title)
    {
        $quartier = Quartier::find($this->selected_quartier);
        $quartier->title = $title;
        $quartier->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'text' => 'Saved successfully !'
        ]);
    }

    public function confirmDeleteQuartier()
    {
        $quartier = Quartier::find($this->deleted_quartier);
        $quartier->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'text' => 'Suprimé en success !'
        ]);
    }
}