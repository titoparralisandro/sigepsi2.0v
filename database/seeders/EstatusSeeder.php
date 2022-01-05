<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Estatus_comunidade;
use App\Models\Estatus_necesidade;
use App\Models\Estatus_progreso;
use App\Models\Estatus_situacione;
use App\Models\Estatus_proyecto;
use App\Models\Estatus_proyectos_estudiante;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Estatus_comunidades */
        Estatus_comunidade::create(array( 'id' => 1, 'estatus_comunidad' => 'Activa'));
		Estatus_comunidade::create(array( 'id' => 2, 'estatus_comunidad' => 'Inactiva'));

        /* Estatus_progresos */
        Estatus_progreso::create(array( 'id' => 1, 'estatus_progreso' => 'Pendiente'));
        Estatus_progreso::create(array( 'id' => 2, 'estatus_progreso' => 'Culminado'));

        /* Estatus_necesidades */
        Estatus_necesidade::create(array( 'id' => 1, 'estatus_necesidad' => 'Por revisar'));
        Estatus_necesidade::create(array( 'id' => 2, 'estatus_necesidad' => 'Rechazada'));
        Estatus_necesidade::create(array( 'id' => 3, 'estatus_necesidad' => 'En estudio'));
        Estatus_necesidade::create(array( 'id' => 4, 'estatus_necesidad' => 'Aprobada'));

        /* Estatus_situaciones */
        Estatus_situacione::create(array( 'id' => 1, 'estatus_situacion' => 'No atendida'));
        Estatus_situacione::create(array( 'id' => 2, 'estatus_situacion' => 'Atendida'));
        Estatus_situacione::create(array( 'id' => 3, 'estatus_situacion' => 'Situación o comunidad no existente'));

        /* Estatus_proyectos */
        Estatus_proyecto::create(array( 'id' => 1, 'estatus_proyecto' => 'Por validar'));
		Estatus_proyecto::create(array( 'id' => 2, 'estatus_proyecto' => 'Rechazado'));
        Estatus_proyecto::create(array( 'id' => 3, 'estatus_proyecto' => 'En desarrollo'));
        Estatus_proyecto::create(array( 'id' => 4, 'estatus_proyecto' => 'En corrección'));
        Estatus_proyecto::create(array( 'id' => 5, 'estatus_proyecto' => 'Socializado'));
        Estatus_proyecto::create(array( 'id' => 6, 'estatus_proyecto' => 'Culminado'));
        Estatus_proyecto::create(array( 'id' => 7, 'estatus_proyecto' => 'Cancelado'));

        /* Estatus_proyectos_estudiantes */
        Estatus_proyectos_estudiante::create(array( 'id' => 1, 'estatus_proyectos_estudiante' => 'Activo'));
        Estatus_proyectos_estudiante::create(array( 'id' => 2, 'estatus_proyectos_estudiante' => 'Retirado'));
        
    }
}
