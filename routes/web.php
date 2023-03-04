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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/sections', 'SectionController@index')->name('sections');
    Route::get('/section/{id?}', 'SectionController@showUpsertView')->name('section');
    Route::post('/save_section', 'SectionController@doUpsert')->name('save_section');

    Route::get('/departments', 'DepartmentController@index')->name('departments');
    Route::get('/department/{id?}', 'DepartmentController@showUpsertView')->name('department');
    Route::post('/save_department', 'DepartmentController@doUpsert')->name('save_department');

    Route::get('/jobtitles', 'JobtitleController@index')->name('jobtitles');
    Route::get('/jobtitle/{id?}', 'JobtitleController@showUpsertView')->name('jobtitle');
    Route::post('/save_jobtitle', 'JobtitleController@doUpsert')->name('save_jobtitle');

    Route::get('/departmentjobtitles', 'DepartmentJobtitleController@index')->name('departmentjobtitles');
    Route::get('/departmentjobtitle/{id?}', 'DepartmentJobtitleController@showUpsertView')->name('departmentjobtitle');
    Route::post('/save_departmentjobtitle', 'DepartmentJobtitleController@doUpsert')->name('save_departmentjobtitle');

    Route::get('/vacancies', 'VacancyController@index')->name('vacancies');
    Route::get('/vacancy/{id?}', 'VacancyController@showUpsertView')->name('vacancy');
    Route::post('/save_vacancy', 'VacancyController@doUpsert')->name('save_vacancy');

    Route::get('/applications', 'ApplicationController@index')->name('applications');
    Route::get('/submissions/{id?}', 'ApplicationController@submissions')->name('submissions');
    Route::get('/submissions/summarytable/{id?}', 'ApplicationController@summaryTable')->name('summarytable');

    Route::get('/submissions/download_summarytable/{id?}','ApplicationController@downloadSummaryTable');

    Route::get('/application/{id?}', 'ApplicationController@showUpsertView')->name('application');

    Route::get('/levels', 'JobhierarchyController@index')->name('levels');
    Route::get('/level/{id?}', 'JobhierarchyController@showUpsertView')->name('level');
    Route::post('/save_level', 'JobhierarchyController@doUpsert')->name('save_level');

    Route::get('/grades', 'EmployeegradeController@index')->name('grades');
    Route::get('/grade/{id?}', 'EmployeegradeController@showUpsertView')->name('grade');
    Route::post('/save_grade', 'EmployeegradeController@doUpsert')->name('save_grades');

    Route::get('/contracts', 'ContractController@index')->name('contract');
    Route::get('/contract/{id?}', 'ContractController@showUpsertView')->name('contract');
    Route::post('/save_contract', 'ContractController@doUpsert')->name('save_contract');

    Route::post('/ajax_verify_certificate','ApplicationController@ajax_verify_certificate')->name('verify_certificate');

    Route::get('/ajax_get_certificate_verified/{id?}','ApplicationController@ajax_get_certificate_verification')->name('get_verify_certificate');
   
    Route::get('/users','UserManagerController@index')->name('users');
    Route::get('/user/{id?}','UserManagerController@showUpsertView')->name('user');
    Route::post('/save_user','UserManagerController@doUpsert')->name('save_user');

});