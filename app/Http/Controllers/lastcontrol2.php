<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\studentrqusts;
use App\student;
use App\examtime;

class lastcontrol2 extends Controller
{
    public function deltime(examtime $r){
        DB::table('examtimes')
            ->where('subject_id',$r->id)
            ->delete();
            return redirect()->back()->with('nulls','تم الحذف');
    }
    public function signup(){
        $rowl = DB::table('levels')
                ->get();
        $rowd = DB::table('departments')
                ->get();
        return view('as.signup',  compact('rowd','rowl'));
    }
    public function signdata(Request $r){
        $this->validate($r,
                [
                    'name'=>'required',
                   // 'phone'=>'required||unique:rqusts||unique:professors||min:11||max:11',
                   // 'password'=>'string||required||min:8'

                    'Nationalid'=>'required||unique:studentrqusts||unique:students',

                ]
                );
                $name1 = $r->name;
                $before1 = filter_var($name1, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
                $after1 = filter_var($before1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $name2 = filter_var($after1,FILTER_SANITIZE_STRING);
                $nat1 = $r->Nationalid;
                $before2 = filter_var($nat1, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
                $after2 = filter_var($before2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $nat2 = filter_var($after2,  FILTER_SANITIZE_NUMBER_INT);

        if ($nat1 !== $nat2) {
            return redirect()->back()->with('nulls', 'برجاء عدم كتابة رموز غريبه ,يمكن فقط كتابة حروف وارقام !!');
        }
        if ($name1 !== $name2) {
            return redirect()->back()->with('nulls', 'برجاء عدم كتابة رموز غريبه ,يمكن فقط كتابة حروف وارقام !!');
        }
        if( $r->level == 0){
            return redirect()->back()->with('nulls', 'يرجي تحديد الصف الذي ينتمي اليه الطالب');
        }
        if($r->depart == 0){
            return redirect()->back()->with('nulls', 'يرجي تحديد الصف الذي ينتمي اليه الطالب');
        }
        $nID = 47 . $r->Nationalid;
        $rowCustom =DB::table('students')
            ->where('Nationalid',$nID)
            ->get();
        if(count($rowCustom)>0){
            return redirect()->back()->with('nulls','هذا الرقم القومي مستجل بالرقم لطالب اخر');
        }

        $rowCustomRequest =DB::table('studentrqusts')
            ->where('Nationalid',$nID)
            ->get();
        if(count($rowCustomRequest)>0){
            return redirect()->back()->with('nulls','هذا الرقم القومي مستجل بالرقم لطالب اخر');
        }
        else{
            $t = new studentrqusts();
            $t->name = $r->name;
            $t->Nationalid =$nID ;
            $t->level_id = $r->level;
            $t->department_id = $r->depart;
            $t->save();
            return redirect()->back()->with('nulls','سيتم مراجعة طلبك قريبا ...');
        }
    }
    public function accstu(studentrqusts $r){
        $t = new student();
        $t->name = $r->name;
        $t->Nationalid = $r->Nationalid;
        $t->level_id = $r->level_id;
        $t->department_id = $r->department_id;
        $t->password =password_hash(0,PASSWORD_ARGON2I);
        $t->save();
        DB::table('studentrqusts')
                ->where('id',$r->id)
                ->delete();
        return redirect()->back()->with('nulls', 'تم القبول');
    }
    public function remstu(studentrqusts $r){
        DB::table('studentrqusts')
                ->where('id',$r->id)
                ->delete();
        return redirect()->back()->with('nulls', 'تم الرفض');
    }
    public function updatepassstu(){
        $student = session('studentid');
        return view('as.updatepassword', compact('student'))->with('nulls','برجاء ادخال كلمة المرور قبل الدخول للحساب');
    }
    public function upmstu(Request  $r){
    $nID = 47 . $r->student;
        $before1 = filter_var($r->password, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after1 = filter_var($before1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after1 === $r->password){
                DB::table('students')
                ->where('Nationalid',$nID)
                ->update(["password"=>password_hash($r->password,PASSWORD_ARGON2I)]);
                session()->start();
                session()->put('passwordCovered',$r->password);
                session()->save();
                return redirect('Studenta')->with('nulls', 'اهلا بك');
            }
        else{
            return redirect()->back()->with('nulls', 'برجاء عدم كتابة رموز غريبه ,يمكن فقط كتابة حروف وارقام !!');
        }

    }
}
