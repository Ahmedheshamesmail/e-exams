<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\attaches;
use Illuminate\Support\Facades\DB;
class attache2 extends Controller
{
    public function addimg(Request $req){
        $pic = $req->file('file');
        $picname = $pic->getClientOriginalName();
        $rowq = DB::table('attaches')
                ->where('question_id',$req->question)
                ->where('fileattache_id',1)
                ->get();
        if(count($rowq)>0){
            return redirect()->back()->with('nulls','الصوره بالفعل مرفقه بهذا السؤال !!!');
        }
        else{
        $t = new attaches();
        $t->name = $picname;
        $t->question_id = $req->question;
        $t->fileattache_id = 1;
        $pic->move("att/img",$picname);
        $t->save();
        return redirect()->back()->with('nulls','تم إرفاق الصوره');
        }
    }
    public function addvid(Request $req){
        $vid = $req->file('file');
        $vidname = $vid->getClientOriginalName();
        $rowq = DB::table('attaches')
                ->where('question_id',$req->question)
                ->where('fileattache_id',3)
                ->get();
        if(count($rowq)>0){
            return redirect()->back()->with('nulls','ملف الفديو بالفعل مرفق بهذا السؤال!!!');
        }
        else{
        $t = new attaches();
        $t->name = $vidname;
        $t->question_id = $req->question;
        $t->fileattache_id = 3;
        $vid->move("att/video",$vidname);
        $t->save();
        return redirect()->back()->with('nulls','تم ارفاق الفديو');
        }
    }
    public function addaud(Request $req){
        $aud = $req->file('file');
        $audname = $aud->getClientOriginalName();
        $rowq = DB::table('attaches')
                ->where('question_id',$req->question)
                ->where('fileattache_id',2)
                ->get();
        if(count($rowq)>0){
            return redirect()->back()->with('nulls','ملف الصوت مرفق بالفعل بهذا السؤال !!!');
        }
        else{
        $t = new attaches();
        $t->name = $audname;
        $t->question_id = $req->question;
        $t->fileattache_id = 2;
        $aud->move("att/audio",$audname);
        $t->save();
        return redirect()->back()->with('nulls','تم ارفاق ملف الصوت');
        }
    }
    
}
