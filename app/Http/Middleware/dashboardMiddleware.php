<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\group;

class dashboardMiddleware
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
        if(Auth::check())
        {   
            $role = Auth::user()->group->role()->get();
            $arr = [];
            $i = 0;
            foreach ($role as $key) {
                $arr[$i] = $key["id"];
                $i = $i+1;
            }
            
            if (count($arr) != 0) {
                return $next($request);
            }
            else
            {
                return redirect('admin/dangnhap')->with('loi','Bạn không có quyền thực hiện tác vụ này');
            }
        }
        else
        {
            return redirect('admin/dangnhap');
        }
        
    }
}
