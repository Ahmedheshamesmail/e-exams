<?php

namespace App\Http\Controllers;

use App\datas;
use App\student;
use App\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\openexam;
class studennt extends Controller
{
    public function profile(){
        $y = session('profid');
    $row = DB::table('professors')
        ->where('id',$y)
        ->get();
    $rowl = DB::table('levels')
        ->get();
    $imr = DB::table('images')
        ->where('professor_id',$y)
        ->get();
    $rows = DB::table('subjects')
            ->where('professor_id',$y)
            ->get();
    $rowstu = DB::table('students')
            ->get();
    $rowd = DB::table('departments')
            ->get();
    $rowq = DB::table('questions')
            ->get();
    $rowopen = DB::table('openquestions')
            ->get();
     return view('profilep', compact('row','rowl','imr','rowq','rowd','rows','rowstu','rowopen'));
    }
    public function editrank(Request $req){
        //edit filter//
        $rowr = DB::table('results')
                ->where('student_id',$req->student)
                ->where('subject_id',$req->subject)
                ->get();
        foreach ($rowr as $r){
            $r2 =$r->result + $req->degree;
            DB::table('results')
                ->where('student_id',$req->student)
                ->where('subject_id',$req->subject)
                ->update(["result"=>$r2,"final"=>1]);
                $rowstudent  = DB::table('students')
                                ->where('id',$req->student)
                                ->get();

                        foreach($rowstudent as $rstu){
                            DB::table('studentranks')
                            ->where('natid',$rstu->Nationalid)
                            ->where('subject_id',$req->subject)
                            ->update(["updates"=>1,"studentrank"=>$r2]);
                        }
        DB::table('openquestions')
                ->where('student_id',$req->student)
                ->where('subject_id',$req->subject)
                ->where('question_id',$req->question)
                ->delete();
                    }

        return redirect()->back()->with('nulls','Marked Successfully !');
    }
    public function stuv( student $student,Request $request){


        $id = $request->nid;
        $password = $request->password;
        //edit filter//
        $beforeI = filter_var($id, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $afterI = filter_var($beforeI,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($afterI !== $id){
            return redirect()->back()->with('nulls','ID you entered is not Valid, please check it and try again !!');
        }
        $beforeP = filter_var($password, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $afterP = filter_var($beforeP,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($afterP !== $password){
            return redirect()->back()->with('nulls','Password you entered is not Valid, please check it and try again !!');
        }
        else{
                $student = DB::table('students')
                ->where('id',$id)
                ->get();
            if (count($student)<=0)
            {
                return redirect()->back()->with('nulls','your data is not matching, please check it and try again !!');
            }
            if (count($student)>0)
            {
                foreach ($student as $s){

                    if(password_verify($password,$s->password)) {
                        $nid = $s->Nationalid;
                        session_start();
                        session()->get('studentid');
                        session()->put('studentid', $nid);
                        session()->get('pCovered');
                        session()->put('pCovered', $password);

                        return redirect('Student');
                    }else{
                        return redirect()->back()->with('nulls', 'Password you entered is Wrong');
                    }
                }
            }
        }
    }
    public function stuv2( student $r,Request $request){
        $nid =47 . $request->nat;
        //edit filter//
        $beforeI = filter_var($nid, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $afterI = filter_var($beforeI,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($afterI !== $nid){
            return redirect()->back()->with('nulls','National ID you entered is not Valid, please check it and try again !!');
        }
        else{

                $student = DB::table('students')
                ->where('Nationalid',$nid)
                ->get();
            if (count($student)<=0)
            {
                return redirect()->back()->with('nulls','Please check your National ID again !!');
            }
            if (count($student)>0)
            {
                foreach ($student as $ss){
                    if(password_verify(0,$ss->password)) {
                        session_start();
                        session()->get('studentid');
                        session()->put('studentid',$nid);
                        return redirect('setpassword');
                    }else{
                    session_start();
                    session()->get('studentid');
                    session()->put('studentid',$nid);
                    return redirect('Student');
                    }
                }
            }
        }
    }
    public function sview(){
        $value = session()->get('studentid');
        if($value){

        $s = session('studentid');

        $timesubRank = 0;
        $finalRank = 0;
        $numRank2 = 0;
            $finalRate=0;
        $finalRating = 0;


            $subjectcalc = DB::table('studentranks')
                ->where('natid',$s)
                ->where('updates',1)
                ->get();
            foreach ( $subjectcalc as $CalcRank){
                $finalRank = $finalRank + ( $CalcRank->studentrank * 10);
                $finalRating = $finalRating +( $CalcRank->final * 10);
            }
        $rowstu = DB::table('students')
            ->where('Nationalid',$s)
            ->get();
        foreach($rowstu as $stu){
                $rows2 = DB::table('subjects')
                    ->where('department_id',$stu->department_id)
                    ->get();
        }
        $rowr = DB::table('results')
                ->where('final',1)
            ->get();
        $rowstu = DB::table('students')
            ->where('Nationalid',$s)
            ->get();
        $rows = DB::table('subjects')
            ->get();

        date_default_timezone_set('Africa/Cairo');
        $currentdate = date('Y-m-d',time());
        $currenttime = date('G:i:s',time());
            $rows2row = DB::table('subjects')
                        ->get();
            foreach($rows2row as $sub2){
                $examrow = DB::table('examtimes')
                    ->where('subject_id',$sub2->id)
                    ->get();
                if(count($examrow)>0){
                    foreach($examrow as $e){
                        if($e->date == $currentdate){
                            if($e->times <= $currenttime){
                                $interval = strtotime($e->times);
                                $interval2 = ($interval +( $e->time * 60 * 60 )+($e->min * 60 ));
                                $interval3 = strtotime($currenttime);
                                if($interval2 > $interval3){
                                        //new//

                                        $opened = DB::table('openexams')
                                            ->where('subject_id',$sub2->id)
                                            ->get();


                                        if(count($opened)<1){

                                            //open exam//
                                            $rowd = DB::table('departments')
                                                    ->where('id',$sub2->department_id)
                                                    ->get();
                                            foreach ($rowd as $dd){
                                                            $did =$dd->id;
                                                            $d = $dd->level_id;
                                                            $time = $e->time;
                                                            $t = new openexam();
                                                            $t->subject_id = $sub2->id;
                                                            $t->department_id = $did;
                                                            $t->level_id = $d;
                                                            $t->work = 1;
                                                            $t->time = $time;
                                                            $t->save();
                                                            return redirect('Student')->with('nulls',$sub2->name .' '.'Exam Started');
                                                }
                                            //------------del-------------//

                                            //add exam from professor's structures//
                                            $openstruc = DB::table('examstructures')
                                                ->where('subject_id',$sub2->id)
                                                ->get();
                                            foreach ($openstruc as $rr){
                                                $rowq2 = DB::table('questions')
                                                    ->where('chapter_id',$rr->chapter_id)
                                                    ->where('difficult_id',$rr->difficult_id)
                                                    ->limit($rr->numofq)
                                                    ->get();
                                                foreach ($rowq2 as $q2){
                                                    $da = DB::table('datas')
                                                        ->where('question_id', $q2->id)
                                                        ->get();
                                                        //if question in structure not set then set it//
                                                        if(count($da)<1){
                                                            $t = new datas();
                                                            $t->question_id = $q2->id;
                                                            $t->subject_id = $sub2->id;
                                                            $t->save();
                                                        }
                                                }
                                            }

                                            //---------------------------//
                                        }
                                        //if subject opened//
                                        if(count($opened)>0){

                                        foreach($opened as $openItem){
                                            //if exam still working//
                                            if($openItem->work == 1){

                                                $studentOexam = DB::table('students')
                                                                    ->where('Nationalid',$s)
                                                                    ->get();
                                                    foreach($studentOexam as $sOpen){
                                                        $stuRuning = DB::table('openexamstudents')
                                                                    ->where('student_id',$sOpen->id)
                                                                    ->where('subject_id',$sub2->id)
                                                                    ->get();
                                                        foreach($stuRuning as $srun){
                                                            if($srun->work == 1){
                                                                    //add exam from professor's structures//
                                                                    $openstruc = DB::table('examstructures')
                                                                    ->where('subject_id',$sub2->id)
                                                                    ->get();
                                                                    foreach ($openstruc as $rr){
                                                                        $rowq2 = DB::table('questions')
                                                                            ->where('chapter_id',$rr->chapter_id)
                                                                            ->where('difficult_id',$rr->difficult_id)
                                                                            ->limit($rr->numofq)
                                                                            ->get();
                                                                        foreach ($rowq2 as $q2){
                                                                            $da = DB::table('datas')
                                                                                ->where('question_id', $q2->id)
                                                                                ->get();
                                                                                //if question in structure not set then set it//
                                                                                if(count($da)<1){
                                                                                    $t = new datas();
                                                                                    $t->question_id = $q2->id;
                                                                                    $t->subject_id = $sub2->id;
                                                                                    $t->save();
                                                                                }
                                                                        }
                                                                    }

                                                                //---------------------------//

                                                            }
                                                            if($srun->work == 0){
                                                                DB::table('openexamstudents')
                                                                    ->where('student_id',$sOpen->id)
                                                                    ->where('subject_id',$sub2->id)
                                                                    ->update(["work"=>1]);
                                                                //add exam from professor's structures//
                                                                $openstruc = DB::table('examstructures')
                                                                    ->where('subject_id',$sub2->id)
                                                                    ->get();
                                                                foreach ($openstruc as $rr){
                                                                    $rowq2 = DB::table('questions')
                                                                        ->where('chapter_id',$rr->chapter_id)
                                                                        ->where('difficult_id',$rr->difficult_id)
                                                                        ->limit($rr->numofq)
                                                                        ->get();
                                                                    foreach ($rowq2 as $q2){
                                                                        $da = DB::table('datas')
                                                                            ->where('question_id', $q2->id)
                                                                            ->get();
                                                                        //if question in structure not set then set it//
                                                                        if(count($da)<1){
                                                                            $t = new datas();
                                                                            $t->question_id = $q2->id;
                                                                            $t->subject_id = $sub2->id;
                                                                            $t->save();
                                                                        }
                                                                    }
                                                                }

                                                                //---------------------------//

                                                            }

                                                        }
                                                    }
                                                    //add exam from professor's structures//
                                                    $openstruc = DB::table('examstructures')
                                                    ->where('subject_id',$sub2->id)
                                                    ->get();
                                                    foreach ($openstruc as $rr){
                                                        $rowq2 = DB::table('questions')
                                                            ->where('chapter_id',$rr->chapter_id)
                                                            ->where('difficult_id',$rr->difficult_id)
                                                            ->limit($rr->numofq)
                                                            ->get();
                                                        foreach ($rowq2 as $q2){
                                                            $da = DB::table('datas')
                                                                ->where('question_id', $q2->id)
                                                                ->get();
                                                                //if question in structure not set then set it//
                                                                if(count($da)<1){
                                                                    $t = new datas();
                                                                    $t->question_id = $q2->id;
                                                                    $t->subject_id = $sub2->id;
                                                                    $t->save();
                                                                }
                                                        }
                                                    }

                                                //---------------------------//

                                            }
                                            //if exam ended
                                            if($openItem->work == 0){

                                                    //add exam from professor's structures//
                                                    $openstruc = DB::table('examstructures')
                                                    ->where('subject_id',$sub2->id)
                                                    ->get();
                                                    foreach ($openstruc as $rr){
                                                        $rowq2 = DB::table('questions')
                                                            ->where('chapter_id',$rr->chapter_id)
                                                            ->where('difficult_id',$rr->difficult_id)
                                                            ->limit($rr->numofq)
                                                            ->get();
                                                        foreach ($rowq2 as $q2){
                                                            $da = DB::table('datas')
                                                                ->where('question_id', $q2->id)
                                                                ->get();
                                                                //if question in structure not set then set it//
                                                                if(count($da)<1){
                                                                    $t = new datas();
                                                                    $t->question_id = $q2->id;
                                                                    $t->subject_id = $sub2->id;
                                                                    $t->save();
                                                                }
                                                            DB::table('openexams')
                                                                ->where('subject_id',$sub2->id)
                                                                ->update(["work"=>1]);

                                                            DB::table('openexamstudents')
                                                                ->where('subject_id',$sub2->id)
                                                                ->update(["work"=>1]);
                                                        }
                                                    }


                                            }
                                        }
                                    }
                                        ///-------------//
                                        //-------------------//
                                }
                                else{
                                    DB::table('openexams')
                                        ->where('subject_id',$sub2->id)
                                        ->update(["work"=>0]);
                                    DB::table('openexamstudents')
                                        ->where('subject_id',$sub2->id)
                                        ->update(["work"=>0]);
                                }
                            }
                            else{
                                DB::table('openexams')
                                    ->where('subject_id',$sub2->id)
                                    ->update(["work"=>0]);
                                DB::table('openexamstudents')
                                    ->where('subject_id',$sub2->id)
                                    ->update(["work"=>0]);
                            }
                        }
                        else{
                            DB::table('openexams')
                                ->where('subject_id',$sub2->id)
                                ->update(["work"=>0]);
                            DB::table('openexamstudents')
                                ->where('subject_id',$sub2->id)
                                ->update(["work"=>0]);
                        }
                    }
                }
            }

        $rowl = DB::table('levels')
            ->get();
        $rowd = DB::table('departments')
            ->get();
        $rowopen = DB::table('openexams')
            ->where('work',1)
            ->get();
        $rowc = DB::table('chapters')
            ->get();

     return view('studentinfo',compact('rowstu','rowl','rowd','rows','rowopen','rowr','rowc','rows2','finalRank','finalRating'));

        }else{
            return redirect()->back();
        }
        }
    public function openexam(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rows = DB::table('subjects')
            ->get();
        $rowd = DB::table('departments')
            ->get();
        $rowp = DB::table('professors')
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $rowo = DB::table('openexams')
            ->get();
        return view('openingexam',compact('row','imr','y','rows','rowd','rowp','rowl','rowo'));
        }
    public function substart(subject $s){
        //check if the exam if open//
        $r = DB::table('openexams')
            ->where('subject_id',$s->id)
            ->where('work',1)
            ->get();
        $r2 = DB::table('openexams')
            ->where('subject_id',$s->id)
            ->where('work',0)
            ->get();
        if (count($r)>0){
            return redirect()->back()->with('nulls',$s->name .' Exam is Already running !!');
        }
        elseif (count($r2)>0){
            //if not open it//
             DB::table('openexams')
                ->where('subject_id',$s->id)
                ->update(["work"=>1]);

                //take the structure and insert it to datas//
            $rowstruc = DB::table('examstructures')
                ->where('subject_id',$s->id)
                ->get();
            foreach ($rowstruc as $rr){
                $rowq2 = DB::table('questions')
                    ->where('chapter_id',$rr->chapter_id)
                    ->where('difficult_id',$rr->difficult_id)
                    ->limit($rr->numofq)
                    ->get();
                foreach ($rowq2 as $q2){
                    $da = DB::table('datas')
                        ->where('question_id', $q2->id)
                        ->get();
                    $t = new datas();
                    $t->question_id = $q2->id;
                    $t->subject_id = $s->id;
                    $t->save();
                }
            }
            return redirect()->back()->with('nulls',$s->name .' '.'Exam Started');
        }
        //if exam is opened//
        else{
            $rowd = DB::table('departments')
                ->where('id',$s->department_id)
                ->get();
            $rowstruc = DB::table('examstructures')
                ->where('subject_id',$s->id)
                ->get();
            foreach ($rowstruc as $rr){
                $rowq2 = DB::table('questions')
                    ->where('chapter_id',$rr->chapter_id)
                    ->where('difficult_id',$rr->difficult_id)
                    ->limit($rr->numofq)
                    ->get();
                foreach ($rowq2 as $q2){
                    $da = DB::table('datas')
                        ->where('question_id', $q2->id)
                        ->get();
                        //if question in structure not set then set it//
                        if(count($da)<1){
                            $t = new datas();
                            $t->question_id = $q2->id;
                            $t->subject_id = $s->id;
                            $t->save();
                        }
                }
            }
            foreach ($rowd as $dd){

                $did =$dd->id;
                $d = $dd->level_id;
                $rowl = DB::table('levels')
                    ->where('id',$d)
                    ->get();
                foreach ($rowl as $ll){
                    $rowt = DB::table('examtimes')
                        ->where('subject_id',$s->id)
                        ->get();
                        //if subject time sets then the subject will be inserted to open exams//
                    if (count($rowt)>0){
                        foreach ($rowt as $tt){
                            $time = $tt->time;
                            $lid  =$ll->id;
                            $t = new openexam();
                            $t->subject_id = $s->id;
                            $t->department_id = $did;
                            $t->level_id = $lid;
                            $t->work = 1;
                            $t->time = $time;
                            $t->save();
                            return redirect()->back()->with('nulls',$s->name .' '.'Exam Started');

                        }
                    }

                    else{
                        return redirect()->back()->with('nulls','Time of Exam Not Found !!');
                    }
                }
            }
        }
    }
    public function substop(subject $s){
        $r = DB::table('openexams')
            ->where('subject_id',$s->id)
            ->where('work',1)
            ->get();
        if (count($r)>0){
            DB::table('openexams')
                ->where('subject_id',$s->id)
                ->update(["work"=>0]);
            DB::table('datas')
               ->where('subject_id',$s->id)
               ->delete();
            return redirect()->back()->with('nulls',$s->name .' '.'Exam Stoped');
        }
        else return redirect()->back()->with('nulls','Sorry,'.$s->name .' '.'Exam did not started yet !!');
    }
    public function substart2(subject $s){
        $sb = $s->id;
        session_start();
        session()->get('subjectid');
        session()->put('subjectid',$sb);
        return redirect('Exam');
    }
}
