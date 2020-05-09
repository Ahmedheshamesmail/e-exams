<?php

namespace App\Http\Controllers;
use App\student;
use App\department;
use App\level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\datas;
use App\results;
use App\openquestions;
use App\answertimes;
use App\answeredquestions;
use App\openexamstudents;
use App\studentranks;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $student = session('studentid');
        $subject = session('subjectid');
        date_default_timezone_set('Africa/Cairo');

        $timeroow = DB::table('openexams')
            ->where('subject_id',$subject)
            ->where('work',1)
            ->get();
            if(count($timeroow)>0){
                foreach ($timeroow as $t){
                    $timeopening = DB::table('examtimes')
                    ->where('subject_id',$subject)
                    ->get();
                    if(count($timeopening)>0){
                        foreach($timeopening as $e){

                            $currenttime = date('h:i:s',time());

                            $interval = strtotime($e->times);
                            $interval2 = ($interval +( $e->time * 60 * 60)+($e->min * 60));
                            $interval3 = strtotime($currenttime);
                            if($interval2 > $interval3){
                                $interval4 = $interval2 - $interval3 ;
                                session_start();
                                session()->get('examtime');
                                session()->put('examtime',$interval4);
                            }
                        }
                    }
                }
            }else{
                return redirect()->back()->with('nulls', 'Exam not Available');
            }
        $time = session('examtime');
        $s = DB::table('students')
            ->where('Nationalid',$student)
            ->get();
        $rowans = DB::table('answers')
                ->InRandomOrder()
            ->get();
        $rowd = DB::table('departments')
            ->get();
        $rows = DB::table('subjects')
            ->get();
        $rowt = DB::table('openexams')
            ->get();
        $rowp = DB::table('professors')
            ->get();
        $rowl= DB::table('levels')
            ->get();
        $rowstruc = DB::table('examstructures')
            ->where('subject_id',$subject)
            ->get();
        $da2 = DB::table('datas')
            ->where('subject_id', $subject)
            ->inRandomOrder()
            ->get();
        $rowq = DB::table('questions')
            ->get();
        $rowat = DB::table('attaches')
                ->get();
        foreach ($s as $s2){

        $rowoes = DB::table('openexamstudents')
                ->where('student_id',$s2->id)
                ->where('subject_id',$subject)
                ->get();
        if(count($rowoes) <1){
                $t = new openexamstudents();
                $t->student_id = $s2->id;
                $t->subject_id = $subject;
                $t->work = 1;
                $t->save();
            }
           if(count($rowoes) >0){
               foreach ($rowoes as $os){
                    if($os->work == 0){
                        return redirect()->back()->with('nulls', 'Exam Not still Avaliable for you !!');
                    }
                    if($os->work == 1){
                        $rankResult = DB::table('results')
                        ->where('student_id',$s2->id)
                        ->where('subject_id',$subject)
                        ->get();
                        if(count($rankResult)>0){
                            return redirect()->back()->with('nulls', 'Sorry You already passed this Exam !!');
                        }
                    }
               }
           }
        }

     return view('studentexam',compact('time','student','rowstruc','rowq','rowans','rowd','rows','s','rowt','rowp','subject','rowl','da2','rowat'));
    }
    public function fetch(Request $request){
        $value = $request->get('z');
        $data = DB::table('departments')
            ->where('level_id',$value)
            ->get();
        foreach ($data as $d) {
            echo '<option value="' . $d->id . '">  ' . $d->name . '</option>';
        }
    }


    public function saveans(Request $request){
        $student = session('studentid');
        $subject = session('subjectid');
        $y = 0;
        $subRank=0;
        $rowans = DB::table('answers')
            ->where('correct',1)
            ->get();
        $rowans2 = DB::table('answers')
            ->get();
        $rowq = DB::table('questions')
            ->get();
        $rankcount = DB::table('datas')
                ->where('subject_id',$subject)
                ->get();
                //set final marks of this subject//
            foreach($rankcount as $rkct){
                    $rankans = DB::table('answers')
                    ->where('question_id',$rkct->question_id)
                    ->get();
                    $subRank = $subRank + count($rankans);
            }
        foreach ($rowq as $q){
            //set answer times//
            foreach ($rowans2 as $ss2){
                if ($ss2->question_id == $q->id){

                    if ($q->typeq_id == 3){

                        $f2 = 'answer'.$q->id;
                        $fg2 = $q->id . $ss2->text;
                            if ($request->$f2 == $fg2){
                                $ans = new answertimes();
                                $ans->answer_id =$ss2->id;
                                $ans->question_id = $q->id;
                                $ans->correct = $ss2->correct;
                                $ans->save();
                                $rowanq = DB::table('answeredquestions')
                                ->where('question_id',$q->id)
                                ->get();
                                if(count($rowanq)<1){
                                $anq = new answeredquestions();
                                $anq->subject_id = $subject;
                                $anq->question_id = $q->id;
                                $ranq = DB::table('subjects')
                                        ->where('id',$subject)
                                        ->get();
                                foreach ($ranq as $rq){
                                    $anq->professor_id = $rq->professor_id;
                                }
                                $anq->save();
                                }
                            }
                    }
                    if ($q->typeq_id == 1){
                        $f = 'answer'.$ss2->id;
                        $fg = $q->id . $ss2->text;

                        if ($request->$f == $fg){
                                $ans = new answertimes();
                                $ans->answer_id =$ss2->id;
                                $ans->question_id = $q->id;
                                $ans->correct = $ss2->correct;
                                $ans->save();
                                $rowanq2 = DB::table('answeredquestions')
                                ->where('question_id',$q->id)
                                ->get();
                                if(count($rowanq2)<1){
                                $anq = new answeredquestions();
                                $anq->subject_id = $subject;
                                $anq->question_id = $q->id;
                                $ranq = DB::table('subjects')
                                        ->where('id',$subject)
                                        ->get();
                                foreach ($ranq as $rq){
                                    $anq->professor_id = $rq->professor_id;
                                }
                                $anq->save();
                                }
                        }
                    }
                }
            }
            //set student marks//
        foreach ($rowans as $s){
            if ($s->question_id == $q->id){
                        if ($q->typeq_id == 3){
                            $f2 = 'answer'.$q->id;
                            $fg = $q->id . $s->text;
                                if ($request->$f2 == $fg){
                                    $y = $y +$s->correct;
                                }
                        }
                        if ($q->typeq_id == 1){
                                    $f = 'answer'.$s->id;
                                    $fg = $q->id . $s->text;
                                    if ($request->$f == $fg){
                                                if($s->correct == 1){
                                                    $y = $y +1;
                                                }
                                                if($s->correct == 0){
                                                            $cornew = DB::table('answers')
                                                            ->where('question_id',$q->id)
                                                            ->where('correct',1)
                                                            ->get();

                                                                            if(count($cornew) >= $y){
                                                                                $y = 0;
                                                                            }
                                                                            if(count($cornew) < $y){
                                                                                $y = $y - count($cornew);
                                                                            }

                                                    }

                                        }


                            }
                            //-------//
                }
            }

            $roq = $q->id;
            if ($request->$roq){
                $rowdata = DB::table('datas')
                ->where('subject_id',$subject)
                ->get();
                foreach ($rowdata as $data){
            $ro = DB::table('questions')
                    ->where('id',$data->question_id)
                    ->where('typeq_id',2)
                    ->get();
            if(count($ro)>0){
                echo 'yes';
                foreach ($ro as $rrow){
                $t = new openquestions();
                $rowstu = DB::table('students')
                        ->where('Nationalid',$student)
                        ->get();
                        foreach ($rowstu as $rr){
                            $t ->student_id = $rr->id;
                        }
                $t ->subject_id = $subject;
                $t->reviewed = 0;
                $t->degree = 0;
                $t ->question_id = $rrow->id;
                $g = $rrow->id;
                $g2 = $request->$g;
                if($g2 == NULL){
                    $t->text = 0;
                }  else {

                    $t->text = 'answer : ('.$g2.')';
                }

                $t->save();

                    }

            }

        }

    }
        }
                        $rowdata = DB::table('datas')
                            ->where('subject_id',$subject)
                            ->get();
                    //determine if the student will be notified with his rank directly or not//
                foreach ($rowdata as $data){
                                $ro = DB::table('questions')
                                        ->where('id',$data->question_id)
                                        ->where('typeq_id',2)
                                        ->get();
                                if(count($ro)>0){
                                        $rowstu = DB::table('students')
                                        ->where('Nationalid',$student)
                                        ->get();
                                        foreach ($rowstu as $rr){
                                            $t = new results();
                                            $t->student_id = $rr->id;
                                            $t->result = $y;
                                            $t->final = 0;
                                            $t->subject_id = $subject;
                                            $t->save();
                                            $ranks = new studentranks();
                                            $ranks->natid = $student;
                                            $ranks->subject_id = $subject;
                                            $ranks->studentrank = $y;
                                            $ranks->final = $subRank;
                                            $ranks->updates = 0;
                                            $ranks->save();
                                        }
                                }

    }
    $rowstu = DB::table('students')
    ->where('Nationalid',$student)
    ->get();
    foreach($rowstu as $rr){
        $rowFinalOpen = DB::table('openquestions')
                            ->where('student_id',$rr->id)
                            ->where('subject_id',$subject)
                            ->get();
                if(count($rowFinalOpen )<1){
                    $t = new results();
                    $t->student_id = $rr->id;
                    $t->result = $y;
                    $t->final = 1;
                    $t->subject_id = $subject;
                    $t->save();
                    $ranks = new studentranks();
                    $ranks->natid = $student;
                    $ranks->subject_id = $subject;
                    $ranks->studentrank = $y;
                    $ranks->final = $subRank;
                    $ranks->updates = 1;
                    $ranks->save();
            DB::table('openexamstudents')
                ->where('student_id',$rr->id)
                ->update(["work"=>0]);
                return redirect('Student')->with('nulls','Your Results is : '.$y);
            }
                if(count($rowFinalOpen )>0){
                    DB::table('openexams')
                    ->where('subject_id',$subject)
                    ->update(["work"=>0]);
                    DB::table('datas')
                    ->where('subject_id',$subject)
                    ->delete();
                    return redirect('Student')->with('nulls','Your Results will be reviewed');

                }

    }

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
    }

    public function store(Request $request){

        $name = $request->name;
        $naid =47 . $request->naid;

        $level=$request->level;
        $depart=$request->depart;
// edit filter//

        $beforeN = filter_var($name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $afterN = filter_var($beforeN,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($afterN !== $name){
            return redirect()->back()->with('nulls','Sorry, Student Name is not Valid !!');
        }
        $beforeI = filter_var($naid, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $afterI = filter_var($beforeI,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($afterI !== $naid){
            return redirect()->back()->with('nulls','Sorry, Student National ID is not Valid !!');
        }
        else{

            $rowstu = DB::table('students')
            ->where('Nationalid',$naid)
            ->get();
        if(count($rowstu)>0){
            return redirect()->back()->with('nulls','Sorry, a students in the system took the same National ID !!');
        }
            $rowstuRequest = DB::table('studentrqusts')
                ->where('Nationalid',$naid)
                ->get();
            if(count($rowstuRequest)>0){
                return redirect()->back()->with('nulls','Sorry, a students in the system took the same National ID !!');
            }
        $t = new student();
        $t->name = $name;
        $t->Nationalid = $naid;
        $t->password = 0;
        $t->level_id = $level;
        $t->department_id = $depart;
        $t->save();
        return redirect()->back()->with('nulls','Student Added Successfully !!');

        }
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $user = App\User::find(1);

        foreach ($user->notifications as $notification) {
            echo $notification->type;
        }
        return [
            'invoice_id' => $this->invoice->id,
            'amount' => $this->invoice->amount,
        ];
    }
}
