<?php

use App\Task;
use App\Guest;
use App\Project;
use App\Companion;
use App\User;
use App\GuestList;
use App\Mail\Contact as ContactEmail;
use App\Mail\NotificationMail;
use Illuminate\Http\Request;

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

//Obtener imagenes
Route::get('/index', 'System\ConfigController@indexImagen')->name('config.indexImagen');
Route::get('/index/color', 'System\ConfigController@GetColor')->name('config.getColor');


// Web routes
Route::get('/', 'Web\IndexController@index');

//Email contacto
Route::post('/contact/send-email', function(Request $request){
    $data = json_decode(file_get_contents("php://input"));
    Mail::to('creatoeventos@gmail.com', 'Creato Studio')
        ->send(new ContactEmail($data));
});

// Auth::routes();


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...

    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');







Route::get('no-project', function() {
    return view('system.no_project');
})->name('no_project');

// System routes

Route::group(['middleware' => ['auth']], function () { 
    
    Route::match(['get', 'post'], '/dashboard', 'System\SystemController@index')->name('dashboard.admin');

    // Portfolio routes
    Route::get('dashboard/portafolio', 'System\PortfolioController@index')->name('portfolio.index');
    Route::get('dashboard/portafolio/create', 'System\PortfolioController@create')->name('portfolio.create');
    Route::get('dashboard/portafolio/show/{id}', 'System\PortfolioController@show')->name('portfolio.show');
    Route::post('dashboard/portafolio', 'System\PortfolioController@store')->name('portfolio.store');
    Route::get('dashboard/portafolio/edit/{id}', 'System\PortfolioController@edit')->name('portfolio.edit');
    Route::put('dashboard/portafolio/{id}', 'System\PortfolioController@update')->name('portfolio.update');
    Route::delete('dashboard/portafolio/{id}', 'System\PortfolioController@destroy')->name('portfolio.delete');
        // Portfolio pictures
        Route::post('dashboard/portafolio/{id}/imagenes', 'System\PortfolioController@upload')->name('portfolio.images');
        Route::delete('dashboard/portafolio/image/{id}', 'System\PortfolioController@destroyImage')->name('portfolio.delete.image');

    // Users routes
    Route::get('dashboard/usuarios', 'System\UsersController@index')->name('users.index');
    Route::get('dashboard/usuarios/create', 'System\UsersController@create')->name('users.create');
    Route::get('dashboard/usuarios/edit/{id}', 'System\UsersController@edit')->name('users.edit');
    Route::post('dashboard/usuarios', 'System\UsersController@store')->name('users.store');
    Route::put('dashboard/usuarios/{id}', 'System\UsersController@update')->name('users.update');
    Route::delete('dashboard/usuarios/{id}', 'System\UsersController@destroy')->name('users.delete');
        //Clientes routes
        Route::get('dashboard/clientes', 'System\UsersController@clientesIndex')->name('clientes.index');

    // Projects routes
    Route::get('dashboard/proyectos', 'System\ProjectController@index')->name('projects.index');
    Route::get('dashboard/proyectos/create', 'System\ProjectController@create')->name('projects.create');
    Route::get('dashboard/proyectos/show/{id}', 'System\ProjectController@show')->name('projects.show');
    Route::post('dashboard/proyectos', 'System\ProjectController@store')->name('projects.store');
    Route::get('dashboard/proyectos/edit/{id}', 'System\ProjectController@edit')->name('projects.edit');
    Route::put('dashboard/proyectos/{id}', 'System\ProjectController@update')->name('projects.update');
    Route::delete('dashboard/proyectos/{id}', 'System\ProjectController@destroy')->name('projects.destroy');
        Route::put('dashboard/planos/{id}', 'System\ProjectController@updatePlans')->name('projects.plans');
        Route::get('dashboard/proyectos/resumen/{id}', 'System\ProjectController@review')->name('projects.review');
        Route::post('dashboard/proyectos/pdf', 'System\ProjectController@pdf')->name('projects.pdf');
        Route::post('dashboard/proyectos/list', 'System\ProjectController@copyList')->name('projects.copyList');
        Route::get('dashboard/proyectos/next', 'System\ProjectController@next')->name('projects.next');
        Route::get('dashboard/proyectos/mesas-editor/{id}', 'System\ProjectController@mesasEditorIndex')->name('mesasEditor.index');
        Route::get('dashboard/proyectos/mesas-editor/tables/{id}', 'System\ProjectController@mesasEditorShow')->name('mesasEditor.show');
        Route::put('dashboard/proyectos/mesas-editor/tables', 'System\ProjectController@mesasEditorUpdate')->name('mesasEditor.update');
        //Eliminar mesas
        Route::post('/dashboard/proyectos/mesas-editor/eliminarselect', 'System\TablesController@deleteTable')->name('table.delete');
        //editar mesas
        Route::post('/dashboard/proyectos/mesas-editor/tables/multiple', 'System\ProjectController@editTables')->name('tables.edit');
        

    // Events routes
    Route::resource('dashboard/events', 'System\EventController');

        // Get cliente project
        Route::get('proyecto/cliente/{id}', function($id){
            $project = Project::find($id);

            return $project->user;
        });

        // Get companions list
        Route::get('lista/acompanantes/{id}', function($id){
            $list = GuestList::find($id);
            $guests = Guest::where('guestList_id', $list->id)->with('companions')->get();

            return $guests;
        });
    // My List routes
    Route::resource('mi-lista', 'System\MyListController');
    Route::put('actualizar-listas', 'System\MyListController@updateAll');

    // Client dashboard 
    Route::get('cliente/', 'System\ClientController@index')->name('dashboard.client');

        // Guests
        Route::get('cliente/invitados', 'System\GuestController@index')->name('guests.index'); 
        // Update guest status
        Route::put('actualizar-estatus-invitado/{id}', function(Request $request, $id){
            $guest = Guest::find($id);
            $guest->status = $request->status;
            if($request != 'CONFIRMADO'){
                $guest->dataX = null;
                $guest->dataY = null;
                $guest->seated = false;
            }
            $guest->save();
            return;
        });
        // Update companion status
        Route::put('actualizar-estatus-acompanante/{id}', function(Request $request, $id){
            $companion = Companion::find($id);
            $companion->status = $request->status;
            if($request != 'CONFIRMADO'){
                $companion->dataX = null;
                $companion->dataY = null;
                $companion->seated = false;
            }
            $companion->save();
            return;
        });

    //Evidencia
    Route::get('cliente/evidence', 'System\AdminListController@indexEvidence')->name('evidence.indexEvidence');
        Route::get('cliente/get-admins-lists', 'System\AdminListController@getListsAdmin')->name('evidence.getListsAdmin');
        Route::get('cliente/get-evidence/{id}', 'System\AdminListController@getEvidence')->name('evidence.getEvidence');
    //Lista de invitados
    Route::resource('cliente/lista', 'System\GuestController');
    //Eliminar lista de invitados
    Route::post('cliente/lista/eliminar', 'System\GuestController@deleteList')->name('list.delete');

    //Importar excel invitados
    Route::post('cliente/excel/import', 'System\GuestController@importExcel')->name('guests.import.excel');

    //Lista de acompanantes
    Route::resource('cliente/acompanante', 'System\CompanionController');

    //Grupos invitados
    Route::get('cliente/groups/{id}', 'System\GroupController@index')->name('groups.index');
    Route::post('cliente/groups', 'System\GroupController@store')->name('groups.store');
    Route::post('cliente/groups/group', 'System\GroupController@getGroup')->name('groups.getGroup');

    // Tables routes
    Route::get('cliente/tables', 'System\TablesController@index')->name('tables.index');
    Route::get('cliente/tables/invitados', 'System\TablesController@invitados')->name('tables.invitados');
    Route::put('cliente/tables/{id}', 'System\TablesController@update')->name('tables.update');
    Route::put('cliente/tables/limpiar/{id}', 'System\TablesController@destroy')->name('tables.delete');
    Route::put('cliente/tables/asignar-mesa/{id}', 'System\TablesController@asignarMesa')->name('tables.asignarMesa');
    Route::get('cliente/tables/proyecto', 'System\TablesController@project')->name('tables.project');
        //Guardar tamaño de la imagen en las mesas
        Route::post('cliente/tables/guardar-tamano', 'System\TablesController@guardarTamano')->name('tables.guardarTamano');
        Route::get('cliente/tables/obtener-tamano', 'System\TablesController@obtenerTamano')->name('tables.obtenerTamano');
        //Obtener el total de mesas
        Route::get('/cliente/tables/obtener-mesas', 'System\TablesController@obtenerMesas')->name('tables.obtenerMesas');
    
    //Obtener listas del cliente
    Route::get('cliente/obtener-listas/{id}', 'System\ClientController@obtenerListas')->name('client.obtenerListas');
        //Vista tarea
        Route::get('cliente/tareas/{id}', 'System\ClientController@tareas')->name('client.tareas');
        Route::get('obtener-tareas/{id}', 'System\ClientController@obtenerTareas')->name('client.obtenerTareas');
        Route::get('completar-tarea/{id}', function($id){
            $tarea = Task::findOrFail($id);
            $tarea->complete = true;
            $tarea->save();
            return;
        });

        Route::get('retornar-tarea/{id}', function($id){
            $tarea = Task::findOrFail($id);
            $tarea->complete = false;
            $tarea->save();
            return;
        });


    // Quotation Routes
    Route::get('dashboard/cotizacion', 'System\QuotationController@index')->name('quotation.index');
    Route::post('Quotation', 'System\QuotationController@store')->name('quotation.store');
    Route::delete('dashboard/cotizacion/{id}', 'System\QuotationController@destroy')->name('quotation.delete');
    Route::get('quotation/{id}', 'System\QuotationController@show')->name('quotation.show');
    Route::get('dashboard/cotizaciones', 'System\QuotationController@getQuotation')->name('quotation.getQuotation');

    // Profile Routes Admin
    Route::get('dashboard/perfil', 'System\ProfileController@index')->name('users.Profile');
    Route::get('dashboard/perfil/create', 'System\ProfileController@create')->name('profile.create');
    Route::post('dashboard/perfil', 'System\ProfileController@store')->name('profile.store');
    Route::get('dashboard/perfil/{id}', 'System\ProfileController@edit')->name('profile.edit');
    Route::put('dashboard/perfil/{id}', 'System\ProfileController@update')->name('profile.update');

    // Profile Clients
    Route::get('cliente/perfil', 'System\ProfileController@indexClient')->name('client.profile');
    Route::get('/cliente/perfil/get/{id}', 'System\ProfileController@getProfileClient')->name('Get.Profile');
    Route::post('/cliente/perfil/guardar/perfil/{id}', 'System\ProfileController@storeClient')->name('Store.ProfileClient');
    Route::get('cliente/event/get/{id}', 'System\ProjectController@clientEvent')->name('client.event');
        // Gallery
        Route::post('cliente/gallery/{id}', 'System\GalleryController@store')->name('gallery.store');
        Route::delete('cliente/gallery/{id}', 'System\GalleryController@destroy')->name('gallery.delete');
        // Portfolio pictures
        Route::put('cliente/perfil/profile-picture/{id}', 'System\ProfileController@profilePicture')->name('profile.profilePicture');
        Route::put('cliente/perfil/banner-picture/{id}', 'System\ProfileController@bannerPicture')->name('profile.bannerPicture');
    // Task Routes
        // Block
    Route::get('dashboard/block', 'System\BlocktaskController@index')->name('block.index');
    Route::get('dashboard/blocks/get', 'System\BlocktaskController@getBlock')->name('block.getBlock');
    Route::get('dashboard/users/get', 'System\BlocktaskController@getUsers')->name('block.getUsers');
    Route::post('dashboard/block/save', 'System\BlocktaskController@store')->name('block.store');
    Route::put('dashboard/block/update/{id}', 'System\BlocktaskController@update')->name('block.update');
    Route::delete('dashboard/block/delete/{id}', 'System\BlocktaskController@destroy')->name('block.destroy');

    // List
    Route::get('dashboard/lista', 'System\ListtaskController@index')->name('list.index');
    Route::get('dashboard/list/get/{id}', 'System\ListtaskController@getLists')->name('list.getLists');
    Route::put('dashboard/list/update/{id}', 'System\ListtaskController@update')->name('list.update');
    Route::post('dashboard/lista/store', 'System\ListtaskController@store')->name('list.store');
    Route::get('dashboard/lista/{id}', 'System\ListtaskController@show')->name('list.show');
    Route::delete('dashboard/lista/delete/{id}', 'System\ListtaskController@destroy')->name('list.destroy');

        Route::get('dashboard/obtener-bloque/{id}', 'System\ListtaskController@obtenerBloque')->name('obtenerBloque');
    

    // Task
    Route::get('dashboard/tarea', 'System\TaskController@index')->name('task.index');
    Route::post('dashboard/lista/tarea/store', 'System\TaskController@store')->name('task.store');
    Route::delete('dashboard/lista/tarea/tarea/{id}', 'System\TaskController@destroy')->name('task.destroy');
    Route::get('dashboard/lista/tarea/{id}', 'System\TaskController@show')->name('task.show');
    Route::put('dashboard/lista/tarea/{id}', 'System\TaskController@update')->name('task.update');
    Route::get('dashboard/tareas/{id}', 'System\TaskController@getTask')->name('task.getTask');

        Route::get('dashboard/obtener-lista/{id}', 'System\TaskController@obtenerLista')->name('obtenerLista');

    // Admin list
    Route::get('dashboard/admin-lista', 'System\AdminListController@index')->name('adminList.index');
    Route::get('dashboard/admin-list/get/{id}', 'System\AdminListController@getLists')->name('adminList.getLists');
    Route::put('dashboard/admin-list/update/{id}', 'System\AdminListController@update')->name('adminList.update');
    Route::post('dashboard/admin-lista/store', 'System\AdminListController@store')->name('adminList.store');
    Route::get('dashboard/admin-lista/{id}', 'System\AdminListController@show')->name('adminList.show');
    Route::delete('dashboard/admin-lista/delete/{id}', 'System\AdminListController@destroy')->name('adminList.destroy');
        //Admin tasks
        Route::get('dashboard/admin-lista/tasks/{id}', 'System\AdminListController@getTasks')->name('adminList.getTasks');
        Route::post('dashboard/admin-lista/tasks/store', 'System\AdminListController@storeTasks')->name('adminList.storeTasks');
        Route::get('dashboard/admin-lista/tasks/show/{id}', 'System\AdminListController@showTasks')->name('adminList.showTasks');
        Route::post('dashboard/admin-lista/tasks/complete/{id}', 'System\AdminListController@completeTasks')->name('adminList.completeTasks');
        Route::delete('dashboard/admin-lista/tasks/{id}', 'System\AdminListController@destroyTasks')->name('adminList.destroyTasks');
        Route::post('dashboard/admin-lista/tasks/evidence/{id}', 'System\AdminListController@taskGalleryStore')->name('adminList.taskGalleryStore');
        //Graficas
    Route::get('dashboard/estadisticas', 'System\SystemController@estadisticasIndex')->name('estadisticas.index');
        //Obtener datos
        Route::get('grafica-obtener-datos', 'System\SystemController@obtenerDatos');

    // Messages admin
    Route::get('dashboard/conversaciones', 'System\ConversationController@index')->name('conversation.index');
    Route::get('dashboard/conversations', 'System\ConversationController@conversation')->name('conversation.get');
    Route::get('dashboard/mensajes', 'System\MessageController@index')->name('message.index');
    Route::post('dashboard/mensajes', 'System\MessageController@store')->name('message.store');

    // Obtener imagen para messenger
    Route::get('/contact/get/img/{id}', 'System\ConversationController@index')->name('conversation.getImg');
    
    
        
    //menssages clients
    Route::get('dashboard/mensajes/cliente', 'System\ConversationController@indexClient')->name('messages.client');
    Route::get('dashboard/mensajes/conversations', 'System\ConversationController@conversation')->name('conversation.get');
    Route::get('dashboard/mensajes/mensajes', 'System\MessageController@index')->name('message.index');
    Route::post('dashboard/mensajes/mensajes', 'System\MessageController@store')->name('message.store');

    // Notifications
    Route::get('dashboard/notificacion/{id}', 'System\NotificationController@show')->name('notification.get');
    Route::get('notificacion/administrador/{id}', 'System\NotificationController@details')->name('notification.details');
    Route::get('dashboard/notificacion/administrador/{id}', 'System\NotificationController@details')->name('notification.details');
    Route::post('notificacion/mark-as-read', 'System\NotificationController@markRead')->name('notification.markRead');
    Route::post('/notificacion/mark-as-read/conversation', 'System\NotificationController@markReadConversation')->name('notification.markRead.conversation');
    Route::get('notificacion/date/{id}', 'System\NotificationController@date')->name('notification.date');

    
    // Notificaciones cliente
    Route::get('/notificacion/{id}', 'System\NotificationController@show')->name('notification.get');

    // Admin config
    Route::get('dashboard/configuracion', 'System\ConfigController@index')->name('config.index');
    Route::get('dashboard/configuracion/edit', 'System\ConfigController@edit')->name('config.edit');
    Route::put('dashboard/configuracion/dashboard/{id}', 'System\ConfigController@dashboard')->name('config.dashboard');
    Route::put('dashboard/configuracion/bienvenido/{id}', 'System\ConfigController@bienvenido')->name('config.bienvenido');
    Route::put('dashboard/configuracion/mesas/{id}', 'System\ConfigController@mesas')->name('config.mesas');
    Route::put('dashboard/configuracion/imgIndex/{id}', 'System\ConfigController@imgIndex')->name('config.imgIndex');
    Route::put('dashboard/configuracion/nosotros1/{id}', 'System\ConfigController@nosotros1')->name('config.nosotros1');
    Route::put('dashboard/configuracion/nosotros2/{id}', 'System\ConfigController@nosotros2')->name('config.nosotros2');
    Route::put('dashboard/configuracion/nosotros3/{id}', 'System\ConfigController@nosotros3')->name('config.nosotros3');
    Route::put('dashboard/configuracion/nosotros4/{id}', 'System\ConfigController@nosotros4')->name('config.nosotros4');
    Route::put('dashboard/configuracion/contacto/{id}', 'System\ConfigController@contacto')->name('config.contacto');
    Route::post('configuracion/color/{id}', 'System\ConfigController@color')->name('config.color');

    // Notificaciones Email
    Route::post('/sendemail', function(Request $request){
        $data = json_decode(file_get_contents("php://input"));
        $user = User::find($data->to_id);
        $from = Auth::user();
        Mail::to($user->email, 'Creato Studio')
            ->send(new NotificationMail($data,$from));
    });

});




