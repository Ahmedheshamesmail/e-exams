<?php

namespace App\Http\Controllers;

use App\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\professor;
use App\rqust;
use App\subject;
use App\level;
use App\department;
use function Sodium\compare;

class control2 extends Controller
{

    public function p(){
        return view('as.prof');
    }
    public function stu(Request $row){
        $row->session()->get('key');
        session(['key' => [6,7,9,3]]);
        $r = session('key');
        return view('as.stu-dent',  compact('r'));
    }
    public function ad(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.ad-min',compact('row','imr'));
    }
    public function err(){
        return view('as.err');
    }
    public function acc(){
        return view('as.accepted');
    }
    public function insrtp(Request $req){


        $this->validate($req,[

            'name'=>'required||min:4',
            'phone'=>'required||unique:rqusts||unique:professors||min:11||max:11',
            'password'=>'string||required||min:8'

        ]);
        $phone = 2 .$req->phone;
        $rowrs = DB::table('rqusts')
            ->where('phone',$phone)
            ->get();
        $rowrpro = DB::table('professors')
            ->where('phone',$phone)
            ->get();
        if(count($rowrs) > 0){
            return redirect('message6');
        }
        if(count($rowrpro) > 0){
            return redirect('message6');
        }
            $res = new rqust();
            $res->name=$req->name;
            $res->phone=$phone;
            $res->password=password_hash($req->password,PASSWORD_ARGON2I);
            $res->save();
            return redirect()->back()->with('nulls','اهلا بك سيتم مراجعة طلبك قريبا .');

    }
    public function insrtsub(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowp = DB::table('professors')
                ->get();
        $rowd = DB::table('departments')
                ->get();
        $rowl = DB::table('levels')
                ->get();
        $rows = DB::table('students')
                ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.insrtsubject', compact('rowp','rowd','row','imr'));
    }
    public function insrtde(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowl = DB::table('levels')
                ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.insrtdepart', compact('row','rowl','imr'));
    }
    public function insrtle(){
        $y = session('profid');
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        return view('as.insrtlevel',compact('imr','row'));
    }

    public function insertlevel(Request $req){
        $y = session('profid');
        //edit filter//
        $before = filter_var($req->name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $req->name){
        $res = new level();
        $res ->name=$req->name;
        $res->save();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
            return redirect()->back()->with('nulls','تم اضافة صف');
        }
        else{
            return redirect()->back()->with('nulls','Sorry Level cannot be added, Level Name is not Valid !!');
        }
    }
    public function insertde(Request $req){
        //edit filter//
        $before = filter_var($req->name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $req->name){

            $res = new department();
            $res ->name=$req->name;
            $res->level_id=$req->level;
            $res->save();
            $y = session('profid');
            $row = DB::table('professors')
                ->where('id',$y)
                ->get();
            $imr = DB::table('images')
                ->where('professor_id',$y)
                ->get();

                return redirect()->back()->with('nulls','تم اضافه قسم');

        }

        else{
            return redirect()->back()->with('nulls','اسم القسم الذي ادخلته غير مفهوم!!');
        }
    }

