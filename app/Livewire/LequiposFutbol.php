<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EquipoFut;
use Illuminate\Validation\Rule;
class LequiposFutbol extends Component
{
    public $nombre;
    public $marca;
    public $deporte;
    public $talla;
    public $material;
    public $precio;
    public $stock;
    public $condicion;
    public $estado = true; // Por defecto, el estado es activo
     public function render()
    {
        $equipos = EquipoFut::all();
        return view('livewire.lequipos-futbol',compact('equipos'));
    }

    
    public $opcionesCondicion = [
        'nuevo',
        'usado',
        'reacondicionado'
    ];
// ...existing code...
    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:50',
            'deporte' => 'required|string|max:50',
            'talla' => 'required|string|max:20',
            'material' => 'required|string|max:80',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'condicion' => ['required', Rule::in($this->opcionesCondicion)],
            'estado' => 'boolean'
        ]);

        EquipoFut::create([
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'deporte' => $this->deporte,
            'talla' => $this->talla,
            'material' => $this->material,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'condicion' => $this->condicion,
            'estado' => $this->estado
        ]);
        
        
    }
    public function eliminar($id)
    {
        $equipo = EquipoFut::find($id);
        if ($equipo) {
            $equipo->delete();
            session()->flash('message', 'Equipo eliminado correctamente.');
        } else {
            session()->flash('error', 'Equipo no encontrado.');
        }
    }
    public $equipo_id = null;

    public function editar($id)
    {
        $equipo = EquipoFut::find($id);
        if ($equipo) {
            $this->equipo_id = $equipo->id;
            $this->nombre = $equipo->nombre;
            $this->marca = $equipo->marca;
            $this->deporte = $equipo->deporte;
            $this->talla = $equipo->talla;
            $this->material = $equipo->material;
            $this->precio = $equipo->precio;
            $this->stock = $equipo->stock;
            $this->condicion = $equipo->condicion;
            $this->estado = $equipo->estado;
        }
    }

    public function cargar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:50',
            'deporte' => 'required|string|max:50',
            'talla' => 'required|string|max:20',
            'material' => 'required|string|max:80',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'condicion' => ['required', Rule::in($this->opcionesCondicion)],
            'estado' => 'boolean'
        ]);

        if ($this->equipo_id) {
            // Actualizar
            $equipo = EquipoFut::find($this->equipo_id);
            if ($equipo) {
                $equipo->update([
                    'nombre' => $this->nombre,
                    'marca' => $this->marca,
                    'deporte' => $this->deporte,
                    'talla' => $this->talla,
                    'material' => $this->material,
                    'precio' => $this->precio,
                    'stock' => $this->stock,
                    'condicion' => $this->condicion,
                    'estado' => $this->estado
                ]);
            }
        } else {
            // Crear
            EquipoFut::create([
                'nombre' => $this->nombre,
                'marca' => $this->marca,
                'deporte' => $this->deporte,
                'talla' => $this->talla,
                'material' => $this->material,
                'precio' => $this->precio,
                'stock' => $this->stock,
                'condicion' => $this->condicion,
                'estado' => $this->estado
            ]);
        }

        $this->cancelar();
    }

    public function cancelar()
    {
        $this->reset(['equipo_id','nombre','marca','deporte','talla','material','precio','stock','condicion','estado']);
        $this->estado = true;
    }



}
