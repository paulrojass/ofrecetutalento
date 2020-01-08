<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Accesos en principal
Route::get('/', 'SiteController@principal');
Route::get('como_funciona','SiteController@howItWorks');
Route::get('quienes_somos','SiteController@quienesSomos');
Route::get('planes','SiteController@planes');
Route::get('talentos', 'SiteController@talentos');
Route::get('canjes', 'SiteController@canjes');
route::get('suscripcion', 'SiteController@suscripcion');
route::get('terminos_&_condiciones', 'SiteController@terminos');


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


//Filtrado de Telentos
Route::post('talentos','SearchController@talentsFilter')->name('talentos');
//paginacion de talentos
Route::get('/pagination', 'SiteController@paginationTalents');
Route::get('pagination/fetch_data_talents', 'SiteController@fetch_data_talents');
//Filtrado de Telentos
Route::post('canjes','SearchController@exchangesFilter')->name('canjes');
//paginacion de talentos
/*Route::get('/pagination', 'SiteController@paginationTalents');
Route::get('pagination/fetch_data_talents', 'SiteController@fetch_data_talents');*/


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');



//Auntenticacion con redes
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//Verificar talentos
Route::post('verificar_talentos', 'TalentController@showTalentsUser');
//Guardar talento
Route::post('guardar_talento', 'TalentController@store');

//Mostrar select de categorias en suscripcion
Route::get('select-categorias', 'CategoryController@showCategoriesSelect');



//Perfil de usuario:
Route::get('perfil/{id}', 'UserController@profile');

Route::get('mi-cuenta', 'UserController@myAccount')->middleware('verified');
Route::post('cambiar-foto', 'UserController@updateAvatar');
Route::get('suscripcion-talentos', 'SiteController@suscripcionTalentos');
Route::get('actualizar-talentos', 'SiteController@actualizarTalentos');
Route::get('info-perfil', 'SiteController@perfilInfo');
Route::get('form-perfil', 'SiteController@formInfo');
