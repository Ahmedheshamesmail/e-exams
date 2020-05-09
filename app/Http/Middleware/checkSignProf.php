<?php

namespace App\Http\Middleware;

use Closure;
use http\Header;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\AbstractList;

class checkSignProf
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        request()->validate(['name'=> 'required','phone'=> 'required','password'=> 'required']);

        $txt2 = filter_var($request->name, FILTER_SANITIZE_STRING);
        $txt1 = $request->name;
        $num2 = filter_var($request->phone, FILTER_SANITIZE_NUMBER_INT);
        $num1 = $request->phone;
        $pass1 = $request->password;
        $pass2 = filter_var($request->password, FILTER_SANITIZE_STRING);

        if ($txt1 !== $txt2) {
            return redirect()->back()->with('nulls', 'Please Dont enter Characters Like <>/?!  in Fields, You can only enter letters & numbers !!');
        }
            if ($pass1 !== $pass2) {
                return redirect()->back()->with('nulls', 'Please Dont enter Characters Like <>/?!  in Fields, You can only enter letters & numbers !!');
            }
            if ($num1 !== $num2) {
                return redirect()->back()->with('nulls', 'You can only enter Numbers in Phone Number field!!');
            }


            return $next($request);
        }

}
