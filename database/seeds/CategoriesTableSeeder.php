<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1 Academicx
        $category = new Category();
        $category->name = 'Antropología';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Ciencias Politicas';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Derecho';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Matemáticas';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Psicología';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Sociología';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Otras materias';
        $category->industry_id = '1';
        $category->save();

        //2 Administracion
        $category = new Category();
        $category->name = 'Administración';
        $category->industry_id = '2';
        $category->save();

        //3 Arquitectura
        $category = new Category();
        $category->name = 'Artista';
        $category->industry_id = '3';
        $category->save();


        $category = new Category();
        $category->name = 'Constructorx';
        $category->industry_id = '3';
        $category->save();


        $category = new Category();
        $category->name = 'Diseñadorx';
        $category->industry_id = '3';
        $category->save();

        $category = new Category();
        $category->name = 'Paisajista';
        $category->industry_id = '3';
        $category->save();

        $category = new Category();
        $category->name = 'Dibujante';
        $category->industry_id = '3';
        $category->save();

        $category = new Category();
        $category->name = 'Otros';
        $category->industry_id = '3';
        $category->save();

        // 4 Agente de Viajes
        $category = new Category();
        $category->name = 'Agente de Viajes';
        $category->industry_id = '4';
        $category->save();

        // 5 Artista
        $category = new Category();
        $category->name = 'Actor / Actriz';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Bailarín';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Cantar';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Comediante';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Escultorx';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Escritorx';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Pintorx';
        $category->industry_id = '5';
        $category->save();

        $category = new Category();
        $category->name = 'Poeta / Poetiza';
        $category->industry_id = '5';
        $category->save();

        //6 Asesoría de Seguros
        $category = new Category();
        $category->name = 'Asesoria de Seguros';
        $category->industry_id = '6';
        $category->save();

        //7 Abogadxs
        $category = new Category();
        $category->name = 'Abogadxs';
        $category->industry_id = '7';
        $category->save();

        //8 Bailar
        $category = new Category();
        $category->name = 'Bailar';
        $category->industry_id = '8';
        $category->save();

        //9 Camarógrafo
        $category = new Category();
        $category->name = 'Camarógrafo';
        $category->industry_id = '9';
        $category->save();

        //10 Cocina
        $category = new Category();
        $category->name = 'Comida Asiática';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Comida Francesa';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Comida Italiana';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Comida internacional';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Comida Mexicana';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Comida Peruana';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Barbacoa';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Pastelería';
        $category->industry_id = '10';
        $category->save();

        $category = new Category();
        $category->name = 'Otro tipo de comida';
        $category->industry_id = '10';
        $category->save();

        //11 Coach de Negocios
        $category = new Category();
        $category->name = 'Coach de Negocios';
        $category->industry_id = '11';
        $category->save();

        //12 Coach Deportivo
        $category = new Category();
        $category->name = 'Coach Deportivo';
        $category->industry_id = '12';
        $category->save();

        //Coach Especializado
        $category = new Category();
        $category->name = 'Coach Financiero';
        $category->industry_id = '13';
        $category->save();

        $category = new Category();
        $category->name = 'Coach de Vida';
        $category->industry_id = '13';
        $category->save();

        $category = new Category();
        $category->name = 'Coach Espiritual';
        $category->industry_id = '13';
        $category->save();

        $category = new Category();
        $category->name = 'Coach de Proyectos';
        $category->industry_id = '13';
        $category->save();

        $category = new Category();
        $category->name = 'Coach de Nutrición';
        $category->industry_id = '13';
        $category->save();

        $category = new Category();
        $category->name = 'Coach';
        $category->industry_id = '13';
        $category->save();

        //14 Comerciante
        $category = new Category();
        $category->name = 'Comerciante';
        $category->industry_id = '14';
        $category->save();        

        //15 Comunicador Social
        $category = new Category();
        $category->name = 'Comunicaciones Corporativas';
        $category->industry_id = '15';
        $category->save();

        $category = new Category();
        $category->name = 'Creador de contenido audiovisual';
        $category->industry_id = '15';
        $category->save();

        $category = new Category();
        $category->name = 'Comunicación Digital';
        $category->industry_id = '15';
        $category->save();

        $category = new Category();
        $category->name = 'Relaciones Públicas';
        $category->industry_id = '15';
        $category->save();                

        //16 Contabilidad
        $category = new Category();
        $category->name = 'Analista';
        $category->industry_id = '16';
        $category->save();   

        $category = new Category();
        $category->name = 'Auditor';
        $category->industry_id = '16';
        $category->save();

        $category = new Category();
        $category->name = 'Expertx en ciclo contable';
        $category->industry_id = '16';
        $category->save();

        $category = new Category();
        $category->name = 'Gerencia en Contabilidad';
        $category->industry_id = '16';
        $category->save();

        $category = new Category();
        $category->name = 'Otros';
        $category->industry_id = '16';
        $category->save();

        //17 Convocar a usuarios en redes sociales
        $category = new Category();
        $category->name = 'Convocar a usuarios en redes sociales';
        $category->industry_id = '17';
        $category->save();

        //18 Deportes
        $category = new Category();
        $category->name = 'Basquetbol';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Béisbol';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Equitación';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Fútbol';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Golf';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Natación';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Ping pong';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Soccer';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Tennis';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Narrador de deportes';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Analista de deportes';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Coach de deportes';
        $category->industry_id = '18';
        $category->save();

        $category = new Category();
        $category->name = 'Experto en deportes';
        $category->industry_id = '18';
        $category->save();

        //19 Dibujar
        $category = new Category();
        $category->name = 'Dibujar';
        $category->industry_id = '19';
        $category->save();

        //20 Diseador de software
        $category = new Category();
        $category->name = 'Diseñadorx de Software';
        $category->industry_id = '20';
        $category->save();

        //21 Diseñadora de moda
        $category = new Category();
        $category->name = 'Diseñadorx de Moda';
        $category->industry_id = '21';
        $category->save();

        //22 Diseñadoar ade experiencia del usuario
        $category = new Category();
        $category->name = 'Diseñadorx de Experiencia del Usuario';
        $category->industry_id = '22';
        $category->save();

        //23 Diseñaodor Grafico
        $category = new Category();
        $category->name = 'Diseñadorx Gráfico';
        $category->industry_id = '23';
        $category->save();

        //24 Elaborar presentaciones digitales
        $category = new Category();
        $category->name = 'Elaborar presentaciones digitales';
        $category->industry_id = '24';
        $category->save();

        //25  Elaborar hojas de Cálculo
        $category = new Category();
        $category->name = 'Elaborar hojas de cálculo ';
        $category->industry_id = '25';
        $category->save();

        //26 Elaborar conferencias mediante oratoria
        $category = new Category();
        $category->name = 'Elaborar conferencias mediante oratoria';
        $category->industry_id = '26';
        $category->save();

        //Economista
        $category = new Category();
        $category->name = 'Economista';
        $category->industry_id = '27';
        $category->save();

        //28 Enfermerx
        $category = new Category();
        $category->name = 'Enfermerx';
        $category->industry_id = '28';
        $category->save();

        //29 Enologx
        $category = new Category();
        $category->name = 'Enólogx';
        $category->industry_id = '29';
        $category->save();

        //30 Estilista
        $category = new Category();
        $category->name = 'Estilista / Barberx';
        $category->industry_id = '30';
        $category->save();

        //31 Financistas
        $category = new Category();
        $category->name = 'Banca Privada';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Banca de Inversión';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Ciencias Actuariales';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Corretaje de Valores';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Gestión de Patrimonio';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Banca Comercial';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Banca Corporativa';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Fusiones & Adquisiciones';
        $category->industry_id = '31';
        $category->save();

        $category = new Category();
        $category->name = 'Tesorería';
        $category->industry_id = '31';
        $category->save();

        //32 Fotógrafo
        $category = new Category();
        $category->name = 'Fotógrafo';
        $category->industry_id = '32';
        $category->save();

        //33 Hábil con las personas
        $category = new Category();
        $category->name = 'Hábil con las personas';
        $category->industry_id = '33';
        $category->save();

        //34 Hábil con las palabras
        $category = new Category();
        $category->name = 'Hábil con las palabras';
        $category->industry_id = '34';
        $category->save();

        //35 Hábil con los números 
        $category = new Category();
        $category->name = 'Hábil con los números ';
        $category->industry_id = '35';
        $category->save();

        //36 Ingenierias
        $category = new Category();
        $category->name = 'Civil';
        $category->industry_id = '36';
        $category->save();

        $category = new Category();
        $category->name = 'Industrial';
        $category->industry_id = '36';
        $category->save();

        $category = new Category();
        $category->name = 'Mecánica';
        $category->industry_id = '36';
        $category->save();

        $category = new Category();
        $category->name = 'Naval';
        $category->industry_id = '36';
        $category->save();

        $category = new Category();
        $category->name = 'Sistemas';
        $category->industry_id = '36';
        $category->save();

        $category = new Category();
        $category->name = 'Telecomunicaciones';
        $category->industry_id = '36';
        $category->save();

        //37 Marketing
        $category = new Category();
        $category->name = 'Marketing';
        $category->industry_id = '37';
        $category->save();

        //38 Medicina alternativa
        $category = new Category();
        $category->name = 'Medicina alternativa';
        $category->industry_id = '38';
        $category->save();

        //39 Médicos
        $category = new Category();
        $category->name = 'Médicos';
        $category->industry_id = '39';
        $category->save();

        //40 Músicos
        $category = new Category();
        $category->name = 'Cello';
        $category->industry_id = '40';
        $category->save();

        $category = new Category();
        $category->name = 'Flauta';
        $category->industry_id = '40';
        $category->save();

        $category = new Category();
        $category->name = 'Vocal';
        $category->industry_id = '40';
        $category->save();

        $category = new Category();
        $category->name = 'Guitarra';
        $category->industry_id = '40';
        $category->save();

        $category = new Category();
        $category->name = 'Piano';
        $category->industry_id = '40';
        $category->save();

        $category = new Category();
        $category->name = 'Violin';
        $category->industry_id = '40';
        $category->save();

        //41 Organizar Eventos
        $category = new Category();
        $category->name = 'Organizar Eventos';
        $category->industry_id = '41';
        $category->save();

        //42 Periodistas
        $category = new Category();
        $category->name = 'Periodistas';
        $category->industry_id = '42';
        $category->save();                

        //43 Psicologo
        $category = new Category();
        $category->name = 'Adicciones';
        $category->industry_id = '43';
        $category->save();

        $category = new Category();
        $category->name = 'Educativo';
        $category->industry_id = '43';
        $category->save();

        $category = new Category();
        $category->name = 'Industrial';
        $category->industry_id = '43';
        $category->save();

        $category = new Category();
        $category->name = 'Niñez';
        $category->industry_id = '43';
        $category->save();

        $category = new Category();
        $category->name = 'Psicoanalista';
        $category->industry_id = '43';
        $category->save();

        $category = new Category();
        $category->name = 'Pareja y Familia';
        $category->industry_id = '43';
        $category->save();

        //44 Reunir a un grupo de amigos / familiares
        $category = new Category();
        $category->name = 'Reunir a un grupo de amigos / familiares';
        $category->industry_id = '44';
        $category->save();

        //45 Resolver problemas matemáticos
        $category = new Category();
        $category->name = 'Resolver problemas matemáticos';
        $category->industry_id = '45';
        $category->save();

        //46 Resolver inquietudes comerciales
        $category = new Category();
        $category->name = 'Resolver inquietudes comerciales';
        $category->industry_id = '46';
        $category->save();

        //47 Resolver problemas en mercadeo
        $category = new Category();
        $category->name = 'Resolver problemas en mercadeo';
        $category->industry_id = '47';
        $category->save();                        

        //48 Traductor
        $category = new Category();
        $category->name = 'Traductor';
        $category->industry_id = '48';
        $category->save();

        //49 Vendedor nato
        $category = new Category();
        $category->name = 'Vendedor nato';
        $category->industry_id = '49';
        $category->save();
    }
}