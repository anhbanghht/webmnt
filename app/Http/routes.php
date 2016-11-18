<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| @if( \Auth::user()->has_permission( 'mmt::homepage' ) )
| 
| Route::group(['middleware'=>['web','auth']],function(){
*/

//--- Login ---/
Route::get('/login',['as'=>'login','middleware' => ['web'],function(){
    return view('login');
}]);
Route::post('/login',['as'=>'dologin','middleware' => ['web'],'uses'=>'Users@dologin']);

//-- Require Auth only
Route::group(['middleware'=>['web','auth']],function(){
    //--- logout ---//
    Route::get('/logout',['as'=>'logout',function(){
        \Auth::logout();
        return redirect()->route('login');
    }]);
    
    //--- Permission denied ---//
    Route::get('/denied',['as'=>'denied',function(){
        return view('denied');
    }]);
    
    
});


// Route all
Route::group(['middleware'=>['web','auth','permission']],function(){
    
    Route::get('/',['as'=>'dashboard',function () {
        return view('dashboard');
    }]);
    //Mr. Duong
    
    // Begin
    Route::group(['prefix'=>'assign','as' => 'assign::'], function () {
        Route::get('/sendfile',['as' => 'sendfile','uses'=>'SendfilesController@index']);
        Route::post('/typework',['as' => 'layouttypework','uses'=>'SendfilesController@typework']);
        Route::post('/savework',['as'=>'savework','uses'=>'SendfilesController@savework']);
		Route::post('/savefilework',['as'=>'savefilework','uses'=>'SendfilesController@savefilework']);
		Route::post('/worktasklayout',['as'=>'worktasklayout','uses'=>'SendfilesController@worktasklayout']);
        Route::get('/listfile',['as' => 'listfile','uses'=>'SendfilesController@listfile']);
        Route::post('/sendfiles/delete',['as' => 'deletefile','uses'=>'SendfilesController@delete']);
		Route::post('/addtask',['as'=>'addtask','uses'=>'AssignController@addtask']);
        Route::post('/savetask',['as'=>'savetask','uses'=>'SendfilesController@savetask']);
		
        Route::get('/works',['as' => 'listwork','uses'=>'AssignController@index']);
        Route::post('/filterwork',['as' => 'filterwork','uses'=>'AssignController@filterwork']);
		Route::get('/listassign/{id}',['as' => 'listassign','uses'=>'AssignController@listassign']);
		Route::get('/listassignall',['as' => 'listassignall','uses'=>'AssignController@listassignall']);
        Route::post('/approve',['as' => 'approve','uses'=>'AssignController@approve']);
        Route::post('/assign/update',['as' => 'updatetask','uses'=>'AssignController@update']);
        Route::post('/assignTeacher',['as' => 'assignteacher','uses'=>'AssignController@assignlayout']);
        Route::get('/showcalendar',['as' => 'showcalendar','uses'=>'AssignController@showcalendar']);
		
		Route::get('/sendmail',['as' => 'sendmailall','uses'=>'AssignController@sendmailall']);
		Route::post('/customersend',['as' => 'customersend','uses'=>'AssignController@customersend']);
		Route::post('/sendMailCustomer',['as' => 'sendmailcustomer','uses'=>'AssignController@sendmailcustomer']);
		
		Route::post('/assigntoday',['as'=>'assigntoday','uses'=>'AssignController@assigntoday']);
		Route::post('/assigntoweek',['as'=>'assigntoweek','uses'=>'AssignController@assigntoweek']);
		Route::post('/assigntomonth',['as'=>'assigntomonth','uses'=>'AssignController@assigntomonth']);
		Route::post('/assignfilterdate',['as'=>'assignfilterdate','uses'=>'AssignController@assignfilterdate']);
    });
    //end
    
    
    /*Huyen*/
    Route::group(['prefix'=>'program','as'=>'program::'],function(){
        Route::get('/list/{id_programs?}','ProgramController@listprogram');
        Route::get('/add',['as'=>'add','uses'=>'ProgramController@add']);
        Route::post('/add',['as'=>'create','uses'=>'ProgramController@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'ProgramController@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'ProgramController@update']);
        Route::get('/delete/{id}',['as'=>'delete','uses'=>'ProgramController@delete']);
    });
     Route::group(['prefix'=>'managerfile','as'=>'managerfile::'],function(){
        Route::get('/','SendController@index');
        Route::post('/savework',['as'=>'savework','uses'=>'SendController@savework']);
        
    });
    Route::group(['prefix'=>'program1','as'=>'program1::'],function(){
        Route::get('/','ProgramController1@listprogram1');
        Route::get('/add',['as'=>'add','uses'=>'ProgramController1@add']);
        Route::post('/add',['as'=>'create','uses'=>'ProgramController1@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'ProgramController1@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'ProgramController1@update']);
        Route::get('/delete/{id}',['as'=>'delete','uses'=>'ProgramController1@delete']);
        
    });
    Route::group(['prefix'=>'record', 'as'=>'record::'],function(){
        Route::get('/','RecordController@listrecord');
         Route::get('/edit/{id}',['as'=>'edit','uses'=>'RecordController@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'RecordController@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'RecordController@delete']);
        Route::post('/uploadfile',['as'=>'uploadfile','uses'=>'RecordController@uploadFile']);
    });
     Route::group(['prefix'=>'division','as'=>'division::'],function(){
        Route::get('/','DivisionController@listdivision');
        Route::get('/add',['as'=>'add','uses'=>'DivisionController@add']);
        Route::post('/add',['as'=>'create','uses'=>'DivisionController@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'DivisionController@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'DivisionController@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'DivisionController@delete']);
    });
    
     Route::group(['prefix'=>'responsible','as'=>'responsible::'],function(){
        Route::get('/','ResponsibleController@listresponsible');
        Route::get('/add',['as'=>'add','uses'=>'ResponsibleController@add']);
        Route::post('/add',['as'=>'create','uses'=>'ResponsibleController@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'ResponsibleController@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'ResponsibleController@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'ResponsibleController@delete']);
        Route::post('/uploadfile',['as'=>'uploadfile','uses'=>'ResponsibleController@uploadFile']);
    });
    
    Route::group(['prefix'=>'schedule','as'=>'schedule::'],function(){
        Route::get('/','ScheduleController@listschedule');
    });
    
    //end_huyen
    
    //Tuoi start
    
    Route::group(['prefix'=>'year','as'=>'year::'],function(){
        Route::get('/','SchoolYear@listYear');
        Route::get('/add',['as'=>'add','uses'=>'SchoolYear@add']);
        Route::post('/add',['as'=>'create','uses'=>'SchoolYear@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'SchoolYear@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'SchoolYear@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'SchoolYear@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'SchoolYear@view']);
    });
    
    Route::group(['prefix'=>'student','as'=>'student::'],function(){
        Route::get('/','Student@listStudent');
        Route::get('/add',['as'=>'add','uses'=>'Student@add']);
        Route::post('/add',['as'=>'create','uses'=>'Student@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Student@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Student@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Student@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Student@view']);
        //Route::get('/search',['as'=>'search','uses'=>'Student@search']);
        Route::post('/import',['as'=>'import','uses'=>'Student@import']);
    });
    
    Route::group(['prefix'=>'teacher','as'=>'teacher::'],function(){
        Route::get('/','Teacher@listTeacher');
        Route::get('/add',['as'=>'add','uses'=>'Teacher@add']);
        Route::post('/add',['as'=>'create','uses'=>'Teacher@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Teacher@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Teacher@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Teacher@delete']);
        Route::get('/list/{id}',['as'=>'listbytime','uses'=>'Teacher@listbytime']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Teacher@view']);
    });
    
    Route::group(['prefix'=>'intership_type','as'=>'intership_type::'],function(){
        Route::get('/','Intership_type@listIntership_type');
        Route::get('/add',['as'=>'add','uses'=>'Intership_type@add']);
        Route::post('/add',['as'=>'create','uses'=>'Intership_type@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Intership_type@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Intership_type@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Intership_type@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Intership_type@view']);
    });
    Route::group(['prefix'=>'users', 'as'=>'users:'],function(){
        //List table
        Route::get('/list/{group?}','Users@list_user');
        Route::get('/new',['as'=>'new','uses'=>'Users@create_user']);
        Route::post('/new',['as'=>'add','uses'=>'Users@insert_user']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Users@edit_user']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Users@update_user']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Users@del_user']);
        Route::get('/view_user/{id}',['as'=>'view_user','uses'=>'Users@view_user']);
        
        Route::get('/changepass',['as'=>'changepass','uses'=>'Users@changepass']);
        Route::post('/changepass',['as'=>'change_pass','uses'=>'Users@update_pass']);

        //Group
        Route::group(['prefix'=>'usergroups', 'as'=>'groups:'],function(){
            Route::get('/','Users@list_group');
            Route::get('/new',['as'=>'new','uses'=>'Users@create_group']);
            Route::post('/new',['as'=>'add','uses'=>'Users@insert_group']);
            Route::get('/permission/{id}',['as'=>'permission','uses'=>'Users@permission']);
            Route::post('/permission/{id}',['as'=>'permission','uses'=>'Users@setPermission']);
            Route::get('/edit/{id}',['as'=>'edit','uses'=>'Users@edit']);
            Route::post('/edit/{id}',['as'=>'update','uses'=>'Users@update']);
            Route::post('/delete/{id}',['as'=>'delete','uses'=>'Users@del']);
            //Multiaction
            Route::post('/multiaction',['as'=>'multiaction','uses'=>'Users@multiaction']);
            Route::get('/view/{id}',['as'=>'view','uses'=>'Users@view']);
        });
        
        });
    //---waitting--
    
    Route::group(['prefix'=>'plan','as'=>'plan::'],function(){
        Route::get('/list/{intertime_id?}','Plan@listPlan');
        Route::get('/add/{intertime_id?}',['as'=>'add','uses'=>'Plan@add']);
        Route::post('/add/{intertime_id?}',['as'=>'create','uses'=>'Plan@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Plan@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Plan@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Plan@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Plan@view']);
    });
    
    Route::group(['prefix'=>'intership_time','as'=>'intership_time::'],function(){
        Route::get('/list/{year_id?}','Intership_time@listIntership_time');
        Route::get('/create_list_student/{intertime_id?}',['as'=>'addListStudent','uses'=>'Intership_time@create_list_students']);
        Route::post('/create_list_student/{intertime_id?}',['as'=>'createListStudent','uses'=>'Intership_time@add_list_students']);
        Route::get('/list_student/{intertime_id?}',['as'=>'listStudent','uses'=>'Intership_time@list_students']);
        Route::get('/allow_student/{intertime_id?}',['as'=>'allowStudent','uses'=>'Intership_time@allow_students']);
        Route::post('/allow_student/{intertime_id?}',['as'=>'doAllow','uses'=>'Intership_time@do_allow_students']);
        
        Route::get('/add_teacher/{intertime_id?}',['as'=>'addlistTeacher','uses'=>'Intership_time@add_list_teacher']);
        Route::post('/add_teacher/{intertime_id?}',['as'=>'addlistTeacher','uses'=>'Intership_time@insert_list_teacher']);
        
        Route::get('/list_guide_teacher/{intertime_id?}',['as'=>'listGuideTeacher','uses'=>'Intership_time@list_guide_teacher']);
        Route::get('/list_guide_teacher/{intertime_id}/teacher/{teacher_id}',['as'=>'listStudentOfGuideTeacher','uses'=>'Intership_time@listStudentOfGuideTeacher']);
        
        
        Route::get('/add/{year_id?}',['as'=>'add','uses'=>'Intership_time@add']);
        Route::post('/add/{year_id?}',['as'=>'create','uses'=>'Intership_time@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Intership_time@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Intership_time@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Intership_time@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Intership_time@view']);

        Route::get('/view_topic/{intership_student}',['as'=>'view_topic','uses'=>'Intership_time@view_topic']);
        
    });
    Route::group(['prefix'=>'topic_process','as'=>'topic_process::'],function(){
        Route::get('/','Topic_process@listTopic_process');
        Route::get('/add',['as'=>'add','uses'=>'Topic_process@add']);
        Route::post('/add',['as'=>'create','uses'=>'Topic_process@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Topic_process@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Topic_process@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Topic_process@delete']);
    });
    Route::group(['prefix'=>'topic','as'=>'topic::'],function(){
        Route::get('/','Topic@listTopic');
        Route::get('/add/{id}',['as'=>'add','uses'=>'Topic@add']);
        Route::post('/add/{id}',['as'=>'create','uses'=>'Topic@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Topic@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Topic@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Topic@delete']);
        Route::get('/intership_time/{time}/teacher/{teacher}',['as'=>'listtopic','uses'=>'Topic@listtopictime']);
        Route::get('/process/{id}',['as'=>'process','uses'=>'Topic@process']);
        Route::post('/process/{id}',['as'=>'updateprocess','uses'=>'Topic@updateprocess']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Topic@view']);
    });
    
    Route::group(['prefix'=>'job','as'=>'job::'],function(){
        Route::get('/list/{intertime_id?}','Job@listJob');
        Route::get('/add/{id?}',['as'=>'add','uses'=>'Job@add']);
        Route::post('/add/{id?}',['as'=>'create','uses'=>'Job@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Job@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Job@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Job@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Job@view']);
        Route::post('/import',['as'=>'import','uses'=>'Job@import']);
    });

    Route::group(['as'=>'chat::', 'prefix'=>'chat', 'middleware'=>['web']],function(){
        Route::post('/',['as'=>'send','uses'=>'Chat@send']);
        Route::get('/',['as'=>'get','uses'=>'Chat@get']);
        Route::post('/check',['as'=>'check','uses'=>'Chat@check']);
        Route::post('/viewed',['as'=>'viewed','uses'=>'Chat@viewed']);
    });

    Route::group(['prefix'=>'courses','as'=>'courses::'],function(){
        Route::get('/','Courses@listCourses');
        Route::get('/add',['as'=>'add','uses'=>'Courses@add']);
        Route::post('/add',['as'=>'create','uses'=>'Courses@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Courses@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Courses@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Courses@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Courses@view']);
    });
    
    Route::group(['prefix'=>'company','as'=>'company::'],function(){
        Route::get('/','Company@listCompany');
        Route::get('/add',['as'=>'add','uses'=>'Company@add']);
        Route::post('/add',['as'=>'create','uses'=>'Company@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Company@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Company@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Company@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Company@view']);
    });

    Route::group(['prefix'=>'department','as'=>'department::'],function(){
        Route::get('/','Department@listDepartment');
        Route::get('/add',['as'=>'add','uses'=>'Department@add']);
        Route::post('/add',['as'=>'create','uses'=>'Department@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Department@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Department@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Department@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Department@view']);
    });





    Route::group(['prefix'=>'council','as'=>'council::'],function(){
        Route::get('/list/{id?}','Council@listcouncil');
        
        Route::get('/add_council_detail/{council_id?}',['as'=>'addCouncilDetail','uses'=>'Council@add_council_detail']); 
        Route::post('/add_council_detail/{council_id?}',['as'=>'createCouncilDetail','uses'=>'Council@add_list_council_detail']);
        Route::get('/list_council_detail/{council_id?}',['as'=>'listCouncilDetail','uses'=>'Council@list_council_detail']);
        Route::get('/add_point/{council_id}',['as'=>'addStudentPoint','uses'=>'Council@add_student_point']);
        Route::post('/add_point/{council_id}',['as'=>'createStudentPoint','uses'=>'Council@create_student_point']);

        
        Route::get('/add/{id?}',['as'=>'add','uses'=>'Council@add']);
        Route::post('/add/{id?}',['as'=>'create','uses'=>'Council@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Council@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Council@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Council@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Council@view']);
        Route::post('/import',['as'=>'import','uses'=>'Council@import']);
    });

    Route::group(['prefix'=>'council_group','as'=>'council_group::'],function(){
        Route::get('/list/{intertime_id?}','Council_group@listcouncil_group');
        Route::get('/add/{intertime_id?}',['as'=>'add','uses'=>'Council_group@add']);
        Route::post('/add/{intertime_id?}',['as'=>'create','uses'=>'Council_group@create']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Council_group@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Council_group@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Council_group@delete']);
        Route::get('/view/{id}',['as'=>'view','uses'=>'Council_group@view']);
    });

    Route::group(['prefix'=>'modules', 'as'=>'modules:', 'middleware'=>['web']],function(){
        Route::get('/','Modules@list_modules');
        Route::get('/update',['as'=>'updates','uses'=>'Modules@update_modules']);
        Route::get('/edit/{id}',['as'=>'edit','uses'=>'Modules@edit']);
        Route::post('/edit/{id}',['as'=>'update','uses'=>'Modules@update']);
        Route::post('/delete/{id}',['as'=>'delete','uses'=>'Modules@del']);
    });
    
        
    Route::get('/new-style',function(){
       return view('changeslayouts.layouts.blank'); 
    });
    
    //end Tuoi
});

    

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/hello',['as'=>'alo',function(){
        return view('welcome');
    }]);
    
    Route::group(['prefix'=>'mmt','middleware' => ['web'],'as' => 'mmt::'], function () {
        Route::get('/home',['as' => 'homepage','uses'=>'SiteController@index']);
        Route::get('/contact',['as' => 'contactpage','uses'=>'SiteController@contact']);
        Route::post('/sendfeedback',['as' => 'sendfeedback','uses'=>'SiteController@feedback']);
        Route::get('/detail/{id}',['as' => 'detailpage','uses'=>'SiteController@detail']);
        Route::get('/allarticle',['as' => 'allarticle','uses'=>'SiteController@allarticle']);
        Route::get('/allnotes',['as' => 'allnotes','uses'=>'SiteController@allnotes']);
        Route::get('/detailnotes/{id}',['as' => 'detailnotes','uses'=>'SiteController@detailnotes']);
        Route::get('/allevent',['as' => 'allevent','uses'=>'SiteController@allevent']);
        Route::get('/detailevent/{id}',['as' => 'detailevent','uses'=>'SiteController@detailevent']);
    });
	
	Route::group(['prefix'=>'site','middleware' => ['web'],'as' => 'site::'], function () {
		//category
        Route::get('/addcategory',['as' => 'getaddcategory','uses'=>'AdminsiteController@getaddCategory']);
        Route::get('/listcategory',['as' => 'listcategory','uses'=>'AdminsiteController@listCategory']);
        Route::post('/addcategory',['as' => 'postaddcategory','uses'=>'AdminsiteController@postaddCategory']);
		Route::get('/editcategory/{id}',['as' => 'geteditcategory','uses'=>'AdminsiteController@geteditCategory']);
		Route::post('/editcategory/{id}',['as' => 'posteditcategory','uses'=>'AdminsiteController@posteditCategory']);
		Route::post('/category/delete',['as' => 'delcategory','uses'=>'AdminsiteController@delCategory']);
		
		//notes
        Route::get('/addnotes',['as' => 'getaddnotes','uses'=>'AdminsiteController@getaddNotes']);
        Route::get('/listnotes',['as' => 'listnotes','uses'=>'AdminsiteController@listNotes']);
        Route::post('/addnotes',['as' => 'postaddnotes','uses'=>'AdminsiteController@postaddNotes']);
		Route::get('/editnotes/{id}',['as' => 'geteditnotes','uses'=>'AdminsiteController@geteditNotes']);
		Route::post('/editnotes/{id}',['as' => 'posteditnotes','uses'=>'AdminsiteController@posteditNotes']);
		Route::post('/notes/delete',['as' => 'delnotes','uses'=>'AdminsiteController@delNotes']);
		
		//articel
		Route::get('/addarticle',['as' => 'getaddarticle','uses'=>'AdminsiteController@getaddArticle']);
        Route::get('/listarticle',['as' => 'listarticle','uses'=>'AdminsiteController@listArticle']);
        Route::post('/addarticle',['as' => 'postaddarticle','uses'=>'AdminsiteController@postaddArticle']);
		Route::get('/editarticle/{id}',['as' => 'geteditarticle','uses'=>'AdminsiteController@geteditArticle']);
		Route::post('/editarticle/{id}',['as' => 'posteditarticle','uses'=>'AdminsiteController@posteditArticle']);
		Route::post('/article/delete',['as' => 'delarticle','uses'=>'AdminsiteController@delArticle']);
		
		//Introduce
		Route::get('/editintroduce/{id}',['as' => 'geteditintroduce','uses'=>'AdminsiteController@geteditIntroduce']);
		Route::post('/editintroduce/{id}',['as' => 'posteditintroduce','uses'=>'AdminsiteController@posteditIntroduce']);
		//message
		Route::get('/inbox',['as' => 'inbox','uses'=>'AdminsiteController@getinbox']);
		Route::post('/getfeedback',['as' => 'getfeedback','uses'=>'AdminsiteController@getfeedback']);
		Route::post('/postfeedback',['as' => 'postfeedback','uses'=>'AdminsiteController@postfeedback']);
		
    });

});

//-- Module Management --//


//Route::any('{all?}','SiteController@index')->where('all','.*');


/*Huyen */

/*end Huyen*/