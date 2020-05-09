<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\trainexams;
use App\usualexams;
use App\datatrains;
use App\level;
use App\department;
use App\subject;
use App\question;
use App\answer;
use App\chapteropens;
class training extends Controller
{
    public function addnumber(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
         $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowp = DB::table('professors')
            ->get();
        $rowd = DB::table('departments')
                ->get();
        $rowl= DB::table('levels')
            ->get();
        return view('addnumberq',compact('row','imr','rowp','rowd','rowl'));
    }
    public function addnum(Request $req){
        $t1 = new trainexams();
        $t1->subject_id =session('subjectid');
        $t1->number = $req->train;
        $t1->save();
        $t2 = new usualexams();
        $t2->subject_id =session('subjectid');
        $t2->number = $req->final;
        $t2->number_chapter = $req->finalch;
        $t2->save();
        $lid = session('levelid');
        return redirect($lid.'/ExamStructure')->with('nulls','Number of Questions addd Successfully');
    }
    public function trainshow(){
        $sub = session('subjectid');
        $stu = session('studentid');
        $rowc = DB::table('chapters')
                 ->where('subject_id',$sub)
                ->get();
        $rowtrain = DB::table('datatrains')
                ->get();
        $rowco = DB::table('chapteropens')
                ->where('subject_id',$sub)
                ->where('natid',$stu)
                ->get();
        $rows = DB::table('subjects')
                ->get();
        $rowq = DB::table('questions')
                ->InRandomOrder()
                ->get();
        $rowans = DB::table('answers')
                ->get();
        $rowat = DB::table('attaches')
                ->get();
        return view('trainstuexam',  compact('rowans','rowq','rowtrain','sub','rowc','rowat','rows','rowco'));
    }
    public function trainstart(Request $req){

        //set subject session
        session_start();
        session()->get('subjectid');
        session()->put('subjectid',$req->subject);
        $student = session('studentid');
        $rowch = DB::table('chapters')
              ->get();
        $rows = DB::table('subjects')
                ->where('id',$req->subject)
                ->get();
        $rowt = DB::table('trainexams')
            ->where('subject_id',$req->subject)
            ->get();
        foreach ($rowch as $c){
            $ch = $c->id.$req->subject;
            if($req->$ch == $c->name){
                if(count($rowt)>0){
                    foreach ($rowt as $tr){
                        $rowq = DB::table('questions')
                            ->where('chapter_id',$c->id)
                            ->limit($tr->number)
                            ->get();
                          foreach ($rowq as $q){
                              $rowdata = DB::table('datatrains')
                                ->where('question_id',$q->id)
                                ->get();
                              if(count($rowdata) >0){
                                  foreach ($rowdata as $da2){
                                      $rowco = DB::table('chapteropens')
                                              ->where('subject_id',$req->subject)
                                              ->where('natid',$student)
                                              ->where('chapter_id',$da2->chapter_id)
                                              ->get();
                                      if(count($rowco)<1){
                                        $trs = new chapteropens();
                                        $trs->subject_id = $req->subject;
                                        $trs->natid = $student;
                                        $trs->chapter_id = $da2->chapter_id;
                                        $trs->save();
                                      }
                                  }
                              }
                              elseif(count($rowdata) <1){
                                  if($q->typeq_id == 1){
                                   $train = new datatrains();
                                   $train->question_id = $q->id;
                                   $train->chapter_id = $c->id;
                                   $train->save();
                                  }
                                  if($q->typeq_id == 3){
                                      $train = new datatrains();
                                      $train->question_id = $q->id;
                                      $train->chapter_id = $c->id;
                                      $train->save();
                                     }
                                }
                              }
                            }
                    return redirect('Train-Exam')->with('nulls', 'Exam Started');

                }
                else {
                        return redirect()->back()->with('nulls', 'Training Exams Not Available yet !!');
                }
            }
        }
       return redirect('Train-Exam')->with('nulls', 'Exam Started');
    }
    public function trainans(Request $request){
        $subject = session('subjectid');
        $student = session('studentid');
        $y = 0;
        $rowq = DB::table('questions')
            ->get();
                foreach ($rowq as $q){
                    $rowans = DB::table('answers')
                            ->where('question_id',$q->id)
                            ->where('correct',1)
                            ->get();
                    foreach ($rowans as $s){
                    if ($q->typeq_id == 3){
                        $fq = $q->id . $s->text;
                        $f2 = 'answer'.$q->id;
                            if ($request->$f2 == $fq){
                                 $y =$y + $s->correct;
                            }
                    }
                    if ($q->typeq_id == 1){
                        $fq = $q->id;
                        $f = 'answer'.$s->id;
                        if ($request->$f == $fq){
                             $y =$y + $s->correct;
                        }
                    }
                }

        }
            $rowc = DB::table('chapters')
                    ->where('subject_id',$subject)
                    ->get();
            foreach ($rowc as $c){
                DB::table('datatrains')
                    ->where('chapter_id',$c->id)
                    ->delete();
            }
            DB::table('chapteropens')
               ->where('natid',$student)
               ->where('subject_id',$subject)
               ->delete();
            return redirect('Student')->with('nulls', 'You Marks :'.$y);
    }
    public function sellevel(level $r){
        $rowl2 = DB::table('levels')
                ->where('id',$r->id)
                ->get();
        $rowl = DB::table('levels')
                ->get();
        $rowd = DB::table('departments')
                ->where('level_id',$r->id)
                ->get();
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('chooselevel',  compact('rowd','rowl2','y','row','imr','rowl'));
    }
    public function seldeparts(department $r){
        $rowl = DB::table('levels')
                ->get();
        $rowd = DB::table('departments')
                ->where('id',$r->id)
                ->get();
        foreach ($rowd as $d){
            $rowl2 = DB::table('levels')
                ->where('id',$r->level_id)
                ->get();
        }
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rows = DB::table('subjects')
                ->where('department_id',$r->id)
                ->where('professor_id',$y)
                ->get();
        return view('choosesub',  compact('rowd','y','row','imr','rowl','rows','rowl2'));
    }
    public function vans(subject $r){
        $rowl = DB::table('levels')
                ->get();
        $rowd = DB::table('departments')
                ->get();
        $rowl2 = DB::table('levels')
                ->get();

        $rowch = DB::table('chapters')
            ->where('subject_id',$r->id)
            ->get();
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowq = DB::table('questions')
                ->get();
        $rowans = DB::table('answers')
                ->get();
        $rowast = DB::table('answertimes')
                ->get();

        $rowansed = DB::table('answeredquestions')
                ->get();
        return view('viewanswer',  compact('rowast','rowans','rowq','imr','row','y','rowl2','rowl','rowd','rowansed','rowch'));
    }
    public function calcu(question $r){
        $f = 0;
        $rowa = DB::table('answertimes')
                ->where('question_id',$r->id)
                ->where('correct',1)
                ->get();
        foreach ($rowa as $a){
            $f++;
        }
        return redirect()->back()->with('nulls', 'Question correctly Answered : ' . $f.' times');
    }
    public function calcuw(question $r){
        $f = 0;
        $rowa = DB::table('answertimes')
                ->where('question_id',$r->id)
                ->where('correct',0)
                ->get();
        foreach ($rowa as $a){
            $f++;
        }
        return redirect()->back()->with('nulls', 'Question wrongly Answered : ' . $f.' times');
    }
    public function calcuans(answer $r){
        $f = 0;
        $rowa = DB::table('answertimes')
                ->where('answer_id',$r->id)
                ->get();
        foreach ($rowa as $a){
            $f++;
        }
        return redirect()->back()->with('nulls', 'Answer Choosed : ' . $f.' times');
    }
    public function endtr(){
        $student = session('studentid');
        $subject = session('subjectid');
            DB::table('chapteropens')
               ->where('natid',$student)
               ->where('subject_id',$subject)
               ->delete();
       return redirect('Student');
    }

}
