<div class="container">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
   <div class="flex justify-center">
      <form wire:submit.prevent="save" class="flex flex-col m-4 w-96 ">
            <h2 class="text-center">Posts</h2>
            
            <label for="title">Título:</label>
            <input wire:model='title' name="title" id="title" type="text"  class="m-3">

            <label for="description">Descripción:</label>
            <textarea wire:model='description' name="description" id="description" cols="30" rows="10" class="m-3"></textarea>

            <button class="btn btn-success m-3" wire:click='save'>Enviar</button>
      </form>
   </div>
   
   <div>
      @foreach ( $posts as $post )
        <div class="flex flex-col bg-white border-2" >
          <div class="p-3 flex flex-row text-center">
            <div>
              <h3>{{ $post->name ?? '' }}</h3>
              @php
                $user = \App\Models\User::find($post->user_id);
              @endphp
              @if ($user && $user->image)
              <div>
                <img src="{{ asset('storage/' . $user->image) }}" alt="Imagen de perfil" class="object-cover h-40 w-64 rounded-xl" >
              </div>  
              @endif
            </div>
              <div class="flex flex-col justify-center m-5 w-screen">
                  <h4 class="text-center">{{ $post->title ?? ''}}</h4>
                  <p class="text-center">{{ $post->description ?? ''}}</p>
              </div>
              <div class="likes">
                @if ($post->user_id !== auth()->id())
                    @php
                        $hasLiked = $post->isLikedByUser(auth()->id());
                    @endphp
                    <form wire:submit.prevent="toggleLike({{ $post->id }})">
                        @csrf
                        <button type="submit" class="btn {{ $hasLiked ? 'btn-success' : 'btn-primary' }}">
                            {{ $hasLiked ? 'Liked' : 'Like' }}
                        </button>
                    </form>
                @endif
                <p>{{ $post->likes()->count() }} Likes</p>
            </div>
              <div>
                <p class="text-center text-muted text-xs">
                  Creado el: {{ $post->created_at->format('d/m/Y H:i') }}
                </p>
                <p class="text-center text-muted text-xs">
                  Actualizado el: {{ $post->updated_at->format('d/m/Y H:i') }}
                </p>
              </div>
          </div>
            <div class="flex justify-end m-2">
              @if (auth()->user())
                @if (auth()->user()->hasRole('admin') || auth()->user()->id == $post->user_id)
                <button class="btn btn-warning m-1" wire:click="edit({{ $post->id }})" data-scroll-to-top>Editar</button>
                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                      document.querySelectorAll('[data-scroll-to-top]').forEach(button => {
                          button.addEventListener('click', function () {
                              window.scrollTo({ top: 0, behavior: 'smooth' });
                          });
                      });
                  });
              </script> 
                <button class="btn btn-danger m-1" wire:click="destroy({{ $post->id }})">Eliminar</button>
                @endif                  
              @endif 
            </div>         
        </div>
      @endforeach
   </div>
</div>
