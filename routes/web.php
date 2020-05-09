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

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
Route::get('/', function () {
    return redirect('Home');
});
Route::get('Home','control@home');
Route::get('Professor','control@p');

Route::get('Login','control@ad');
Route::get('Student','control@stu');
Route::get('err','control@err');

Route::post('sela','control@selecta');

Route::get('Check','control@acc');
Route::post('insertprof','control@insrtp')->middleware('sign');
Route::get('subject','control@insrtsub');
Route::get('level','control@insrtle');
Route::get('department','control@insrtde');
Route::post('lev','control@insertlevel');
Route::post('dep','control@insertde');
Route::post('sub','control@insertsub');
Route::get('Subjects','control@subject');
Route::get('Departments','control@dep');
Route::get('{rowd}/updatedepartment','control@upde');
Route::post('{row}/updated','control@updatede');
Route::get('{row}/updatesubject','control@upsub');
Route::get('{rows}/deletesubject','control@delsub');
Route::get('{rowd}/deletedepartment','control@deldep');
Route::post('{ssid}/updates','control@updatesub');
Route::get('create','control@create');
Route::post('store','control@store');

Route::get('/posts/{posts}', function ($post){
 $posts = [
   'my-first'=>'Hello its my first',
    'my-next'=>'Hello its my next',
 ];
    if(!array_key_exists($post, $posts)){
        abort(404, 'Sorry, that post was not found!!');
    }

    return view('post',[
        'post' =>$posts[$post]
    ]);
});

Route::get('Requests','control@requests');
Route::get('{row}/removerequest','control@delreq');
Route::get('view','control@pro');
Route::post('Accept','control@acceptreq');
Route::get('{row}/remove','control@delpro');

Route::post('Login-P','control@loginp')->middleware('log');


Route::get('Profile','studennt@profile');

Route::get('A-Page',function (){
    $y = session('profid');
    $row = DB::table('professors')
        ->where('id',$y)
        ->get();
    $imr = DB::table('images')
        ->where('professor_id',$y)
        ->get();
    $rowd = DB::table('departments')
            ->get();
    $rowl = DB::table('levels')
            ->get();
    $rowrqs = DB::table('studentrqusts')
            ->get();
    return view('adminpage', compact('row','imr','rowrqs','rowl','rowd'));
});

Route::get('LogOut',function (){
    session()->forget('profid');
    Session::flush();
    return redirect('Home');
});


Route::get('Levels','control@leve');


Route::get('{row2}/deletel','control@delleve');
Route::get('{did}/My-Subjects','profcontrol@subject');
Route::get('{lid}/Department-Select','profcontrol@depart');
Route::get('{sid}/deletemysub','profcontrol@delsub');
Route::get('{url}/Update-Subject','profcontrol@getsubject');
Route::get('New-Chapter','profcontrol@getch');
Route::post('{row}/ins-ch','profcontrol@insch');
Route::get('{chid}/Delete-Ch','profcontrol@delch');
Route::get('eee','profcontrol@eee');
Route::get('{pid}/makea','profcontrol@makea');
Route::get('{pid}/deleteprof','profcontrol@deleteprof');

Route::get('{rowc}/Questions','exam@quest');
Route::get('Insert-Questions-MCQ','exam@insquest');
Route::get('Insert-Questions-TF','exam@insquesttf');
Route::get('Insert-Questions-Open','exam@insquestopen');
Route::post('{row}/updatechap','profcontrol@upchna');
Route::post('insert-open','exam@insrtquopen');
Route::get('{question}/deletequest','exam@delquest');
Route::post('insert-tf','exam@insrtqutf');
Route::post('insert-mcq','exam@insrtqumcq');
Route::post('{rowc}/uptext','exam@upqu');
Route::post('{rowc}/update-answer','exam@upans');
Route::get('Update-Image','control@upimg');
Route::post('Updated-Image','control@updateimg');

Route::get('{level}/ExamStructure','exam@examst');
Route::get('{subject}/Make-Structure','exam@mkexam');
Route::post('{subject}/setstructure','exam@insertmkexam');
Route::get('Exam','studentController@index');
Route::get('r',function (){
    return view('r');
});
Route::get('Add-student',function (){
    $x = session('profid');
    $row = DB::table('professors')
        ->where('id',$x)
        ->get();
    $imr = DB::table('images')
        ->where('professor_id',$x)
        ->get();
    $rowl =DB::table('levels')
        ->get();
    $rowd = DB::table('departments')
                ->get();

        $rows = DB::table('students')
                ->get();
    return view('insrtstudent',compact('row','imr','rowl','rowd','rows'));
});
Route::get('ajax1','studentController@fetch');
Route::post('storestudent','studentController@store');
Route::post('stuv','studennt@stuv');
Route::post('stuv2','studennt@stuv2');

