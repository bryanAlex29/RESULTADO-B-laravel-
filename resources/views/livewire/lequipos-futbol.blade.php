<div style="font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <form wire:submit.prevent="guardar">
        <h2 style="text-align: center; color: #333; margin-bottom: 30px;">Registrar Equipo de Fútbol</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; margin-bottom: 20px;">
            <div style="margin-bottom: 15px;">
                <label for="nombre" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Nombre:</label>
                <input type="text" id="nombre" wire:model="nombre" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('nombre') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="marca" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Marca:</label>
                <input type="text" id="marca" wire:model="marca" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('marca') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="deporte" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Deporte:</label>
                <input type="text" id="deporte" wire:model="deporte" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('deporte') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="talla" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Talla:</label>
                <input type="text" id="talla" wire:model="talla" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('talla') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="material" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Material:</label>
                <input type="text" id="material" wire:model="material" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('material') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="precio" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Precio:</label>
                <input type="number" id="precio" wire:model="precio" step="0.01" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('precio') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="stock" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Stock:</label>
                <input type="number" id="stock" wire:model="stock" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('stock') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <label for="condicion" style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Condición:</label>
                <select id="condicion" wire:model="condicion" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; background-color: #fff;">
                    <option value="">Seleccione una condición</option>
                    @foreach($opcionesCondicion as $opcion)
                        <option value="{{ $opcion }}">{{ ucfirst($opcion) }}</option>
                    @endforeach
                </select>
                @error('condicion') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom: 15px; display: flex; align-items: center;">
                <label for="estado" style="font-weight: bold; color: #555; margin-right: 10px;">Estado:</label>
                <input type="checkbox" id="estado" wire:model="estado" style="transform: scale(1.2);">
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px; margin-bottom: 40px;">
            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-right: 10px;">GuardarP</button>
            <button type="submit" style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-right: 10px;">{{ $equipo_id ? 'Actualizar' : 'Cargar' }}</button>
            <button type="button" wire:click="cancelar" style="background-color: #f44336; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Cancelar</button>
        </div>

        ---

        <h2 style="text-align: center; color: #333; margin-top: 40px; margin-bottom: 30px;">Equipos Registrados</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            @foreach($equipos as $equipo)
                <div style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); transition: transform 0.2s ease-in-out;">
                    <h3 style="color: #333; margin-top: 0; margin-bottom: 10px; border-bottom: 2px solid #008CBA; padding-bottom: 5px;">{{ $equipo->nombre }}</h3>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Marca:</strong> {{ $equipo->marca }}</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Deporte:</strong> {{ $equipo->deporte }}</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Talla:</strong> {{ $equipo->talla }}</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Material:</strong> {{ $equipo->material }}</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Precio:</strong> ${{ number_format($equipo->precio, 2) }}</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Stock:</strong> {{ $equipo->stock }} unidades</p>
                    <p style="margin-bottom: 5px; color: #666;"><strong style="color: #333;">Condición:</strong> {{ ucfirst($equipo->condicion) }}</p>
                    <p style="margin-bottom: 15px; color: #666;"><strong style="color: #333;">Estado:</strong> <span style="font-weight: bold; color: {{ $equipo->estado ? '#4CAF50' : '#f44336' }};">{{ $equipo->estado ? 'Activo' : 'Inactivo' }}</span></p>
                    <div style="display: flex; justify-content: space-around; gap: 10px;">
                        <button type="button" wire:click="editar({{ $equipo->id }})" style="background-color: #2196F3; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; flex-grow: 1;">Editar</button>
                        <button type="button" wire:click="eliminar({{ $equipo->id }})" style="background-color: #f44336; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; flex-grow: 1;">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>