<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BdController;
use App\Http\Controllers\UtilesController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\ProtegidaController;


//Ruta de inicio
Route::get('/', [TemplateController::class, 'template_inicio'])->name('home_inicio');


Route::get('/hola', [HomeController::class, 'home_hola'])->name('home_hola');

Route::get('/parametros/{id}/{slug}', [HomeController::class, 'home_parametros'])->name('home_parametros');

Route::get('/template', [TemplateController::class, 'template_inicio'])->name('template_inicio');
Route::get('/template/stack', [TemplateController::class, 'template_stack'])->name('template_stack');

Route::get('/formularios', [FormulariosController::class, 'formularios_inicio'])->name('formularios_inicio');

Route::get('/template/stack', [TemplateController::class, 'template_stack'])->name('template_stack');

Route::get('/formularios/simple', [FormulariosController::class, 'formularios_simple'])->name('formularios_simple');
Route::post('/formularios/simple', [FormulariosController::class, 'formularios_simple_post'])->name('formularios_simple_post');

// Mensajes Flash

Route::get('/formularios/flash', [FormulariosController::class, 'formularios_flash'])->name('formularios_flash');
Route::get('/formularios/flash2', [FormulariosController::class, 'formularios_flash2'])->name('formularios_flash2');
Route::get('/formularios/flash3', [FormulariosController::class, 'formularios_flash3'])->name('formularios_flash3');


Route::get('/formularios/upload', [FormulariosController::class, 'formularios_upload'])->name('formularios_upload');
Route::post('/formularios/upload', [FormulariosController::class, 'formularios_upload_post'])->name('formularios_upload_post');


//helper

Route::get('/helper', [HelperController::class, 'helper_inicio'])->name('helper_inicio');


// Email

Route::get('/mail', [EmailController::class, 'mail_inicio'])->name('mail_inicio');
Route::get('/mail/enviar', [EmailController::class, 'mail_enviar'])->name('mail_enviar');



// RUTAS BD

Route::get('/bd', [BdController::class, 'bd_inicio'])->name('bd_inicio');
Route::get('/bd/categorias', [BdController::class, 'bd_categorias'])->name('bd_categorias');
// Agregar Categorias
Route::get('/bd/categorias/add', [BdController::class, 'bd_categorias_add'])->name('bd_categorias_add');
Route::post('/bd/categorias/add', [BdController::class, 'bd_categorias_add_post'])->name('bd_categorias_add_post');
//editar Categorias
Route::get('/bd/categorias/edit/{id}', [BdController::class, 'bd_categorias_editar'])->name('bd_categorias_editar');
Route::post('/bd/categorias/edit/{id}', [BdController::class, 'bd_categorias_editar_post'])->name('bd_categorias_editar_post');
//eliminar Categorias
Route::get('/bd/categorias/delete/{id}', [BdController::class, 'bd_categorias_eliminar'])->name('bd_categorias_eliminar');
//Listar Productos
Route::get('/bd/productos', [BdController::class, 'bd_productos'])->name('bd_productos');
// Agregar Productos
Route::get('/bd/productos/add', [BdController::class, 'bd_productos_add'])->name('bd_productos_add');
Route::post('/bd/productos/add', [BdController::class, 'bd_productos_add_post'])->name('bd_productos_add_post');
//editar Productos
Route::get('/bd/productos/edit/{id}', [BdController::class, 'bd_productos_editar'])->name('bd_productos_editar');
Route::post('/bd/productos/edit/{id}', [BdController::class, 'bd_productos_editar_post'])->name('bd_productos_editar_post');
//eliminar Productos
Route::get('/bd/productos/delete/{id}', [BdController::class, 'bd_productos_eliminar'])->name('bd_productos_eliminar');
//Modificar una categoria asociada a un producto
Route::get('/productos/categoria/{id}', [BdController::class, 'bd_productos_categorias'])->name('bd_productos_categorias');
// Productos Fotos
Route::get('/bd/productos/fotos/{id}', [BdController::class, 'bd_productos_fotos'])->name('bd_productos_fotos');
Route::post('/bd/productos/fotos/{id}', [BdController::class, 'bd_productos_fotos_post'])->name('bd_productos_fotos_post');
//eliminar Productos Fotos
Route::get('/bd/productos/fotos/delete/{producto_id}/{foto_id}', [BdController::class,'bd_productos_fotos_delete' ])->name('bd_productos_fotos_delete');
//Paginacion de productos
Route::get('/bd/productos/paginacion', [BdController::class, 'bd_productos_paginacion'])->name('bd_productos_paginacion');
// Buscador de productos
Route::get('/bd/productos/buscar', [BdController::class, 'bd_productos_buscar'])->name('bd_productos_buscar');;

//Utiles

Route::get('/utiles', [UtilesController::class, 'utiles_inicio'])->name('utiles_inicio');
// Crear pdf
Route::get('/utiles/pdf', [UtilesController::class, 'utiles_pdf'])->name('utiles_pdf');
// Reporte Excel
Route::get('/utiles/excel', [UtilesController::class, 'reporte_excel'])->name('reporte_excel');
// Cliente con Api-Rest
Route::get('/utiles/reporte_cliente_rest', [UtilesController::class, 'reporte_cliente_rest'])->name('reporte_cliente_rest');
// Cliente Soap

Route::get('/utiles/soap', [UtilesController::class, 'reporte_cliente_soap'])->name('reporte_cliente_soap');

// Login de Usuarios

Route::get('/acceso/login', [AccesoController::class, 'acceso_login'])->name('acceso_login');
Route::post('/acceso/login', [AccesoController::class, 'acceso_login_post'])->name('acceso_login_post');
// Registro de usuario
Route::get('/acceso/registro', [AccesoController::class, 'acceso_registro'])->name('acceso_registro');
Route::post('/acceso/registro', [AccesoController::class, 'acceso_registro_post'])->name('acceso_registro_post');

// salir

Route::get('/acceso/salir', [AccesoController::class, 'acceso_salir'])->name('acceso_salir');

Route::get('/protegida/inicio', [ProtegidaController::class, 'protegida_inicio'])->name('protegida_inicio');

Route::get('/protegida/otra', [ProtegidaController::class, 'protegida_otra'])->name('protegida_otra');
Route::get('/protegida/sinacceso', [ProtegidaController::class, 'protegida_sin_acceso'])->name('protegida_sin_acceso');


