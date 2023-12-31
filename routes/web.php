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

use Illuminate\Support\Facades\Notification;
use App\Notifications\NewMessage;Route::get('/test-mail', function (){
    Notification::route('mail', 'yourMailtrapEmailAddress')->notify(new NewMessage());
    return 'Sent';
});


/*Route::group(['middleware' => ['guest']], function () {
Route::get('suscripcion', 'SiteController@suscripcion')->name('suscripcion');
});*/



Route::group(['middleware' => ['auth']], function () {
Route::get('reportes', 'SiteController@reporte')->name('reportes');
Route::post('reporte-enviado', 'SiteController@reporteEnviado')->name('reporte-enviado');
});


//Accesos en principal
Route::get('/', 'SiteController@principal')->name('principal');
Route::get('como_funciona','SiteController@howItWorks');
Route::get('para-que-existimos','SiteController@itWorksfor');
Route::get('quienes_somos','SiteController@quienesSomos');
Route::get('planes','SiteController@planes');
Route::get('talentos', 'SiteController@talentos')->name('talentos');
Route::get('talento/{id}', 'TalentController@talento');

Route::get('talentos_resultado', 'SearchController@principalSearch')->name('talentos_resultado');
Route::get('canjes', 'SiteController@canjes');
Route::get('canjes/{id}', 'ExchangeController@canje');
Route::get('terminos_&_condiciones', 'SiteController@terminos')->name('terminos');
//Filtrado de Telentos y Canjes
Route::get('talentos/fetch_data', 'SearchController@fetch_data_talents');
Route::get('canjes-filtro/fetch_data', 'SearchController@fetch_data_exchanges');

//Filtrado de commentarios y canjes en Perfil
Route::get('perfil/canjes/fetch_data', 'ExchangeController@fetch_data_exchanges');
Route::get('perfil/comentarios/fetch_data', 'CommentController@fetch_data_comment');
Route::post('actualizar-recomendado', 'RecommendationController@updateView');


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Auth::routes(['verify' => true]);

//Cambios de Plan
Route::get('cambiar-plan', 'PlanController@index')->name('cambiar-plan');
Route::post('activar-plan', 'SuscriptionController@change')->name('activar-plan');
Route::post('datos-pago', 'SuscriptionController@datosPago')->name('datos-pago');
Route::post('generar-form', 'SuscriptionController@generarForm')->name('generar-form');
Route::get('cambio-plan-pago', 'SuscriptionController@cambioPlanPago')->name('datos-plan-pago');

//ESto ya no va
Route::get('suscription-callback', 'SuscriptionController@callback')->name('suscription-callback');

//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('mensajes-nuevos', 'MessageController@mensajesNuevos');
Route::get('actualizar-mensajes', 'MessageController@contadorMensajes');
Route::get('tratos-nuevos', 'DealingController@tratosNuevos');
Route::get('actualizar-contador-tratos', 'DealingController@contadorTratos');
Route::get('trato-visto', 'DealingController@visto');

//Auntenticacion con redes
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//Verificar talentos
Route::post('verificar_talentos', 'TalentController@showTalentsUser');
//Guardar talento
Route::post('guardar_talento', 'TalentController@store');
Route::post('actualizar_talento', 'TalentController@actualizarTalento');
//Perfil de usuario:
Route::get('perfil/{id}', 'UserController@profile');
Route::get('actualizar-comentarios-perfil', 'CommentController@updateCommentsProfileView');
Route::get('agregar-respuesta-perfil', 'CommentController@newProfileComment');
Route::post('actualizar-canjes-perfil', 'ExchangeController@updateExchangesProfileView');

//Canjes Autenticado
Route::get('cambiar-like', 'LikeController@changeLike');
Route::get('agregar-comentario', 'CommentController@newComment');
Route::get('agregar-respuesta', 'CommentController@newComment');
Route::get('actualizar-comentarios', 'CommentController@updateCommentsView');
Route::get('nuevo-trato', 'DealingController@newDealing');
Route::post('verificar-archivos', 'FileController@showFilesUser');
Route::get('actualizar-archivos', 'FileController@actualizarArchivos');
Route::post('eliminar-archivo', 'FileController@eliminarArchivo');
Route::post('editar-archivo', 'FileController@editarArchivo');
Route::get('nuevo-trato-talento', 'DealingController@newDealing');



//Route::post('agregar-imagen', 'FileController@agregarImagen');


//rutas de mi cuenta
Route::get('mi-cuenta', 'UserController@myAccount')->middleware('verified');
Route::post('cambiar-foto', 'UserController@updateAvatar');
Route::post('eliminar-idioma', 'LanguageController@deleteLanguage');
Route::post('cambiar-idioma', 'LanguageController@newLanguage');
Route::get('suscripcion-talentos', 'SiteController@suscripcionTalentos');
Route::get('actualizar-talentos', 'SiteController@actualizarTalentos');
Route::get('info-perfil', 'SiteController@perfilInfo');
Route::get('form-perfil', 'SiteController@formInfo');
Route::get('actualizar-perfil', 'UserController@update');
Route::get('actualizar-experiencia', 'UserController@updateExperience');

//mi cuenta - Talentos
Route::get('talentos-perfil', 'SiteController@perfilTalentos');
Route::get('canjes-perfil', 'SiteController@perfilCanjes');
Route::get('recibidos-perfil', 'SiteController@perfilRecibidos');
Route::get('propuestos-perfil', 'SiteController@perfilPropuestos');
Route::post('eliminar-talento', 'TalentController@eliminarTalento');


Route::post('archivos-talento', 'TalentController@mostrarArchivos');

Route::post('es-video', 'FileController@isVideo');


Route::post('agregar-imagen','FileController@newImage')->name('new-image');
Route::post('agregar-video','FileController@newVideo')->name('new-video');
Route::post('agregar-pdf','FileController@newPdf')->name('new-pdf');


//mi cuenta canjes
Route::get('guardar-canje', 'ExchangeController@guardarCanje');
Route::post('eliminar-canje', 'ExchangeController@eliminarCanje');
Route::post('actualizar_canje', 'ExchangeController@actualizarCanje');
Route::get('form-canje', 'ExchangeController@formCanje');
Route::post('cambiar-imagen-canje', 'ExchangeController@updateImageCanje');
Route::get('actualizar-datos-canje', 'ExchangeController@actualizarCanje');

//mi cuenta tratos
Route::post('aprobar-trato', 'DealingController@aprobar');
Route::post('trato-recibido', 'DealingController@recibido');
Route::post('valorar', 'CommentController@valorar');

//mensajes
Route::get('mensajes', 'MessageController@mensajes')->middleware('verified');
Route::get('mensajes/{id}', 'MessageController@mensajesId')->middleware('verified');
Route::get('mensajes-usuario', 'MessageController@mensajesUsuario');
Route::post('enviar-mensaje', 'MessageController@nuevoMensaje');
Route::get('enviar-mensaje-perfil', 'MessageController@nuevoMensajePerfil');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('plan-vencido', 'SuscriptionController@planVencido');