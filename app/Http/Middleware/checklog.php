<?php

namespace App\Http\Middleware;

use Closure;

use http\Header;
use phpDocumentor\Reflection\Types\AbstractList;

class checklog
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

        $num2 = filter_var($request->phone, FILTER_SANITIZE_NUMBER_INT);
        $num1 = $request->phone;
        $pass1 = $request->password;
        $pass2 = filter_var($request->password, FILTER_SANITIZE_STRING);



        if ($num1 == null) {
            return redirect()->back()->with('nulls', 'Please Enter Your Phone Number');
        }
        if ($pass1 == null) {
            return redirect()->back()->with('nulls', 'Please Enter Your Password');
        }
        if ($pass1 !== $pass2) {
            return redirect()->back()->with('nulls', 'Please Dont enter string Characters in Fields, You can only enter letters & numbers !!');
        }
        if ($num1 !== $num2) {
            return redirect()->back()->with('nulls', 'You can only enter Numbers in Phone Number field!!');
        }

        if (strlen($num1) < 11) {
            return redirect()->back()->with('nulls', 'Please Enter Minimum 11 Numbers in Phone Field!!');
        }
        if (strlen($pass1) < 8) {
            return redirect()->back()->with('nulls', 'Your Password is Weak, Please Enter Minimum 8 Numbers in Password Field!!');
        }

        return $next($request);
    }
}
