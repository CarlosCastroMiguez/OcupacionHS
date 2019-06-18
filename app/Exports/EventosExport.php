<?php

namespace App\Exports;

use App\Evento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;


class EventosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evento::all();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'NumAlumnos',
            'Fecha_Inicio',
            'Fecha_Fin',
            'Asignatura',
            'Profesor',
            'Apellidos',
            'Sala',
            'Simulador',
            'Actor'
            
        ];
    }
    
    public function map($item): array
    {
        return [
            $item->id,
            $item->nombre,
            $item->numAlumnos,
            $item->start_date,
            $item->end_date,
            $item->asignatura->nombre,
            $item->profesor->nombre,
            $item->profesor->apellido,
            $item->sala->tipo,
            $item->nombre_simulador,
            $item->descripcion_actor,
            
        ];
    }
}