    public function insertsub(Request $req){
        $y = session('profid');
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
         //edit filter//
         $before = filter_var($req->name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
         $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
         if($after === $req->name){
        $res = new subject();
        $res ->name=$req->name;
        $res->department_id=$req->depart;
        $res->professor_id=$req->prof;
        $res->save();

        return redirect()->back()->with('nulls','تم اضافة ماده');
         }

        else{
            return redirect()->back()->with('nulls','اسم الماده الذي ادخلته غير مفهوم!!');
        }
    }
    public function subject(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rows = DB::table('subjects')
                ->get();
        $rowp = DB::table('professors')
                ->get();
        $rowd = DB::table('departments')
                ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.subjects', compact('row','rowp','rowd','rows','imr'));
    }
    public function dep(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowd = DB::table('departments')
                ->get();
        $rowl = DB::table('levels')
                ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.depart', compact('row','rowl','rowd','imr'));
    }
    public function upde(department  $rowd){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowl = DB::table('levels')
                ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.updatedepart', compact('rowd','rowl','row','imr'));
    }



    public function updatede(department $rowd ,Request $req) {
        //edit filter//
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();

            $name = $req->name;
            $before = filter_var($name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
            $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($after === $name){
            $did = $req->did;
            $lid = $req->level;
            DB::table('departments')
                    ->where('id',$did)
                    ->update(['level_id'=>$lid,"name"=>$name]);

                    return redirect('Departmentsa',compact('row','imr'));
                }
        else{
            return redirect()->back()->with('nulls','اسم القسم الذي ادخلته غير مفهوم!!');
        }
    }
    public function upsub(subject $rows){
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
        return view('as.updatesub', compact('row','rowp','rowd','rows','imr','rowl'));
    }
    public function delsub(subject $rows){
        DB::table('subjects')
                ->where('id',$rows->id)
                ->delete();
        return redirect('Subjectsa');
    }
    public function deldep(department $rowd){
        $r = $rowd->id;
        DB::table('departments')
                ->where('id',$r)
                ->delete();
        return redirect()->back()->with('nulls','تم حذف عنصر');
    }
    public function updatesub(Request $req,subject $ssid) {
        //edit filter//
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
            $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $name = $req->name;

        $before = filter_var($name, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $name){
                $sid = $ssid->id;
                $did = $req->depart;
                $pid = $req->prof;
                DB::table('subjects')
                        ->where('id',$sid)
                        ->update(['department_id'=>$did,'professor_id'=>$pid,'name'=>$name]);
                        return redirect()->back()->with('nulls','تم تعديل الماده !!');
                    }
            else{
                return redirect()->back()->with('nulls','اسم الماده الذي ادخلته غير مفهوم!!');
            }
    }
    public function create(){
        return view('as.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        return redirect('A-Pagea');
    }
    public function requests(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowr = DB::table('rqusts')
            ->get();
        return view('as.requests', compact('rowr','row','imr'));
    }
    public function delreq(rqust $row){
        DB::table('rqusts')
            ->where('id',$row->id)
            ->delete();
            return redirect()->back()->with('nulls','تم حذف الطلب');
        }
    public function acceptreq(Request $req){
        $id = $req->did;
        $res = DB::table('rqusts')
            ->where('id',$id)
            ->get();
        foreach ($res as $x){
            $rowd = new professor();
            $rowd-> name = $x->name;
            $rowd-> phone = $x->phone;
            $rowd-> password = md5($x->password);
            $rowd->admin = 0;
            $rowd->save();
            $dir='Professor-img/'.$rowd->id .'/' ;
            mkdir($dir);
            if($dir){
                copy('Professor-img/user-male-icon.png', $dir.'/user-male-icon.png');
            }
            $roi = new image();
            $roi-> professor_id = $rowd->id;
            $roi->img = 'user-male-icon.png';
            $roi->save();
        }
        $y = session('profid');
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        DB::table('rqusts')
            ->where('id',$id)
            ->delete();
        return redirect()->back()->with('nulls','تم القبول');
    }
    public function pro(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowp = DB::table('professors')
            ->where('admin',0)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        $rowd = DB::table('departments')
            ->get();
        return view('as.viowprof', compact('row','rowp','imr','rowd'));
    }
    public function delpro(professor $rowpd){
        DB::table('professors')
            ->where('id',$rowpd->id)
            ->delete();
        return redirect('viewa');
    }
    public function loginp(Request $log){
        $phone =2 . $log->phone;
        $password = $log->password;


        $this->validate($log,[


            'phone'=>'required||min:11||max:11',
            'password'=>'string||required||min:8'

        ]);
        $row =DB::table('professors')
            ->where('phone',$phone)
            ->get();

        if(count($row)>0){
            foreach ($row as $x){
                $rowPass = $x->password;
                if(password_verify($password,$rowPass)){
                    $y = $x->id;
                    session()->start();
                    session()->put('profid', $y);
                    session()->save();
                    if($x->admin == 1){
                        return redirect('A-Pagea');
                    }
                    if($x->admin == 0){
                        return redirect('Profilea');
                    }
                }
                else {
                    return redirect()->back()->with('nulls', 'كلمة السر التي ادخلتها غير صحيحه!!');
                }
            }
        }
        else {
            return redirect()->back()->with('nulls', 'البيانات التي ادخلتها ليست متطابقه!!');
        }

    }
    public function leve(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rowl = DB::table('levels')
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.level', compact('row','rowl','imr'));
    }
    public function delleve(level $row2){
        DB::table('levels')
            ->where('id',$row2->id)
            ->delete();
        return redirect()->back()->with('nulls','تم الحذف');
    }
    public function upimg(){
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $imr = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        return view('as.updateprofimg',compact('row','imr'));
    }
    public function updateimg(image $image,Request $request){
        $pic = $request->file('img');
        $picnew=$pic->getClientOriginalName();
        $y = session('profid');
        $row = DB::table('professors')
            ->where('id',$y)
            ->get();
        $rt = DB::table('images')
            ->where('professor_id',$y)
            ->get();
        if(count($rt)>0){
            foreach ($rt as $rg){
                $picold=$rg->img;
                $dir='Professor-img/'.$y;


                $pic->move($dir,$picnew);
                $in = DB::table('images')
                    ->where('professor_id',$y)
                    ->get();
                session()->start();
                session()->put('imgp', $in);
                session()->save();
                unlink($dir.'/'.$picold);
                DB::table('images')
                    ->where('professor_id',$y)
                    ->update(['img'=>$picnew]);
            }
        }
        else{
            $in = DB::table('images')
                ->where('professor_id',$y)
                ->get();
            session()->start();
            session()->put('imgp', $in);
            session()->save();
            $t = new image();
            $t->img = $picnew;
            $t->professor_id = $y;
            $dir='Professor-img/'.$y.'/';
            if($dir){
                $pic->move($dir,$picnew);
            }
            if(!$dir) {
                mkdir($dir);
                $pic->move($dir,$picnew);
            }
            $t->save();
        }

        return redirect()->back()->with('nulls','تم تحديث الصوره الشخصيه !!');
    }
    public function insertsub2(Request $request){
        //edit filter//
        $prof = $request->prof;
        $subject = $request->subject;
        $department= $request->department;
        $before = filter_var($subject, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
        $after = filter_var($before,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($after === $subject){
                $rowdd = DB::table('subjects')
                ->where('name',$subject)
                ->where('department_id',$department)
                ->where('professor_id',$prof)
                ->get();
            if (count($rowdd)>0){
                return redirect()->back()->with('nulls','للاسف يوجد ماده بهذا الاسم في هذا القسم  !!');
            }
            if (count($rowdd)<1){
                $t = new subject();
                $t->name = $subject;
                $t->professor_id = $prof;
                $t->department_id=$department;
                $t->save();
                return redirect()->back()->with('nulls','تم اضافة ماده');
            }
        }
        if($after !== $subject){
            return redirect()->back()->with('nulls','اسم الماده الذي ادخلته غير مفهوم!!');
        }

    }
}
