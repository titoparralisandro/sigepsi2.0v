<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Roles */
        $admin = Role::create(['name' => 'Administrador', 'guard_name' => 'web']);
        $director = Role::create(['name' => 'Director', 'guard_name' => 'web']);
        $diepp = Role::create(['name' => 'DCC', 'guard_name' => 'web']);
        $coordinador = Role::create(['name' => 'Coordinador', 'guard_name' => 'web']);
        $comite = Role::create(['name' => 'Comite', 'guard_name' => 'web']);
        $asesor = Role::create(['name' => 'Asesor', 'guard_name' => 'web']);
        $estudiante = Role::create(['name' => 'Estudiante', 'guard_name' => 'web']);
        $comunidad = Role::create(['name' => 'Comunidad', 'guard_name' => 'web']);

        // Asesor
        Permission::create(['name'=>'asesor.index'])->syncRoles([$admin,$asesor,$estudiante,$director,$coordinador]);
        Permission::create(['name'=>'asesor.create'])->syncRoles([$admin,$estudiante]);
        Permission::create(['name'=>'asesor.edit'])->syncRoles([$admin,$asesor,$estudiante]);
        Permission::create(['name'=>'asesor.destroy'])->syncRoles($admin);

        // Carrerras
        Permission::create(['name'=>'carrera.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'carrera.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'carrera.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'carrera.destroy'])->syncRoles([$admin,$director]);

        // Comentarios
        Permission::create(['name'=>'comentario.index'])->syncRoles([$admin,$director,$diepp]);
        //Permission::create(['name'=>'comentario.create'])->syncRoles();
        Permission::create(['name'=>'comentario.edit'])->syncRoles($admin);
        Permission::create(['name'=>'comentario.destroy'])->syncRoles($admin);

        // Comunidades
        Permission::create(['name'=>'comunidades.index'])->syncRoles([$admin,$asesor,$estudiante,$comunidad,$director,$coordinador,$diepp]);
        Permission::create(['name'=>'comunidades.create'])->syncRoles([$admin,$asesor,$estudiante,$comunidad,$director,$coordinador,$diepp]);
        Permission::create(['name'=>'comunidades.edit'])->syncRoles([$admin,$estudiante,$comunidad,$director]);
        Permission::create(['name'=>'comunidades.destroy'])->syncRoles($admin,);

        // Especialidad
        Permission::create(['name'=>'especialidad.index'])->syncRoles([$admin,$diepp]);
        Permission::create(['name'=>'especialidad.create'])->syncRoles([$admin,$diepp]);
        Permission::create(['name'=>'especialidad.edit'])->syncRoles([$admin,$diepp]);
        Permission::create(['name'=>'especialidad.destroy'])->syncRoles([$admin]);

        //estructura
        Permission::create(['name'=>'estructura.index'])->syncRoles([$admin,$director,$coordinador,$diepp]);
        Permission::create(['name'=>'estructura.create'])->syncRoles($admin);
        Permission::create(['name'=>'estructura.edit'])->syncRoles($admin);
        Permission::create(['name'=>'estructura.destroy'])->syncRoles($admin);

        //items_estructura
        Permission::create(['name'=>'items_estructura.index'])->syncRoles([$admin,$coordinador,$diepp]);
        Permission::create(['name'=>'items_estructura.create'])->syncRoles($admin);
        Permission::create(['name'=>'items_estructura.edit'])->syncRoles($admin);
        Permission::create(['name'=>'items_estructura.destroy'])->syncRoles($admin);

        //lineas_investigacion
        Permission::create(['name'=>'lineas_investigacion.index'])->syncRoles([$admin,$director,$coordinador]);
        Permission::create(['name'=>'lineas_investigacion.create'])->syncRoles($admin);
        Permission::create(['name'=>'lineas_investigacion.edit'])->syncRoles($admin);
        Permission::create(['name'=>'lineas_investigacion.destroy'])->syncRoles($admin);

        //necesidad
        Permission::create(['name'=>'necesidad.index'])->syncRoles([$admin,$comunidad,$diepp,$comite]);
        Permission::create(['name'=>'necesidad.create'])->syncRoles($comunidad);
        Permission::create(['name'=>'necesidad.edit'])->syncRoles([$admin,$comite]);
        Permission::create(['name'=>'necesidad.evaluate'])->syncRoles([$admin,$comite]);
        Permission::create(['name'=>'necesidad.destroy'])->syncRoles($admin);
        
        // banco
        Permission::create(['name'=>'evaluate'])->syncRoles([$admin,$comite]);
        Permission::create(['name'=>'banca_create'])->syncRoles([$admin,$comite]);
        Permission::create(['name'=>'banca_list'])->syncRoles($admin,$comite, $estudiante);

        //producto
        Permission::create(['name'=>'producto.index'])->syncRoles([$admin,$coordinador,$diepp,$director]);
        Permission::create(['name'=>'producto.create'])->syncRoles($admin);
        Permission::create(['name'=>'producto.edit'])->syncRoles($admin);
        Permission::create(['name'=>'producto.destroy'])->syncRoles($admin);

        // Proyecto
        Permission::create(['name'=>'proyecto.index'])->syncRoles([$admin,$director,$estudiante,$asesor, $comunidad]);
        Permission::create(['name'=>'proyecto.create'])->syncRoles([$admin,$estudiante]);
        Permission::create(['name'=>'SaveEvaluar'])->syncRoles([$admin,$asesor]);
        Permission::create(['name'=>'proyecto.edit'])->syncRoles([$admin,$director,$estudiante]);
        Permission::create(['name'=>'proyecto.destroy'])->syncRoles([$admin,$director,$estudiante]);

        //tipos_asesoria
        Permission::create(['name'=>'tipos_asesoria.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_asesoria.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_asesoria.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_asesoria.destroy'])->syncRoles([$admin,$director]);

        //tipos_comunidad
        Permission::create(['name'=>'tipos_comunidad.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_comunidad.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_comunidad.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'tipos_comunidad.destroy'])->syncRoles([$admin,$director]);

        //trayecto
        Permission::create(['name'=>'trayecto.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trayecto.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trayecto.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trayecto.destroy'])->syncRoles([$admin,$director]);

        //trimestre
        Permission::create(['name'=>'trimestre.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trimestre.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trimestre.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'trimestre.destroy'])->syncRoles([$admin,$director]);

        //turno
        Permission::create(['name'=>'turno.index'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'turno.create'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'turno.edit'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'turno.destroy'])->syncRoles([$admin,$director]);

        // Usuarios
        Permission::create(['name'=>'usuarios.index'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.create'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.show'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.store'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.update'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.pdf'])->syncRoles($admin);
        Permission::create(['name'=>'usuarios.pdfusuario'])->syncRoles($admin);

        //reportes
        Permission::create(['name'=>'reporte'])->syncRoles([$admin,$director]);
        Permission::create(['name'=>'reporte.pdf'])->syncRoles([$admin,$director]);

    }
}
