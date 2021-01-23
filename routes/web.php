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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('form', function (){
//    return view('form');
// });
// Route::get('table', function (){
//    return view('table');
// });


Route::get('admin/profile-show', function (){
    return view('admin.profile.show');
});

// Route::get('getdivisions', function(){
//   // dd('sdfsd');
//   $client = new \GuzzleHttp\Client();
//   $response = $client->request('GET', 'http://127.0.0.1:8000/api/division');

//   echo $response->getStatusCode(); # 200
//   echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
//   echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'
// });



// Route::get('payment', function (){
//    return view('studentPayment');
// });

// Route::get('/apply-now', function () {
//     $siteConfig = [];
//     return view('user.applyNow.index', compact('siteConfig'));
// });

// Route::get('/', 'User\HomeController@index')->name('welcome');

Route::group(['namespace'=>'User'], function (){
    Route::get('/', 'HomeController@index')->name('user.home');
    //   Course route     //
    Route::get('/course', 'CourseController@index')->name('user.course');
    Route::get('/course/details/{id}', 'CourseController@courseDetails')->name('course-details');
    Route::get('/message', 'MessageController@index')->name('user.message');

    Route::get('/page/{id}', 'MessageController@page')->name('userpage');

    Route::get('/aboutUs', 'HomeController@aboutUs')->name('user.aboutUs');
    Route::get('/contact2', 'ContactController@index')->name('contact');
    Route::post('/contact/SendMsg', 'ContactController@SendMsg');
    Route::post('send/contact/email', 'MailController@sendemail');
    Route::get('/teacher', 'FacultyController@index')->name('teacher');
    // Route::get('/faculty/details/{id}', 'User\FacultyController@facultyDetails');
    Route::get('/notice-board/details/{id}', 'HomeController@noticeBoardDetails')->name('notice-details');
    Route::get('/apply-now', 'ApplyNowController@index')->name('applyNow');
    Route::post('/apply-now/applyStudentform', 'ApplyNowController@applyStudentform')->name('applyNowStore');

    Route::get('/photo-gallary', 'GallaryController@photo')->name('photo-gallery');
    Route::get('/vedio-gallary', 'GallaryController@vedio')->name('vedio-gallary');

    Route::get('/service', 'ServiceController@index')->name('service');
    Route::get('/portfolio', 'HomeController@Portfolio')->name('user.portfolio');

    Route::get('/getdivisions', 'HomeController@divisionData');
    Route::get('/get-districts', 'HomeController@districtData');
    Route::get('/get-upazilas', 'HomeController@upazilaData');
    Route::get('/get-institutes', 'HomeController@instituteData');
    Route::get('/get-banner', 'HomeController@banner');

    // Route::get('/banners', 'HomeController@bannerz');

    Route::get('/result', 'HomeController@result');
    Route::get('/result/search', 'HomeController@resultsearch')->name('resultsearch');

});

Route::get('sadmin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Auth::routes();
// Route::get('/register', function () {
//    return redirect('register');
// }); 

/**
        =======================================================================================
                                     Admin Start
        =======================================================================================
    **/

Route::group(['middleware'=>'auth','namespace'=>'Admin'], function (){



    /**
        =======================================================================================
                                     Sms Routes Start
        =======================================================================================
    **/
    
    Route::resource('admin_sms', 'SmsController');
    Route::resource('admin_sms_switch', 'SmsSwitchController');

    /**
        =======================================================================================
                                     Sms Routes End
        =======================================================================================
    **/



    Route::get('generate-student-id', 'StudentProfileController@getStudentId')->name('generate-id');
    Route::get('active-student/{id}', 'StudentProfileController@active')->name('active');
    Route::get('inactive-student/{id}', 'StudentProfileController@inactive')->name('inactive');

    Route::get('admin/home', 'HomeController@index')->name('home');

    Route::resource('admin/slider', 'SliderController');
    Route::resource('admin/faculty', 'FacultyController');
    Route::resource('admin/newsUpdate', 'NewsUpdateController');
    //   About Us Route     //
    Route::get('admin/aboutUs', 'AboutUsController@showAboutForm')->name('aboutUs');
    Route::post('/aboutUsPost', 'AboutUsController@aboutUsPost')->name('aboutUsPost');
    //   Message Route     //
    Route::get('admin/message', 'MessageController@showMessage')->name('message');
    Route::post('/messagePost', 'MessageController@messagePost');

    /**
        =======================================================================================
                Site Configuration Route Start
        =======================================================================================
    **/
    Route::get('admin/siteConfig', 'SiteConfigController@showSiteConfigurationForm')->name('siteConf');
    Route::post('/siteConfigurationPost', 'SiteConfigController@siteConfigurationPost');

    Route::resource('admin/successStudent', 'SuccessStudentController');
    Route::resource('admin/addmissionOn', 'AddmissionOnController');
    Route::resource('admin/course', 'CourseController');
    Route::resource('admin/page', 'PageController');
    Route::resource('admin/photoGallary', 'PhotoGallaryController');
    Route::resource('admin/vedioGallary', 'VedioGallaryController');
    Route::resource('admin/studentProfile', 'StudentProfileController');
    //Student Admission Store
    Route::post('admin/studentAdmission', 'StudentProfileController@storeStudent')->name('admin.studentAdmission');

    //Approve Student Route
    Route::post('approve_student/{id}', 'StudentProfileController@approveStudent')->name('student.approved');
    Route::post('delete_student/{id}', 'StudentProfileController@deleteStudent')->name('delete.student');


    Route::get('admin/student/Result', 'ResultController@index')->name('result.index');

    Route::get('admin/student/Result/create', 'ResultController@create')->name('result.create');
    Route::post('admin/student/Result/store', 'ResultController@store')->name('result.store');
    Route::post('admin/student/Result/delete/{id}', 'ResultController@destroy')->name('result.delete');

    //Ajax Route For Result
    Route::get('getstufrresult/{id}', 'ResultController@getstufrresult')->name('getstufrresult');
    Route::get('getResult/{id}', 'ResultController@getResult')->name('getResult');



    Route::get('admin/students/search', 'StudentProfileController@search')->name('admin.student.search');
    Route::resource('admin/studentProfile', 'StudentProfileController');
    Route::resource('admin/service', 'ServiceController');

    // Route::get('protected', ['middleware' => ['auth', 'user'], function() {

    Route::resource('admin/service', 'ServiceController');
    // return "this page requires that you be logged in and an Admin";
    //   }]);

    Route::resource('admin/portfolio', 'PortfolioController');
    Route::resource('admin/notice-board', 'NoticeBoardController');

    // Chart of Account Route //
    Route::resource('admin/account', 'AccountController');
    Route::resource('admin/expense', 'ExpenseController');
    Route::resource('admin/income', 'IncomeController');
    Route::get('expense-view/{id}', 'ExpenseController@expense_view');
    Route::get('income-view/{id}', 'IncomeController@income_view');
    Route::get('student-income/{id}', 'StudentPaymentController@student_income');


    /**
        =======================================================================================
                Report Route Start
        =======================================================================================
    **/
    Route::resource('admin/incomeExpenseReport','IncomeExpenseReportController');
    Route::post('search-income-expense','IncomeExpenseReportController@incomeExpenseReport');

    Route::get('admin/studentPaymentReport','IncomeExpenseReportController@studentPaymentIndex');
    
    Route::post('search-student-payment-report','IncomeExpenseReportController@studentPaymentReport');

    Route::get('admin/expenseReport','IncomeExpenseReportController@expenseReportIndex');
    Route::post('search-expense','IncomeExpenseReportController@expenseReport');

    Route::get('admin/incomeReport','IncomeExpenseReportController@incomeReportIndex');
    Route::post('search-income','IncomeExpenseReportController@incomeReport');

    Route::get('search', 'StudentPaymentController@index');
    Route::get('autocomplete', 'StudentPaymentController@search_student')->name('autocomplete');
    Route::get('student-search/{id}','StudentPaymentController@student_search');

    //Student Due recive route
    Route::resource('admin/dueReceive','DueReceiveController');
    Route::get('admin/studentduelist', 'DueReceiveController@studentDueList')->name('studentduelist');
    //Income
    Route::get('/admin/incomeDue', 'DueReceiveController@incomeDue');
    Route::post('/admin/incomeDue', 'DueReceiveController@storeIncomeDue')->name('incomeDue.store');
    Route::get('admin/incomeduelist', 'DueReceiveController@incomeDueList')->name('incomeduelist');

    //Expence
    Route::get('/admin/expenceDue', 'DueReceiveController@expenceDue');
    Route::post('/admin/expenceDue', 'DueReceiveController@storeExpenceDue')->name('expenceDue.store');
    Route::get('admin/expenceduelist', 'DueReceiveController@expenceDueList')->name('expenceduelist');
 

    Route::get('due-student-search','DueReceiveController@data_index');
    Route::post('due-payment','DueReceiveController@due_payment')->name('duePayment');

    //   Student Payment Route     //
    Route::resource('admin/student-payment', 'StudentPaymentController');

    //Get Batch For Student Payment Using Course Id
    Route::get('getBatch/{id}', 'StudentPaymentController@getBatch')->name('getBatch');
    Route::get('admin/get-batch/ajax/{id}','StudentPaymentController@ajaxGetBatch');
    Route::get('admin/student-payment-printPDF','StudentPaymentController@printPDF')->name('student-payment.PDF');
    // return redirect('login');
    //   Batch route     //
    Route::get('admin/batch', 'BatchController@batch')->name('batch.index');
    Route::post('/batchStore', 'BatchController@store');
    Route::post('/batch/update', 'BatchController@batchUpdate');
    Route::get('batch-delete/{id}','BatchController@delete');

    
    //          Route::get('admin/batch/create', 'ConfigurationController@batchForm');
    //          Route::post('/batchStore', 'ConfigurationController@batchStore');
    //          Route::get('admin/batch/{id}/edit', 'ConfigurationController@batchEditForm')->name('batch.edit');
    //          Route::PUT('/batchUpdate/{id}', 'ConfigurationController@batchUpdate');
    //          Route::delete('/batchDelete/{id}', 'ConfigurationController@batchDelete');
    //   Session route     //


    // Year Routes 
    /**
        =======================================================================================
                Year Routes  Route Start
        =======================================================================================
    **/
    Route::get('admin/year', 'YearController@index')->name('year.index');
    Route::post('admin/store', 'YearController@store')->name('year.store');
    Route::post('admin/update/{id}', 'YearController@update')->name('year.update');
    Route::post('admin/delete/{id}', 'YearController@destroy')->name('year.destroy');

    /**
        =======================================================================================
                            Year Routes  Route End
        =======================================================================================
    **/

    /**
        =======================================================================================
                            Session Routes  Route End
        =======================================================================================
    **/
    Route::get('admin/session', 'SessionController@index')->name('session.index');
    Route::get('admin/session/create','SessionController@create');
    Route::post('/sessionStore', 'SessionController@store');
    Route::post('/session/update', 'SessionController@sessionUpdate');
    Route::get('session-delete/{id}','SessionController@delete');
    /**
        =======================================================================================
                            Year Routes  Route End
        =======================================================================================
    **/

    //  Route::get('admin/contact', 'ContactController@index')->name('contact.index');
    //  Route::get('contact/{item}','ContactController@show')->name('contact.show');
    //  Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
    //   Apply Now route     //
    Route::get('admin/applyNow', 'ApplyNowController@index')->name('applyNow.index');
    Route::get('applyNow/{id}','ApplyNowController@show')->name('applyNow.show');
    Route::delete('applyNow/{id}','ApplyNowController@destroy')->name('applyNow.destroy');

    Route::get('approve/{id}','ApplyNowController@approveStudent')->name('applyNow.approve');

    Route::resource('admin/party', 'PartyController');

    Route::resource('admin/user', 'UserController');

    Route::PUT('/change-password/{id}', 'UserController@updatePassword')->name('user.password');
    // Route::resource('admin/role', 'RoleController');

    /**
        =======================================================================================
                                     Ajax Routes Start
        =======================================================================================
    **/

    //Get Batch
    Route::get('get-batch/{id}', 'BatchController@getBatch')->name('getBatch');   
    //Get Student
    Route::get('get-student/{course}{batch}', 'StudentProfileController@getStudent')->name('getStudent');
    Route::get('getstu/{id}', 'StudentPaymentController@getstudent')->name('getstu');
    /**
        =======================================================================================
                                     Ajax Routes End
        =======================================================================================
    **/




});

    // menu
    Route::get('/mcreate/','MenuController@create')->name('createmenu');
    Route::post('/mcreate/','MenuController@post')->name('createmenupost');

    Route::get('/mview/','MenuController@view')->name('mview');

    Route::get('/mupdate/{id}','MenuController@update')->name('updatemenu');
    Route::post('/mupdate/','MenuController@updatepost')->name('updatemenupost');

    Route::delete('/mdelete/{id}','MenuController@delete')->name('deletemenu');

    // Social
    Route::get('/icon/create/','SocialController@create')->name('createicon');
    Route::post('/icon/create/','SocialController@post')->name('createiconpost');

    Route::get('/icon/view/','SocialController@view')->name('iconview');

    Route::get('/icon/update/{id}','SocialController@update')->name('updateicon');
    Route::post('/icon/update/','SocialController@updatepost')->name('updateiconpost');

    Route::delete('/icon/delete/{id}','SocialController@delete')->name('deleteicon');



//     Route::get('protected', ['middleware' => ['auth', 'user'], function() {

//       Route::resource('admin/service', 'ServiceController');
//       // return "this page requires that you be logged in and an Admin";
//   }]);


Route::get('ex', function (){
return view('admin.ex');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "What the hell.... why do you cleared cache , এখন আমার কি হবে কারণ আমি ক্যাস ছিলাম ...";
});

// Route::get('print/{id}','User\ApplyNowController@print')->name('print');