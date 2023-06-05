<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Users extends Component
{
    use WithPagination, AuthorizesRequests;

    public $roles;
    public $user_id;
    public $firstname;
    public $lastname;
    public $email;
    public $display_name;
    public $phone;
    public $avatar;
    public $role;
    public $search_user;
    public $password;
    public $password_confirmation;
    public $ShowAddUser = false;
    public $ShowupdateUser = false;
    public $confirming = 0;
    public $search;
    public $select     = [];
    public $showpassword = false;

    use WithFileUploads;
    public function render()
    {
        $users = User::search(trim($this->search_user))->orderBy('id', 'DESC')->paginate(5);

        if ($this->ShowupdateUser == true || $this->ShowAddUser == true) {
            $this->roles = Role::all();
        }

        return view('livewire.admin.users.users', ["users" => $users]);
    }

    public function resetFilters()
    {
        $this->search = '';
    }

    private function resetInputFields()
    {
        $this->select         = [];
    }

    public function confirmdelete($id)
    {
        $this->confirming = $id;
    }

    public function Canceldelete()
    {
        $this->confirming = 0;
    }

    public function ShowAddUser()
    {
        $this->resetValidation();
        $this->resetInputFields();
        $this->roles = Role::all();
        $this->ShowupdateUser = false;
        $this->ShowAddUser = !$this->ShowAddUser;
    }

    public function toDesable($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
    }

    public function UserShow($id)
    {
        $user = User::find($id);
        $this->roles = Role::all();

        $usrols = $user->getRoleNames()->toArray();

        foreach ($usrols as $usrol) {
            $this->select[$usrol] = $usrol;
        }

        $this->firstname      = $user->firstname;
        $this->user_id        = $user->id;
        $this->lastname       = $user->lastname;
        $this->phone          = $user->phone;
        $this->email          = $user->email;
        $this->password       = '';
        $this->ShowAddUser    = false;
        $this->ShowupdateUser = true;
    }

    public function UserAdd()
    {
        $this->validate(
            [
                'firstname'     => 'required|string|max:50|min:2',
                'lastname'      => 'required|string|max:50|min:2',
                'phone'         => 'required|unique:users,phone|string',
                'email'         => 'required|email|unique:users,email|max:50',
                'password'      => 'required',
                'select'        => 'required',
                'avatar'        => 'nullable|image|max:2048',
            ],
            [
                'select.required'  => 'please check a role first',
            ]
        );

        $user = new User;
        $user->firstname = $this->firstname;
        $user->lastname  = $this->lastname;
        $user->phone     = $this->phone;
        $user->email     = $this->email;
        $user->password  = Hash::make($this->password);
        if (!empty($this->avatar)) {
            $avatar = md5(microtime()) . '.' . $this->avatar->extension();
            $this->avatar->storeAs('public/users', $avatar);
            $user->avatar = $avatar;
        }
        $user->save();

        $user->assignRole(array_values($this->select));

        $this->ShowAddUser  = false;
        $this->select       = [];

        $this->dispatchBrowserEvent('swal:modal', [
            'type'    => 'success',
            'message' => 'User Added Successfully!',
        ]);
    }

    public function UserUpdate()
    {
        $this->validate(
            [
                'firstname'       => 'required|string|max:50|min:2',
                'lastname'        => 'required|string|max:50|min:2',
                'phone'           => 'required|string|max:20|min:2',
                'email'           => 'required|email|max:50|unique:users,email,' . $this->user_id,
                'select'          => 'required',
            ],
            [
                'select.required' => 'please check a role first',
            ]
        );
        $user = User::find($this->user_id);
        $user->firstname = $this->firstname;
        $user->lastname  = $this->lastname;
        $user->phone     =  $this->phone;
        $user->email     = $this->email;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        $user->syncRoles(array_values($this->select));
        $this->ShowupdateUser = false;
        $this->dispatchBrowserEvent('swal:modal', [
            'type'    => 'success',
            'message' => 'User Updated Successfully!',
        ]);
    }
    public function showpassword()
    {
        $this->showpassword = !$this->showpassword;
    }

    public function rand_string()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $this->password = substr(str_shuffle($chars), 0, 8);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type'    => 'success',
            'message' => 'User Removed Successfully!',
        ]);
    }

    public function Close()
    {
        $this->ShowupdateUser = false;
        $this->ShowAddUser    = false;
        $this->select         = [];
    }
}
