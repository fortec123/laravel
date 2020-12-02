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


/**********************************************************/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resources([
    'currencies' => 'CurrenciesController',
]);

Route::get('/users/delete/{id}',  'UsersController@delete');

Route::get('/currencies/delete/{id}',  'CurrenciesController@delete');




/**********************************************************/


//** NOT IN USE ***//

Route::resources([
    'brokers' => 'BrokersController',
    'employees' => 'EmployeesController',
    'sources' => 'SourcesController',
    'leads' => 'LeadsController',
    'installments' => 'InstallmentsController',
    'feedbacks' => 'FeedbacksController',
    'notes' => 'NotesController',
    'users' => 'UsersController',
    'categories' => 'CategoriesController',
    'products' => 'ProductsController',
    'orders' => 'OrdersController',
    'payments' => 'PaymentsController',
    'promocodes' => 'PromoCodesController',
    'ingredients' => 'IngredientsController',
    'sliders' => 'SlidersController',
]);




Route::get('analysis', 'HomeController@analysis');
Route::get('performance', 'HomeController@performance');

Route::post('/searchLead', 'LeadsController@searchLead')->name('searchLead');

Route::get('/leads/view',  'LeadsController@view');
Route::post('/leads/view',  'LeadsController@views')->name('viewLead');

Route::get('leads/assign', 'LeadsController@assign');
Route::post('/leads/assign',  'LeadsController@assigns')->name('assignLead');

Route::post('/leads/getLeads',  'LeadsController@getLeads')->name('getLeads');
Route::post('/feedbacks/getFeedbacks',  'FeedbacksController@getFeedbacks')->name('getFeedbacks');


Route::get('leads/closed', 'LeadsController@closed');
Route::get('leads/failed', 'LeadsController@failed');


Route::get('/installment',  'InstallmentsController@installment');
Route::post('/searchInstallment',  'InstallmentsController@searchInstallment')->name('searchInstallment');;

Route::get('/installments/view/{id}',  'InstallmentsController@view');

Route::get('/feedbacks/add/{id}',  'FeedbacksController@add');

Route::get('/notes/add/{id}',  'NotesController@add');

Route::get('/notes/view/{id}',  'NotesController@view');

Route::get('/reminder/view',  'ReminderController@view');


Route::post('changeStatus', 'OrdersController@changeStatus')->name('changeStatus');
Route::post('updateAmount', 'SourcesController@updateAmount')->name('updateAmount');
Route::post('assignLeadsEmployee', 'LeadsController@assignLeadsEmployee')->name('assignLeadsEmployee');

Route::resources([
	'brokers' => 'BrokersController',
    'employees' => 'EmployeesController',
    'sources' => 'SourcesController',
    'leads' => 'LeadsController',
    'installments' => 'InstallmentsController',
    'feedbacks' => 'FeedbacksController',
    'notes' => 'NotesController',
    'users' => 'UsersController',
    'categories' => 'CategoriesController',
    'products' => 'ProductsController',
    'orders' => 'OrdersController',
    'payments' => 'PaymentsController',
    'promocodes' => 'PromoCodesController',
    'ingredients' => 'IngredientsController',
    'sliders' => 'SlidersController',
]);

Route::get('/users/delete/{id}',  'UsersController@delete');

Route::get('/categories/delete/{id}',  'CategoriesController@delete');

Route::get('/products/delete/{id}',  'ProductsController@delete');

Route::get('/promocodes/delete/{id}',  'PromoCodesController@delete');

Route::get('/ingredients/delete/{id}',  'IngredientsController@delete');

Route::get('/sliders/delete/{id}',  'SlidersController@delete');

/*==============*/

Route::get('profile',  'ProfileController@profile')->name('profile');
Route::post('profileUpdate',  'ProfileController@profileUpdate')->name('profileUpdate');


Route::get('/sources/delete/{id}',  'SourcesController@delete');

Route::get('/leads/delete/{id}',  'LeadsController@delete');

Route::get('/employees/delete/{id}',  'EmployeesController@delete');

Route::get('/brokers/delete/{id}',  'BrokersController@delete');



Route::get('ajax-request', 'AjaxController@create');
Route::post('ajax-request', 'AjaxController@store');


/*Excel import export*/
Route::get('export', 'ImportExportController@export')->name('export');
Route::get('import', 'ImportExportController@importLeads');
Route::post('import', 'ImportExportController@import')->name('import');


// PayU Money

Route::get('subscribe-process', [
    'as' => 'subscribe-process',
    'uses' => 'PayUMoneyController@SubscribProcess'
]);


Route::get('subscribe-cancel', [
    'as' => 'subscribe-cancel',
    'uses' => 'PayUMoneyController@SubscribeCancel'
]);

Route::get('subscribe-response', [
    'as' => 'subscribe-response',
    'uses' => 'PayUMoneyController@SubscribeResponse'
]);

// PayU Money

