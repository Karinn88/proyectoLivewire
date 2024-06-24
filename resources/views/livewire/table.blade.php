
<div class="container flex justify-center">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <div class="p-5 text-center">
        <div class="p-4 ">
            <table class="table table-hover ">
                <input type="hidden" wire:model="selected_id">
                <thead>
                <tr>
                    <th scope="col" class="bg-info p-3">Nombre</th>
                    <th scope="col" class="bg-info p-3">Email</th>
                    <th scope="col" class="bg-info p-3">Personaje</th>
                    <th scope="col" class="bg-info p-3">Historia</th>
                    <th scope="col" class="bg-info text-end p-3">Editar/Eliminar</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($forms as $form)
                        <tr >
                            <td class="p-3">{{ $form->name ?? ''}}</td>
                            <td class="p-3">{{ $form->email ?? ''}}</td>
                            <td class="p-3">{{ $form->character ?? ''}}</td>
                            <td class="p-3">{{ $form->history ?? ''}}</td>
                            <td class="flex justify-content-end">
                                @if (auth()->user())
                                @if (auth()->user()->hasRole('admin') || auth()->user()->id == $form->user_id)
                                    <a href="{{ route('form-edit', ['id' => $form->id]) }}" class="btn btn-success m-2">Editar</a>
                                    <button class="btn btn-danger m-2" wire:click="delete('{{ $form->id }}')">Eliminar</button>
                                    @else
                                    <span class="p-4">{{ '' }}</span>
                                @endif
                            @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay registros disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

