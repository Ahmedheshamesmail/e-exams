<?php

namespace App\Http\Middleware;

use Closure;

class studentvalid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         request()->validate(['phone'=> 'required','password'=> 'required']);

        $num2 = filter_var($request->name, FILTER_SANITIZE_NUMBER_INT);
        $num1 = $request->name;
        $pass1 = $request->natid;
        $pass2 = filter_var($request->natid, FILTER_SANITIZE_STRING);



        if ($num1 == null) {
            return redirect()->back()->with('nulls', 'Please Enter Your Name');
        }
        if ($pass1 == null) {
            return redirect()->back()->with('nulls', 'Please Enter Your National ID');
        }
        

        return $next($request);
    }
}
