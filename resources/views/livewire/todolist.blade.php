
<div class="container">
    {{-- @if (session()->has('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Mensaje!</strong> {{ session('msg') }}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif --}}
    <div class=" row justify-content-center text-center">
        <div class="col-6">
            <input wire:model="task" wire:keydown.enter="addTask" type="text" class="form-control">
            
            @error('task')
                <div class="m-4">
                    <span class="alert alert-danger">{{$message}}</span>
                </div>
            @enderror
            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Hecha</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="{{$task->done ? 'text-black text-decoration-line-through' : '' }}">
                            <th scope="row">
                                <input wire:click="done({{$task->id}})" type="checkbox" {{$task->done ? 'checked' : '' }}>
                            </th>
                             <td>{{$task->task}}</td>
                             <td>
                                <button class="btn btn-danger btn-sm" wire:click='delete({{ $task->id }})'>Eliminar</button>
                        </td>
                        </tr>         
                        @empty
                            <p>No hay tareas disponibles</p>
                        @endforelse                    
                </tbody>
            </table>
        </div>
    </div>
</div>
