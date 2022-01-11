<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Tipos_asesoria;
use App\Models\Turno;
use App\Models\Tipos_comunidade;
use App\Models\Carrera;
use App\Models\Trayecto;
use App\Models\Items_estructura;
use App\Models\Producto;
use App\Models\Lineas_investigacione;
use App\Models\Especialidade;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        // comandos para ejecutar en caso de cacheo
        // php artisan cache:clear
        // composer dumpautoload
        // php artisan view:clear

        // primero crea 2 bases de datos
        // siace (para simular)
        // sigepsii (la que usa el sistema actualmente) ejecuta 
        // php artisan migrate:refresh --seed    para que tengas lo mas completo posible
        // Despues es la bd sigepsii restaura el archivo de adiciones esa es estados municipios parroquia 
        // (si tut ienes una de esas y la tienes en seeder mucho mejor porque que ladilla jajaja)


        /* Turnos */
        Turno::create(array( 'turno' => 'Mañana', 'estatus' => true));
        Turno::create(array( 'turno' => 'Tarde', 'estatus' => true));
        Turno::create(array( 'turno' => 'Noche', 'estatus' => true));
        Turno::create(array( 'turno' => 'Otro', 'estatus' => true));
        
        /* Tipos_asesoria */
        Tipos_asesoria::create(array( 'tipo_asesoria' => 'Metodológica'));
        Tipos_asesoria::create(array( 'tipo_asesoria' => 'Técnica'));
                
        /* Tipos_comunidades */
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Pública'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Privada'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Mixta'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Educativa'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Financiera'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'De alimentación'));
        Tipos_comunidade::create(array( 'tipo_comunidad' => 'Deportiva'));

        /* Carreras */
        Carrera::create(array( 'carrera' => 'PNF en Administración', 'descripcion' => 'Plantea la formación articulada con la realidad a través de la formación en comunidades de aprendizaje y de conocimiento, reconociendo los diferentes problemas y retos políticos, sociales, culturales, éticos, económicos y ambientales; disminuyendo la tensión entre la teoría y la práctica administrativa. Este Programa constituye un conjunto de actividades académicas, formativas, de creación intelectual y de vinculación social, conducente a la certificación de capacidades profesionales (Certificado de Asistente Administrativo) y al otorgamiento de títulos de Técnico Superior Universitario y de Licenciado en Administración.', 'estatus' => true));
        Carrera::create(array( 'carrera' => 'PNF en Informática', 'descripcion' => 'Se basa en el desarrollo de soluciones tecnológicas acorde con las necesidades del país, para formar talento humano con alto sentido de compromiso social orientado a la soberanía y seguridad tecnológica en el área de la informática (Desarrollo de Software, Programación y Redes) en los que priva la participación, la organización colectiva y el diálogo de saberes para una cultura científica transdisciplinaria e integral, formación técnica y científica en el uso, desarrollo, soporte, administración y capacitación en las áreas requeridas por las tecnologías de la información y comunicación.', 'estatus' => true));
        Carrera::create(array( 'carrera' => 'PNF en Mecánica', 'descripcion' => 'Está dirigido a la formación de un profesional con pertinencia social, consciente del colectivo, respetuoso y solidario, con actitud proactiva hacia el aprendizaje, el mejoramiento continuo y la innovación, comprometido con los planes de desarrollo económico y social de la nación, que conoce la disponibilidad de los recursos del país, con formación integral, socio-humanista, tecnológica y científica para identificar, abordar y resolver problemas relacionados con el análisis, diseño, construcción, montaje puesta en marcha, operación, mantenimiento, desincorporación y desecho de equipos e instalaciones industriales; donde se utilicen maquinarias para convertir, transportar y utilizar energía, igualmente en la transformación de materias primas en productos manufacturados, asumiendo una actitud responsable, ética honesta, sensibilizado a la conservación del ambiente así como también al uso eficiente del talento humano de los recursos materiales, financieros y energéticos.', 'estatus' => true));
        
        /* Especialidades */
        Especialidade::create(array( 'id_carrera' => 1, 'especialidad' => 'Administración', 'descripcion' => 'es un profesional encargado de planificar, organizar, coordinar, controlar y evaluar las actividades industriales, comerciales, financieras y de servicios de cualquier institución, industria o empresa.', 'estatus' => true));
        Especialidade::create(array( 'id_carrera' => 2, 'especialidad' => 'Informática', 'descripcion' => 'prepara a profesionistas que se encuentran capacitados para analizar, procesar y solucionar problemas que tengan relación con la administración, procesamiento y almacenamiento de la información digital.', 'estatus' => true));
        
        /* Trayecto */
        Trayecto::create(array( 'trayecto' => 'I', 'descripcion' => 'Primer trayecto', 'estatus' => true));
        Trayecto::create(array( 'trayecto' => 'II', 'descripcion' => 'Segundo trayecto', 'estatus' => true));
        Trayecto::create(array( 'trayecto' => 'III', 'descripcion' => 'Tercer trayecto', 'estatus' => true));
        Trayecto::create(array( 'trayecto' => 'IV', 'descripcion' => 'Cuarto trayecto', 'estatus' => true));

        /* Items */
        Items_estructura::create(array( 'item' => 'Portada'));
        Items_estructura::create(array( 'item' => 'Objetivo general'));
        Items_estructura::create(array( 'item' => 'Objetivo especificos'));
        Items_estructura::create(array( 'item' => 'Panteamiento del problema'));
        Items_estructura::create(array( 'item' => 'Máxima'));
        Items_estructura::create(array( 'item' => 'Titulo'));
        Items_estructura::create(array( 'item' => 'Conclusiones'));
        Items_estructura::create(array( 'item' => 'Recomendaciones'));

        /* Productos */
        Producto::create(array( 'producto' => 'Informe', 'descripcion' => 'Documento de tesis', 'estatus' => true));
        Producto::create(array( 'producto' => 'Presentación', 'descripcion' => 'Dia positivas de proyecto de tesis', 'estatus' => true));
        Producto::create(array( 'producto' => 'Manual', 'descripcion' => 'Documento de uso de herramienta', 'estatus' => true));
    
        /* Lineas de investigación */
        Lineas_investigacione::create(array( 'id_carrera' => 2, 'linea_investigacion' => 'Mantenimiento preventivo y correctivo'));
        Lineas_investigacione::create(array( 'id_carrera' => 2, 'linea_investigacion' => 'Desarrollo web (estructurado)'));
        Lineas_investigacione::create(array( 'id_carrera' => 2, 'linea_investigacion' => 'Redes y telecomunicaciones'));
        Lineas_investigacione::create(array( 'id_carrera' => 1, 'linea_investigacion' => 'Procesos y metodos'));
    }
    
    
}