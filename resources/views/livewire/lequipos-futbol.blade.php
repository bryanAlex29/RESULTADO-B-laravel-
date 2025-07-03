<div>
    <form wire:submit.prevent="guardar">
        <h2>Registrar Equipo de Fútbol</h2>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" required>
            @error('nombre') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" wire:model="marca" required>
            @error('marca') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="deporte">Deporte:</label>
            <input type="text" id="deporte" wire:model="deporte" required>
            @error('deporte') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="talla">Talla:</label>
            <input type="text" id="talla" wire:model="talla" required>
            @error('talla') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="material">Material:</label>
            <input type="text" id="material" wire:model="material" required>
            @error('material') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" wire:model="precio" step="0.01" required>
            @error('precio') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" wire:model="stock" required>
            @error('stock') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="condicion">Condición:</label>
            <select id="condicion" wire:model="condicion" required>
                <option value="">Seleccione una condición</option>
                @foreach($opcionesCondicion as $opcion)
                    <option value="{{ $opcion }}">{{ ucfirst($opcion) }}</option>
                @endforeach
            </select>
            @error('condicion') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="estado">Estado:</label>
            <input type="checkbox" id="estado" wire:model="estado">
        </div>

        <div>
            <button type="submit">Guardar</button>
            <button type="button" wire:click="reset">Cancelar</button>
        </div>
    </form>
</div>