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
    public $estado = true; 
    public $equipo_id = null; 

    public function render()
    {
        $equipos = EquipoFut::all();
        return view('livewire.lequipos-futbol', compact('equipos'));
    }

    public $opcionesCondicion = [
        'nuevo',
        'usado',
        'reacondicionado'
    ];
    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'marca' => 'required|string|max:50',
            'deporte' => 'required|string|max:50',
            'talla' => 'required|string|max:20',
            'material' => 'required|string|max:80',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'condicion' => ['required', Rule::in(['nuevo', 'usado', 'reacondicionado'])],
            'estado' => 'boolean'
        ];
    }
    public function guardar()
    {  
        $this->validate($this->rules());
        if ($this->equipo_id) { 
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
                session()->flash('message', '¡Equipo actualizado exitosamente!');
            } else {
                session()->flash('error', 'Error: Equipo no encontrado para actualizar.');
            }
        } else {
            
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
            session()->flash('message', '¡Equipo registrado exitosamente!');
        }
        $this->cancelar(); 
    }
    public function eliminar($id)
    {
        $equipo = EquipoFut::find($id);
        if ($equipo) {
            $equipo->delete();
            session()->flash('message', 'Equipo eliminado correctamente.');
          
            $this->render(); 
        } else {
            session()->flash('error', 'Equipo no encontrado.');
        }
    }
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
    public function cancelar()
    {
        $this->reset([
            'equipo_id', 'nombre', 'marca', 'deporte', 'talla', 'material',
            'precio', 'stock', 'condicion'
        ]);
        $this->estado = true;
    }
}