Route::get('Student','studennt@sview');

Route::get('{level}/Subject-Time','exam@timesets');
Route::post('{level}/sTime','exam@sett');
Route::post('sTime2','exam@sett2');


Route::post('sub2','control@insertsub2');
Route::get('Waiting', function (){
   return view('floating');
});
Route::get('Choose','studennt@openexam');
Route::get('{s}/subid','studennt@substart');
Route::get('{s}/subid2','studennt@substop');
Route::get('{s}/subid3','studennt@substart2');
Route::post('sa','studentController@saveans');
Route::get('Results','profcontrol@rs');
Route::post('{r}/imageadd','attache@addimg');
Route::post('{r}/audioadd','attache@addaud');
Route::post('{r}/videoadd','attache@addvid');
Route::post('NewRank','studennt@editrank');
Route::get('Number','training@addnumber');
Route::post('addnumq','training@addnum');
Route::get('{r}/deletestr','exam@deletestructure');
Route::get('Train-Exam','training@trainshow');
Route::post('starttrain','training@trainstart');
Route::post('endtrain','training@trainans');
Route::get('{r}/Choose-Subject','training@sellevel');
Route::get('{r}/Choosed','training@seldeparts');
Route::get('{r}/Choosed-Subject','training@vans');
Route::get('{r}/calcu','training@calcu');
Route::get('{r}/calcuw','training@calcuw');


Route::get('{r}/calcuans','training@calcuans');
Route::get('Student-SignUp','lastcontrol@signup');
Route::post('signdata','lastcontrol@signdata');
Route::get('{r}/acceptstudent','lastcontrol@accstu');
Route::get('{r}/removestudent','lastcontrol@remstu');
Route::get('setpassword','lastcontrol@updatepassstu');
Route::post('updatemypass','lastcontrol@upmstu');
Route::get('Endinig','training@endtr');
Route::get('{r}/Deleting','exam@delstudent');
Route::get('Homea',function(){
    return view('as.homearabic');
});

//---------------------------------------//


Route::get('Professora','control2@p');

Route::get('Logina','control2@ad');
Route::get('Studenta','control2@stu');
Route::get('erra','control2@err');

Route::post('selaa','control2@selecta');

Route::get('Checka','control2@acc');
Route::post('insertprofa','control2@insrtp')->middleware('sign');
Route::get('subjecta','control2@insrtsub');
Route::get('levela','control2@insrtle');
Route::get('departmenta','control2@insrtde');
Route::post('leva','control2@insertlevel');
Route::post('depa','control2@insertde');
Route::post('suba','control2@insertsub');
Route::get('Subjectsa','control2@subject');
Route::get('Departmentsa','control2@dep');
Route::get('{rowd}/updatedepartmenta','control2@upde');
Route::post('{row}/updateda','control2@updatede');
Route::get('{row}/updatesubjecta','control2@upsub');





Route::get('{rows}/deletesubjecta','control2@delsub');
Route::get('{rowd}/deletedepartmenta','control2@deldep');
Route::post('{ssid}/updatesa','control2@updatesub');
Route::get('createa','control2@create');
Route::post('storea','control2@store');

Route::get('/posts/{posts}', function ($post){
 $posts = [
   'my-first'=>'Hello its my first',
    'my-next'=>'Hello its my next',
 ];
    if(!array_key_exists($post, $posts)){
        abort(404, 'Sorry, that post was not found!!');
    }

    return view('post',[
        'post' =>$posts[$post]
    ]);
});

Route::get('Requestsa','control2@requests');
Route::get('{row}/removerequesta','control2@delreq');
Route::get('viewa','control2@pro');
Route::post('Accepta','control2@acceptreq');
Route::get('{row}/removea','control2@delpro');

Route::post('Login-Pa','control2@loginp')->middleware('log');


Route::get('Profilea','studennt2@profile');

Route::get('A-Pagea',function (){
    $y = session('profid');
    $row = DB::table('professors')
        ->where('id',$y)
        ->get();
    $imr = DB::table('images')
        ->where('professor_id',$y)
        ->get();
    $rowd = DB::table('departments')
            ->get();
    $rowl = DB::table('levels')
            ->get();
    $rowrqs = DB::table('studentrqusts')
            ->get();
    return view('as.adminpage', compact('row','imr','rowrqs','rowl','rowd'));
});

Route::get('LogOuta',function (){
    session()->forget('profid');
    Session::flush();
    return redirect('Homea');
});


Route::get('Levelsa','control2@leve');


