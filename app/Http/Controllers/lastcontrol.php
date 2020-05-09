<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\studentrqusts;
use App\student;
use App\examtime;
class lastcontrol extends Controller
{
    public function deltime(examtime $r){
        DB::table('examtimes')
            ->where('subject_id',$r->id)
            ->delete();
            return redirect()->back()->with('nulls','Time Deleted');
    }
    public function signup(){
        $rowl = DB::table('levels')
                ->get();
        $rowd = DB::table('departments')
                ->get();
        return view('signup',  compact('rowd','rowl'));
    }
    public function signdata(Request $r){
        $this->validate($r,
                [
                    'name'=>'required',
                   // 'phone'=>'required||unique:rqusts||unique:professors||min:11||max:11',
                   // 'password'=>'string||required||min:8'

                    'Nationalid'=>'required||unique:studentrqusts||unique:students',
                    'level'=>'required',
                    'depart'=>'required'
                ]
                );
                //edit filter //
        $name1 = $r->name;
        $before1 = filter_var($name1, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after1 = filter_var($before1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name2 = filter_var($after1,FILTER_SANITIZE_STRING);
        $nat1 = $r->Nationalid;
        $before2 = filter_var($nat1, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after2 = filter_var($before2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nat2 = filter_var($after2,  FILTER_SANITIZE_NUMBER_INT);



        if ($nat1 !== $nat2) {
            return redirect()->back()->with('nulls', 'Please Dont enter Characters Like <>/?!  in Fields, You can only enter letters & numbers !!');
        }
        if ($name1 !== $name2) {
            return redirect()->back()->with('nulls', 'Please Dont enter Characters Like <>/?!  in Fields, You can only enter letters & numbers !!');
        }
        $nID = 47 . $r->Nationalid;
        $rowCustom =DB::table('students')
            ->where('Nationalid',$nID)
            ->get();
        if( $r->level == 0){
            return redirect()->back()->with('nulls','Select your Level');
        }
        if($r->depart == 0){
            return redirect()->back()->with('nulls', 'Select your Department');
        }
        if(count($rowCustom)>0){
            return redirect()->back()->with('nulls','This National ID is own for another Student ');
        }

        $rowCustomRequest =DB::table('studentrqusts')
            ->where('Nationalid',$nID)
            ->get();
        if(count($rowCustomRequest)>0){
            return redirect()->back()->with('nulls','This National ID is own for another Student ');
        }
        else {
            $t = new studentrqusts();
            $t->name = $r->name;
            $t->Nationalid = $nID;
            $t->level_id = $r->level;
            $t->department_id = $r->depart;
            $t->save();
            return redirect()->back()->with('nulls', 'Admin will review your Request Soon ...');
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
        return redirect()->back()->with('nulls', 'Accepted');
    }
    public function remstu(studentrqusts $r){
        DB::table('studentrqusts')
                ->where('id',$r->id)
                ->delete();
        return redirect()->back()->with('nulls', 'Removed');
    }
    public function updatepassstu(){
        $student = session('studentid');
        return view('updatepassword', compact('student'))->with('nulls','Please Set your Pasword before accessing your Account');
    }
    public function upmstu(Request  $r)
    {
//edit filter//
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
        return redirect('Student')->with('nulls', 'Welcome');
        }
        else{
            return redirect()->back()->with('nulls','Please enter just letter & numbers');
        }
    }
}
