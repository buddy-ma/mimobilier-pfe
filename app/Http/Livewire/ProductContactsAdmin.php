<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductContact;

class ProductContactsAdmin extends Component
{
    public $contacts;
    public $contact, $voir = false;
    public function mount()
    {
        $this->contacts = ProductContact::get();
    }
    public function render()
    {
        return view('livewire.product-contacts-admin');
    }

    public function voir($id)
    {
        $this->contact = ProductContact::find($id);
        $this->voir = true;
    }

    public function closeVoir()
    {
        $this->contact = null;
        $this->voir = false;
    }

    public function repondre($id)
    {
        $c = ProductContact::find($id);
        $c->answered = 1;
        $c->save();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Saved Successfully!',
        ]);
        $this->contacts = ProductContact::get();
    }
}