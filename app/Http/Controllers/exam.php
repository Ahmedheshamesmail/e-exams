<?php

namespace App\Http\Controllers;

use App\answer;
use App\datas;
use Illuminate\Http\Request;
use App\examstructure;
use Illuminate\Support\Facades\DB;
use App\professor;
use App\rqust;
use App\subject;
use App\level;
use App\department;
use App\question;
use App\chapter;
use App\examtime;
use App\student;
class exam extends Controller
{
    public function quest(chapter $rowc){
        $c = $rowc->id;
        session()->start();
        session()->put('chapid',$c);
        session()->save();
        $cid = session('chapid');
        $x = session('profid');
        $row = DB::table('professors')
            ->where('id',$x)
            ->get();
        $rowq = DB::table('questions')
            ->where('chapter_id',$cid)
            ->get();
        $dd = DB::table('difficults')
            ->get();
        $rowans = DB::table('answers')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$x)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        return view('questions',compact('cid','row','rowq','dd','rowans','imr','rowl'));
    }
    public function insquest(){
        $x = session('profid');
        $row = DB::table('professors')
            ->where('id',$x)
            ->get();
        $rowdi = DB::table('difficults')
            ->get();
        $chid = session('chapid');
        $imr = DB::table('images')
            ->where('professor_id',$x)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        return view('insrtquest',compact('rowdi','chid','row','imr','rowl'));
    }
    public function insquesttf(){
        $x = session('profid');
        $row = DB::table('professors')
            ->where('id',$x)
            ->get();
        $rowdi = DB::table('difficults')
            ->get();
        $chid = session('chapid');
        $imr = DB::table('images')
            ->where('professor_id',$x)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        return view('insrtquestf',compact('rowdi','chid','row','imr','rowl'));
    }

    public function insquestopen(){
        $x = session('profid');
        $row = DB::table('professors')
            ->where('id',$x)
            ->get();
        $rowdi = DB::table('difficults')
            ->get();
        $chid = session('chapid');
        $imr = DB::table('images')
            ->where('professor_id',$x)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        return view('insrtqustopen',compact('rowdi','chid','row','imr','rowl'));
    }
    public function insrtquopen(Request $request){
        //edit filter//
        $this->validate($request,
            [
                'text'=>'required',
                'difficult'=>'required',

            ]
        );

            $cid = session('chapid');
            $rowq = new question();
            $rowq->chapter_id = $cid;
            $rowq->typeq_id = 2;
            $rowq->text = ':' .$request->text;
            $rowq->difficult_id = $request->difficult;
            $rowq->save();
            return redirect()->back()->with('nulls','Question had been added Successfully !!');


        }
    public function insrtqutf(Request $request){
        $this->validate($request,
            [
                'text'=>'required',
                'first'=>'required',
                'one'=>'required',
                'second'=>'required',
                'two'=>'required',
                'difficult'=>'required',

            ]
        );
            $cid = session('chapid');
            $rowq = new question();
            $rowq->chapter_id = $cid;
            $rowq->text = ':' . $request->text;
            $rowq->typeq_id = 3;
            $rowq->difficult_id = $request->difficult;
            $rowq->save();
            $rwq = $rowq->id;
            $rowans1 = new answer();
            $rowans1->text = ':' . $request->first;
            $rowans1->correct = $request->one;
            $rowans1->question_id = $rwq;
            $rowans1->save();
            $rowans2 = new answer();
            $rowans2->text = ':' . $request->second;
            $rowans2->correct = $request->two;
            $rowans2->question_id = $rwq;
            $rowans2->save();
            return redirect()->back()->with('nulls','Question had been added Successfully !!');


       }

    public function insrtqumcq(Request $request){
            $this->validate($request,
                [
                    'text'=>'required',
                    'first'=>'required',
                    'one'=>'required',
                    'second'=>'required',
                    'two'=>'required',
                    'third'=>'required',
                    'three'=>'required',
                    'fourth'=>'required',
                    'four'=>'required',
                    'difficult'=>'required',

                ]
                );
            $cid = session('chapid');
            $rowq = new question();
            $rowq->chapter_id = $cid;
            $rowq->typeq_id = 1;
            $rowq->text =':' . $request->text;
            $rowq->difficult_id = $request->difficult;
            $rowq->save();
            $rwq = $rowq->id;
            $rowans1 = new answer();
            $rowans1->text =':' . $request->first;
            $rowans1->correct = $request->one;
            $rowans1->question_id = $rwq;
            $rowans1->save();
            $rowans2 = new answer();
            $rowans2->text =':' . $request->second;
            $rowans2->correct = $request->two;
            $rowans2->question_id = $rwq;
            $rowans2->save();
            $rowans3 = new answer();
            $rowans3->text =':' . $request->third;
            $rowans3->correct = $request->three;
            $rowans3->question_id = $rwq;
            $rowans3->save();
            $rowans4 = new answer();
            $rowans4->text =':' . $request->fourth;
            $rowans4->correct = $request->four;
            $rowans4->question_id = $rwq;
            $rowans4->save();
            return redirect()->back()->with('nulls','Question had been added Successfully !!');

    }
    public function upqu(Request $request){
                //edit filter//
        $name = $request->text;
        $sub = $request->question;
        $sdd = $request->difficult;
        $before = filter_var($name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $name){
        DB::table('questions')
            ->where('id',$sub)
            ->update(['text'=>$name,'difficult_id'=>$sdd]);
        return redirect()->back()->with('nulls','Updated Successfully !!');
        }
        else{
            return redirect()->back()->with('nulls','Data you entered in not Valid, Try another Data !!');

        }
    }
    public function delquest(question $question){
        DB::table('questions')
            ->where('id',$question->id)
            ->delete();
        return redirect()->back()->with('nulls','Question deleted Successfully !!');
    }
    public function upans(Request $request){
        //edit filter//
        $qid = $request->answer;
        $txt = $request->first;
        $cor = $request->one;
        $before = filter_var($txt, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $txt){
        DB::table('answers')
            ->where('id',$qid)
            ->update(['text'=>$txt,'correct'=>$cor]);
        $x = session('profid');
        $row = DB::table('professors')
            ->where('id',$x)
            ->get();
        return redirect()->back()->with('nulls','Answer had been updated Successfully !!');
        }
        else{
            return redirect()->back()->with('nulls','Answer cannot be updated, Please enter Valid Data!!');
        }
    }
    public function examst(level $level){
        $lid = $level->id;
        session_start();
        session()->get('levelid');
        session()->put('levelid',$lid);
        $student = session('studentid');
        $rowq = DB::table('questions')
            ->get();
        $rowans = DB::table('answers')
        ->get();
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowd = DB::table('departments')
            ->get();
        $rows = DB::table('subjects')
            ->where('professor_id',$y)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('exam',compact('student','rowq','rowans','lid','row','rowd','rows','rowl','imr'));
    }

    public function mkexam(subject $subject){
        $lid = session('levelid');
        $sid = $subject->id;
        session_start();
        session()->get('subjectid');
        session()->put('subjectid',$sid);
        $rownum = DB::table('usualexams')
            ->where('subject_id',$sid)
            ->get();
        if(count($rownum)>0){
        $rowstructure = DB::table('examstructures')
                ->where('subject_id',$sid)
                ->get();
        $sum = 0;
        foreach ($rowstructure as $e){
            $sum =$sum+$e->numofq;
        }
        $rowq = DB::table('questions')
            ->get();
        $rowans = DB::table('answers')
            ->get();
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowd = DB::table('departments')
            ->get();
        $rows = DB::table('subjects')
            ->where('professor_id',$y)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowdif = DB::table('difficults')
            ->get();
        $rowch = DB::table('chapters')
            ->where('subject_id',$sid)
            ->get();
        return view('makeexam',compact('rowq','rowans','row','rowd','rows','rowl','imr','sid','rowdif','rowch','lid','rowstructure','sum'));
        }else{
            return redirect('Number');
        }
    }
    public function insertmkexam(subject $subject,Request $request){
        $sid = session('subjectid');
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowdif = DB::table('difficults')
            ->get();
        $rowch = DB::table('chapters')
            ->where('subject_id',$sid)
            ->get();
        $structure = DB::table('examstructures')
                ->where('subject_id',$sid)
                ->get();
        $strsub = 0;
        $structureCh = DB::table('examstructures')
            ->where('chapter_id',$request->chapter)
            ->get();
        $strsCh = 0;
        if(count($structure)>0){
            foreach ($structure as $str){
                $strsub =$strsub+$str->numofq;
            }
        }
        if(count($structureCh)>0){
            foreach ($structureCh as $ChId){
                $strsCh = $strsCh +$str->numofq;
            }
        }
            $number = DB::table('usualexams')
                    ->where('subject_id',$sid)
                    ->get();
            if(count($number)>0){
                foreach ($number as $nm){
                    if($nm->number > $strsub){

                        $s2 = $strsub +$request->quest;
                        if($nm->number >= $s2){
                        if($nm->number_chapter > $strsCh){

                            $sCh =  $strsCh +$request->quest;
                            if($nm->number_chapter >= $sCh){
                                $compareQD = DB::table('questions')
                                            ->where('chapter_id',$request->chapter)
                                            ->where('difficult_id',$request->degree)
                                            ->get();
                                $compareSD = DB::table('examstructures')
                                    ->where('chapter_id',$request->chapter)
                                    ->where('difficult_id',$request->degree)
                                    ->get();

                                if (count($compareSD) < count($compareQD)){
                                    $t = new examstructure();
                                    $t->subject_id = $sid;
                                    $t->chapter_id =$request->chapter;
                                    $t->difficult_id = $request->degree;
                                    $t->numofq= $request->quest;
                                    $t->save();
                                    session_start();
                                    session()->get('chapid');
                                    session()->put('chapid',$t->id);
                                    return redirect()->back()->with('nulls','Structure added Successfully !!');
                                }
                                else{
                                    return redirect()->back()->with('nulls','Sorry, Question in this Chapter in This degree of difficulty Is not Available anymore . Please try with another Degree ');
                                }
                            }

                            elseif ($nm->number_chapter < $sCh){
                                return redirect()->back()->with('nulls',' Number of questions you choosed is more than this chapter limit number of questions, please choose smaller!!');
                            }
                            }
                        else{
                            return redirect()->back()->with('nulls','There is no free space for this chapter if you want to add structures you may delete some!!');
                        }
                        }
                        elseif ($nm->number < $s2) {
                        return redirect()->back()->with('nulls','The Number of Questions you recently choosed is more that the free space available, Please choose smaller Number !!');
                        }
                    }
                    elseif($nm->number <= $strsub){
                        return redirect()->back()->with('nulls', 'Sorry your structures is more than limit level you set before !!');
                    }
                }
            }else{
                    return redirect()->back()->with('nulls', 'Sorry Set The Number of questions before !!');
                }

    }
    public function deletestructure(examstructure $r){
        $e2 = $r->id;
        DB::table('examstructures')
                ->where('id',$e2)
                ->delete();
        return redirect()->back()->with('nulls','Structure Removed Successfully !');
    }

    public function timesets(level $level){
        $li = $level->id;
        session_start();
        session()->get('levelid');
        session()->put('levelid',$li);
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $lid = session('levelid');
        $rowd = DB::table('departments')
            ->where('level_id',$li)
            ->get();
        $rows = DB::table('subjects')
            ->where('professor_id',$y)
            ->get();

        return view('timeset',compact('row','rowd','rows','rowl','lid','imr'));

    }
    public function sett(Request $request){
        $sub = $request->subject;
        $hour = 0 + $request->hour;
        $time = $request->time;
        $min = 0+  $request->min;
        $date = $request->date;

        $rs = DB::table('examtimes')
            ->where('subject_id',$sub)
            ->get();
            if(count($rs)>0){
                DB::table('examtimes')
                    ->where('subject_id',$sub)
                    ->update(['time'=>$hour,'times'=>$time,'date'=>$date,'min'=>$min]);
                return redirect()->back()->with('nulls','Time Updated Successfully !!');
            }
            if(count($rs)<=0){
            $t = new examtime();
            $t->subject_id = $sub;
            $t->time =$hour;
            $t->times =$time;
            $t->min =$min;
            $t->date =$date;
            $t->save();
                return redirect()->back()->with('nulls','Time Added Successfully !!');
            }
    }
    public function sett2(Request $request){
        $sub = $request->subject;
        $hour = 0 +$request->hour;
        $time = $request->time;
        $min = 0+$request->min;
        $date = $request->date;

        $rs = DB::table('examtimes')
            ->where('subject_id',$sub)
            ->get();
            if(count($rs)>0){
                DB::table('examtimes')
                    ->where('subject_id',$sub)
                    ->update(['time'=>$hour,'times'=>$time,'date'=>$date,'min'=>$min]);
                return redirect()->back()->with('nulls','Time Updated Successfully !!');
            }
            if(count($rs)<=0){
            $t = new examtime();
            $t->subject_id = $sub;
            $t->time =$hour;
            $t->times =$time;
            $t->min =$min;
            $t->date =$date;
            $t->save();
                return redirect()->back()->with('nulls','Time Added Successfully !!');
            }
    }
    public function delstudent(student $r){
        DB::table('students')
           ->where('id',$r->id)
           ->delete();
   return redirect()->back()->with('nulls','Deleted Successfully');
    }
}
