<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <div class="row justify-content-center my-5 bg-warning p-4">
        <form wire:submit.prevent="saveData" class="bg-slater-600">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" wire:model="name" class="form-control" id="name" placeholder="Nombre">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" wire:model="email" class="form-control" id="email" placeholder="Correo electrónico">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="character" class="form-label">Personaje</label>
                <input type="text" wire:model="character" class="form-control" id="character" placeholder="Personaje">
                @error('character')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="textzone" class="form-label">Breve información del personaje:</label>
                <textarea wire:model="history" class="form-control" id="textzone" rows="3"></textarea>
                @error('history')
                    {{ $message }}
                @enderror
            </div>
            <div>
                
                <button wire:click="saveData({{ $user_id->id ?? '' }})"  class="btn btn-success" >Enviar</button>
             </div>
        </form>
    </div>
</div>