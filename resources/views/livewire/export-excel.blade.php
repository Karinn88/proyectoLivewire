<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <div>
        <h2 class="text-center m-3">Sección administrador</h2>
        <h4>Exporta todos los datos sobre los empleados:</h4>
        @if (auth()->user())
            @if (auth()->user()->hasRole('admin'))
                <button wire:click="export" class="btn btn-success m-3">Exportar Datos a Excel</button>
            @endif
        @endif

    </div>
    
</div>
