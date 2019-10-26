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

//Auth::routes(); ----------------------------------------------------------------------------------------------

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// ----------------------------------------------------------------------------------------------------------------

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view('layouts.home.home');
})->middleware('auth');

Route::get('/facultades', function () {
    return view('layouts.unipana1.facultades.create');
});

Route::get('/programas', function () {
    return view('template.Layouts.unipana.programas.create');
});

Route::get('/modulos', function () {
    return view('template.Layouts.icfes.modulos.create');
});

//Route::get('/unipana', 'asignaturaController@index');
//Route::get('/unipana/create', 'asignaturaController@create');
//Route::get('/unipana/edit', 'asignaturaController@edit');

//Route::resource('Unipana', 'asignaturaController');
//Route::get('/admin/user/EsAdmin', ['middleware'=>'EsAdmin', function(){

Route::get('/unipana/facultad', 'unipanaController@index_facultad');
Route::post('/unipana/facultad', 'unipanaController@store_facultad');
Route::get('/unipana/facultad/create', 'unipanaController@create_facultad');
Route::get('/unipana/facultad/{id}/editar','unipanaController@edit_facultad');
Route::post('/unipana/facultad/{id}','unipanaController@update_facultad');
Route::get('/unipana/facultad/{id}/destroy','unipanaController@destroy_facultad');

Route::get('/unipana/programa', 'unipanaController@index_programa');
Route::post('/unipana/programa', 'unipanaController@store_programa');
Route::get('/unipana/programa/create', 'unipanaController@create_programa');
Route::get('/unipana/programa/{id}/editar','unipanaController@edit_programa');
Route::post('/unipana/programa/{id}','unipanaController@update_programa');
Route::get('/unipana/programa/{id}/destroy','unipanaController@destroy_programa');

Route::get('/unipana/asignatura', 'unipanaController@index_asignatura');
Route::post('/unipana/asignatura', 'unipanaController@store_asignatura');
Route::get('/unipana/asignatura/create', 'unipanaController@create_asignatura');
Route::get('/unipana/asignatura/{id}/editar','unipanaController@edit_asignatura');
Route::post('/unipana/asignatura/{id}','unipanaController@update_asignatura');
Route::get('/unipana/asignatura/{id}/destroy','unipanaController@destroy_asignatura');

Route::get('/unipana/resultado', 'unipanaController@index_resultado');
Route::post('/unipana/resultado', 'unipanaController@store_resultado');
Route::get('/unipana/resultado/create', 'unipanaController@create_resultado');
Route::get('/unipana/resultado/{id}/editar','unipanaController@edit_resultado');
Route::post('/unipana/resultado/{id}','unipanaController@update_resultado');
Route::get('/unipana/resultado/{id}/destroy','unipanaController@destroy_resultado');

Route::get('/unipana/criterio', 'unipanaController@index_criterio');
Route::post('/unipana/criterio', 'unipanaController@store_criterio');
Route::get('/unipana/criterio/create', 'unipanaController@create_criterio');
Route::get('/unipana/criterio/{id}/editar','unipanaController@edit_criterio');
Route::post('/unipana/criterio/{id}','unipanaController@update_criterio');
Route::get('/unipana/criterio/{id}/destroy','unipanaController@destroy_criterio');

Route::resource('Unipana', 'unipanaController');

Route::get('/relacion/{id}/crear','RelacionController@edit_asignatura');
Route::get('/relacion/get_criterios', 'RelacionController@get_criterios');
Route::get('/relacion/get_afirmaciones', 'RelacionController@get_afirmaciones');
Route::get('/relacion/get_evidencias', 'RelacionController@get_evidencias');
Route::post("/relacion/create", "RelacionController@create");
Route::get("/relacion/{id}/list", "RelacionController@show_list");
//Route::post('/unipana/criterio/{id}','unipanaController@update_criterio');
//Route::get('/unipana/criterio/{id}/destroy','unipanaController@destroy_criterio');

//Route::resource('relacion', 'RelacionController');

//Route::group(['middleware' => 'EsAdmin'], function () {

Route::get('/icfes/modulo', 'IcfesController@index_modulo');
Route::post('/icfes/modulo', 'IcfesController@store_modulo');
Route::get('/icfes/modulo/create', 'IcfesController@create_modulo');
Route::get('/icfes/modulo/{id}/editar','IcfesController@edit_modulo');
Route::post('/icfes/modulo/{id}','IcfesController@update_modulo');
Route::get('/icfes/modulo/{id}/destroy','IcfesController@destroy_modulo');

Route::get('/icfes/afirmacion', 'IcfesController@index_afirmacion');
Route::post('/icfes/afirmacion', 'IcfesController@store_afirmacion');
Route::get('/icfes/afirmacion/create', 'IcfesController@create_afirmacion');
Route::get('/icfes/afirmacion/{id}/editar','IcfesController@edit_afirmacion');
Route::post('/icfes/afirmacion/{id}','IcfesController@update_afirmacion');
Route::get('/icfes/afirmacion/{id}/destroy','IcfesController@destroy_afirmacion');

Route::get('/icfes/evidencia', 'IcfesController@index_evidencia');
Route::post('/icfes/evidencia', 'IcfesController@store_evidencia');
Route::get('/icfes/evidencia/create', 'IcfesController@create_evidencia');
Route::get('/icfes/evidencia/{id}/editar','IcfesController@edit_evidencia');
Route::post('/icfes/evidencia/{id}','IcfesController@update_evidencia');
Route::get('/icfes/evidencia/{id}/destroy','IcfesController@destroy_evidencia');

Route::resource('icfes', 'IcfesController');

Route::get("/informe_pdf/{id}", "PDFGeneratorController@generate_report");

//});
