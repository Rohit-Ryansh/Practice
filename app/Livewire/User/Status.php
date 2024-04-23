<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Status extends Component
{
    public $user;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.user.status');
    }

    public function status()
    {
        $this->user->update(['status' => !$this->user->status]);

        toastr()->success(ucfirst($this->user->getRoleNames()[0]) . ' status updated successfully !');
    }
}
