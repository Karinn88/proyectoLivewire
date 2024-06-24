<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\PostEsther as PostE;
use Illuminate\Support\Facades\Auth;

class PostEsther extends Component
{
    public $id, $name, $title, $description, $postId, $post;
    // public $count = 1;
    protected $rules = [
        "title"=> "required|string",
        "description"=> "required|min:6",
    ];

    protected $message = [
        "title.required" => "Añade un título a tu post",
        "description.required" => "Añade una descripción",
        "description.min" => "Ha de tener mínimo 6 caracteres",
    ];
    
    public function mount($id = null){

        if ($id) {
            $post = PostE::findOrFail($id);
            $this->postId = $post->id;
            $this->name = $post->user->name;
            $this->title = $post->title;
            $this->description = $post->description;
        } else {
            $this->resetPost();
        }
  
    }
    public function resetPost(){
        $this->postId = null;
        $this->title = '';    
        $this->description = '';
        $this->name = '';
    }

    public function save(){
                
        if ($this->postId) {
            $this->validate();
            $post = PostE::findOrFail($this->postId);
            $post->update([
                'user_id'=>auth()->user()->id,
                'name'=> auth()->user()->name,
                "title"=> $this->title,
                "description"=> $this->description, 
            ]);
        } else {
            $this->validate();
            $post = PostE::create([
                    'user_id'=>auth()->user()->id,
                    'name'=> auth()->user()->name,
                    "title"=> $this->title,
                    "description"=> $this->description,
                    
                ]);
            $this->name = Auth::user()->name;
        }
        
        $this->resetPost();
        $this->post = PostE::all();
       
    }

    public function edit($id){
        $post = PostE::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->name = auth()->user()->name;
    }

    //likes
    public function toggleLike(PostE $post)
    {
        $user = auth()->user();
    
        if (!$post) {
            return response()->json(['message' => 'El post no existe.'], 404);
        }
    
        // Verify if the user is the author of the post.
        if ($post->user_id == $user->id) {
            return response()->json(['message' => 'No puedes dar like a tu propio post.'], 403);
        }
    
        // Checks if the user has already liked the post
        $like = $post->likes()->where('user_id', $user->id)->first();
        
        if ($like) {
            // If you have already liked it, remove the like
            $like->delete();
            return response()->json(['message' => 'Like eliminado con éxito.']);
        } else {
            // If you haven't liked it, create a new like
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
            return response()->json(['message' => 'Like añadido con éxito.']);
        }
    }

    public function destroy(PostE $post){
          $post->delete();
    }  
    
    public function render()
    {

        $posts = PostE::all()->reverse();
        return view('livewire.post-esther',compact('posts'));
    }
}

