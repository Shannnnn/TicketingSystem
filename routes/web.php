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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('sources', 'TicketSourceController');
Route::resource('topics', 'HelpTopicController');
Route::resource('departments', 'DepartmentController');
Route::resource('descriptions', 'DescriptionController');
Route::resource('assignees', 'AssigneeController');
Route::resource('plans', 'SlaPlanController');
Route::resource('priorities', 'PriorityController');
Route::resource('products', 'ProductController');
Route::resource('statuses', 'CurrentStatusController');
Route::resource('brands', 'BrandController');
Route::resource('knowledgebase', 'KnowledgebaseController');

// Tickets
//Route::resource('tickets', 'TicketController');
Route::get('create-tickets', 'TicketController@create');
Route::get('tickets', 'TicketController@index');
Route::post('tickets', 'TicketController@store');
Route::get('tickets/{id}', 'TicketController@show');
Route::post('comment', 'CommentsController@postComment');
Route::post('tickets/{id}', 'TicketController@changeStatus');
Route::get('tickets/api/{id}', 'TicketController@getTicket');
Route::get('tickets/api/{id}/{agent}', 'TicketController@assignTicket');
Route::get('open-tickets', 'TicketController@open');
Route::get('closed-tickets', 'TicketController@closed');
Route::get('my-tickets', 'TicketController@owned');
Route::get('/clients', 'ClientController@index');

Route::get('/calendar', 'CalendarController@index');

// APIs
Route::get('api/companies', 'TicketController@getAllCompanies');
Route::get('api/branch/{id}', 'TicketController@getBranches');
Route::get('api/branch-address/{company}/{id}', 'TicketController@getAddress');
Route::get('api/contact/{company}/{id}', 'TicketController@getContacts');
Route::get('tickets/api/branch/{id}', 'TicketController@getBranches');
Route::get('tickets/api/branch-address/{company}/{id}', 'TicketController@getAddress');
Route::get('tickets/api/contact/{company}/{id}', 'TicketController@getContacts');
Route::get('api/client/{company}/{id}', 'TicketController@getClientId');
Route::get('tickets/api/ticket/{id}', 'TicketController@getTicket');
Route::get('api/branch/{id}', 'TicketController@getBranches');
Route::get('api/branch-address/{company}/{id}', 'TicketController@getAddress');
Route::get('api/contact/{company}/{id}', 'TicketController@getContacts');

Route::get('api/clients', 'ClientController@getAllClients');
Route::post('api/clients/add', 'ClientController@store');
Route::post('api/clients/update', 'ClientController@update');
Route::get('api/clients/delete/{id}', 'ClientController@destroy');

Route::get('api/tickets', 'TicketController@getAllTickets');
Route::get('api/tickets/open', 'TicketController@getOpenTickets');
Route::get('api/tickets/closed', 'TicketController@getClosedTickets');
Route::get('api/tickets/owned', 'TicketController@getOwnedTickets');
Route::post('api/client/add', 'ClientController@store');
Route::get('api/client/delete/{id}', 'ClientController@destroy');

Route::get('api/contacts/{id}', 'ContactController@getContacts');
Route::post('api/contacts/add', 'ContactController@store');
Route::post('api/contacts/update', 'ContactController@update');
Route::get('api/contacts/delete/{id}', 'ContactController@destroy');

Route::get('tickets/api/tags', 'TicketController@getAllTags');
Route::get('api/client/companies', 'ClientController@getAllCompanies');