Route::get('{row2}/deletela','control2@delleve');
Route::get('{did}/My-Subjectsa','profcontrol2@subject');
Route::get('{lid}/Department-Selecta','profcontrol2@depart');
Route::get('{sid}/deletemysuba','profcontrol2@delsub');
Route::get('{url}/Update-Subjecta','profcontrol2@getsubject');
Route::get('New-Chaptera','profcontrol2@getch');
Route::post('{row}/ins-cha','profcontrol2@insch');
Route::get('{chid}/Delete-Cha','profcontrol2@delch');
Route::get('eeea','profcontrol2@eee');
Route::get('{pid}/makeaa','profcontrol2@makea');
Route::get('{pid}/deleteprofa','profcontrol2@deleteprof');

Route::get('{rowc}/Questionsa','exam2@quest');
Route::get('Insert-Questions-MCQa','exam2@insquest');
Route::get('Insert-Questions-TFa','exam2@insquesttf');
Route::get('Insert-Questions-Opena','exam2@insquestopen');
Route::post('{row}/updatechapa','profcontrol2@upchna');
Route::post('insert-opena','exam2@insrtquopen');
Route::get('{question}/deletequesta','exam2@delquest');
Route::post('insert-tfa','exam2@insrtqutf');
Route::post('insert-mcqa','exam2@insrtqumcq');
Route::post('{rowc}/uptexta','exam2@upqu');
Route::post('{rowc}/update-answera','exam@upans');
Route::get('Update-Imagea','control2@upimg');
Route::post('Updated-Imagea','control2@updateimg');








Route::get('{level}/ExamStructurea','exam2@examst');
Route::get('{subject}/Make-Structurea','exam2@mkexam');
Route::post('{subject}/setstructurea','exam2@insertmkexam');
Route::get('Exama','studentController2@index');
Route::get('ra',function (){
    return view('as.r');
});
Route::get('Add-studenta',function (){
    $x = session('profid');
    $row = DB::table('professors')
        ->where('id',$x)
        ->get();
    $imr = DB::table('images')
        ->where('professor_id',$x)
        ->get();
    $rowl =DB::table('levels')
        ->get();
    $rowd = DB::table('departments')
                ->get();

        $rows = DB::table('students')
                ->get();
    return view('as.insrtstudent',compact('row','imr','rowl','rowd','rows'));
});


Route::get('ajax1a','studentController2@fetch');
Route::post('storestudenta','studentController2@store');
Route::post('stuva','studennt2@stuv');
Route::post('stuv2a','studennt2@stuv2');

Route::get('Studenta','studennt2@sview');

Route::get('{level}/Subject-Timea','exam2@timesets');
Route::post('{level}/sTimea','exam2@sett');
Route::post('sTime2a','exam2@sett2');


Route::post('sub2a','control2@insertsub2');
Route::get('Waitinga', function (){
   return view('as.floating');
});
Route::get('Choosea','studennt2@openexam');
Route::get('{s}/subida','studennt2@substart');
Route::get('{s}/subid2a','studennt2@substop');
Route::get('{s}/subid3a','studennt2@substart2');
Route::post('saa','studentController2@saveans');
Route::get('Resultsa','profcontrol2@rs');
Route::post('{r}/imageadda','attache2@addimg');
Route::post('{r}/audioadda','attache2@addaud');
Route::post('{r}/videoadda','attache2@addvid');
Route::post('NewRanka','studennt2@editrank');
Route::get('Numbera','training2@addnumber');
Route::post('addnumqa','training2@addnum');
Route::get('{r}/deletestra','exam2@deletestructure');
Route::get('Train-Exama','training2@trainshow');
Route::post('starttraina','training2@trainstart');
Route::post('endtraina','training2@trainans');
Route::get('{r}/Choose-Subjecta','training2@sellevel');
Route::get('{r}/Chooseda','training2@seldeparts');
Route::get('{r}/Choosed-Subjecta','training2@vans');
Route::get('{r}/calcua','training2@calcu');
Route::get('{r}/calcuwa','training2@calcuw');


Route::get('{r}/calcuansa','training2@calcuans');
Route::get('Student-SignUpa','lastcontrol2@signup');
Route::post('signdataa','lastcontrol2@signdata');
Route::get('{r}/acceptstudenta','lastcontrol2@accstu');
Route::get('{r}/removestudenta','lastcontrol2@remstu');
Route::get('setpassworda','lastcontrol2@updatepassstu');
Route::post('updatemypassa','lastcontrol2@upmstu');
Route::get('Endiniga','training2@endtr');
Route::get('{r}/Deletinga','exam2@delstudent');
Route::get('Homea',function(){
    return view('as.homearabic');
});

Route::get('{r}/delte','lastcontrol@deltime');
Route::get('{r}/deltea','lastcontrol2@deltime');



