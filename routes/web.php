<?php

Route::get('/welcome',function() {
    return view('welcome');
});

Route::get('/404/error',function() {
    return view('majorproject.student.404error');
})->name('error');


// Route::get('/exam/result',function() {
//     return view('majorproject.student.exam1');
// });

Route::get('/',function() {
    return view('majorproject.student.index');
});
// @@@@@@@@@@@@@@ ADMIN PANEL @@@@@@@@@@@@@@@@@@@//
Route::get('/admin','AdminController@home')->name('admin');


Route::get('/admin/useless','AdminController@useless')->name('admin.useless');


/*********operation on admin table ****/
Route::get('/admin/register','AdminController@index')->name('admin.register');

Route::post('/admin/register/create','AdminController@create')->name('admin.create');

Route::post('/admin/register/login','AdminController@register')->name('admin.register.self');

Route::get('/admin/register/edit/{id}','AdminController@edit')->name('admin.edit');

Route::post('/admin/register/update/{id}','AdminController@update')->name('admin.update');

Route::get('/admin/register/delete/{id}','AdminController@delete')->name('admin.delete');

Route::post('/admin/login/success','AdminController@login')->name('admin.login');

Route::get('/admin/login/destroy','AdminController@logout')->name('logout.admin');

Route::get('/admin/profile','ProfileController@index')->name('admin.profile');

Route::post('profile', 'ProfileController@update_avatar');
/******* End operation on admin table ****/






/****** Operations on faculty table*******/

Route::get('/admin/viewfaculty','FacultyController@index')->name('A_viewfaculty');

Route::get('/admin/addfaculty','FacultyController@insert')->name('A_addfaculty');

Route::post('/admin/create','FacultyController@create')->name('create');

Route::get('/admin/edit/{id}','FacultyController@edit')->name('edit');

Route::get('/admin/show/{id}','FacultyController@show')->name('faculty.show');

Route::post('/admin/update/{id}','FacultyController@update')->name('update');

Route::get('/admin/delete/{id}','FacultyController@delete')->name('delete');

Route::get('/faculty/profile','FacultyController@facultyprofile')->name('faculty.profile');

Route::post('profile/faculty', 'ProfileController@update_faculty_avatar');
/****** End Operations on faculty table*******/



 

/****** Operations on stream table*******/

Route::get('/admin/addstream','StreamController@index')->name('A_addstream');

Route::post('/admin/addstream/create','StreamController@create')->name('stream.create');

Route::get('/admin/addstream/edit/{id}','StreamController@edit')->name('stream.edit');

Route::get('/admin/addstream/update/{id}','StreamController@update')->name('stream.update');

Route::get('/admin/addstream/delete/{id}','StreamController@delete')->name('stream.delete');

/****** End Operations on stream table*******/



 

/****** Operations on Student table ******/ 

Route::get('/admin/viewstudent','StudentController@index')->name('student.view');

Route::get('/admin/addstudent','StudentController@insert')->name('student.insert');

Route::post('/admin/addstudent/create','StudentController@create')->name('student.create');

Route::get('/admin/addstudent/edit/{id}','StudentController@edit')->name('student.edit');

Route::get('/admin/addstudent/show/{id}','StudentController@show')->name('student.show');

Route::post('/admin/addstudent/update/{id}','StudentController@update')->name('student.update');

Route::get('/admin/addstudent/delete/{id}','StudentController@delete')->name('student.delete');

/****** End Operations on Student table ******/ 





/******  Operation on Subject Table ********/
Route::get('/admin/addsubject','SubjectController@index')->name('subject.view');

Route::post('/admin/addsubject/create','SubjectController@create')->name('subject.create');

Route::get('/admin/addsubject/delete/{id}','SubjectController@delete')->name('subject.delete');
/******  End operation on Subject Table  ********/



/********** Result View   ***********************/
Route::get('/admin/results','ResultController@index')->name('result.view');

Route::get('/admin/stream/test/{id}','ResultController@view_test')->name('view.test');

Route::get('/admin/stream/test/edit/{id}','ResultController@edit_test')->name('edit.test');

Route::post('/admin/stream/test/update/{id}','ResultController@update_test')->name('update.test');

Route::post('/admin/result/data','ResultController@data')->name('result.data');
/*************** End result view **************/


/*********** Admin Searching Controller ******************/
Route::get('/admin/search','SearchController@index')->name('admin.search');

