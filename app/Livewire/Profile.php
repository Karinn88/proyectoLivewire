<?php

namespace App\Http\Livewire;

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Profile extends Component
{
    use WithFileUploads;

    public $image;
    
    public function uploadImage(): void
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);

        $user = Auth::user();
        if ($user) {
            if ($this->image) {
                $path = $this->image->store('images', 'public');
                $user->image = $path;
                // $user->save();
            }
        } else {
            $this->image = null;
        }
        
        
    }

    public function render(): mixed
    {
        return view('livewire.profile');
    }
}
