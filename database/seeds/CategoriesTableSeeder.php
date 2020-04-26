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

        //Coach
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
    }
}