Route::get('/admin/search/data','SearchController@search')->name('admin.search.data');
/*********** End Admin Searching Controller ******************/

/*************** Operation on notice table ******************/
Route::get('/admin/notice','NoticeController@index')->name('notice.view');

Route::post('/admin/notice/add','NoticeController@create')->name('notice.add');

Route::get('/admin/notice/delete/{id}','NoticeController@delete')->name('notice.delete');
/*************** End Operation on notice table ******************/
// @@@@@@@@@@@@@@@@@@@@@@@@@@@ END ADMIN PANEL @@@@@@@@@@@@@@@@@@@@@@@//





// @@@@@@@@@@@@@@@@@@@@@@@@@@@ FACULTY PANEL @@@@@@@@@@@@@@@@@@@@@@@//
Route::get('/faculty','FacultyController@home')->name('faculty');

Route::post('/faculty/login/success','FacultyController@login')->name('faculty.login');

Route::get('/faculty/login/destroy','FacultyController@logout')->name('logout.faculty');



/********Subject view form subject table ********/
Route::get('/faculty/viewsubject','ShowSubject@index')->name('subject.show');




/***********  Chapter table Opetation ************/
Route::get('/faculty/addchapter/index','ChapterController@index')->name('chapter.index');

Route::post('/faculty/addchapter/create','ChapterController@create')->name('chapter.create');

Route::get('/faculty/chapter/delete/{id}','ChapterController@delete')->name('chapter.delete');

/*********** End Chapter table Opetation ************/





/************ Operation on Question Table ***********/
Route::get('/faculty/question/index','QuestionController@index')->name('question.index');

Route::get('get-subject-list','QuestionController@getSubject')->name('getsubject');

Route::get('get-chapter-list','QuestionController@getChapter');

Route::post('/faculty/addquestion/create','QuestionController@create')->name('question.insert');

Route::get('/faculty/viewquestion','QuestionController@view_question')->name('question.view');

Route::get('/faculty/question/delete/{id}','QuestionController@delete')->name('question.delete');
/************* End Operation on Question table **************/




//*************** Operation on test Table  ****************//
 Route::get('/faculty/test/index','TestController@index')->name('test.index');

 Route::get('get-subject-list-for-test','TestController@getSubject')->name('getsubject.test');

 Route::post('/test/insert','TestController@insert')->name('test.insert');

  Route::get('/test/view','TestController@view')->name('test.view');

   Route::get('/test/over','TestController@over')->name('test.over');

  Route::get('/test/delete/{id}','TestController@delete_test')->name('test.delete');

  Route::get('/test/results/{id}','TestController@test_results')->name('test.results');

 Route::get('/test/edit/{id}','TestController@edit_test')->name('test.edit');

Route::post('/faculty/test/update/{id}','TestController@update_test')->name('test.update');

  Route::get('/test/question/{id}','TestController@fetch_question')->name('fetch.question');


// *************** End Operation on test Table **************//

// @@@@@@@@@@@@@@@@@@@@@ END FACULTY PANEL @@@@@@@@@@@@@@@@@@@@@@@//



// @@@@@@@@@@@@@@@@@@@@@@@@@@@ STUDENT PANEL @@@@@@@@@@@@@@@@@@@@@@@//
 
Route::get('/student/login','StudentController@login')->name('login.all');

Route::post('/student/register','StudentController@register')->name('student.register');

Route::get('/student/login/success','StudentController@studentlogin')->name('student.login');


Route::get('/student/test/page','StudentController@student_test')->name('student.test');

Route::get('/student/logout','StudentController@student_logout')->name('student.logout');

Route::get('/student/profile','StudentController@student_profile')->name('student.profile');

Route::get('/student/result','StudentController@student_result')->name('student.result');

Route::get('/student/exam', function () {
    return view('majorproject.student.exam');
})->name('exam');

// @@@@@@@@@@@@@@@@@@@@@@@@@@@ END STUDENT PANEL @@@@@@@@@@@@@@@@@@@@@@@//


//  @@@@@@@@@@@@@@@@@@@@ Auth Routes @@@@@@@@@@@@@@@@@@@@@@@@@@//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//  @@@@@@@@@@@@@@@@@@@@ End Auth Routes @@@@@@@@@@@@@@@@@@@@@@@@@@//