<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Permission {

    public function handle($request, Closure $next)
    {
        $route_name = $request->route()->getName();
        if( \Auth::check() ){
            if( \Auth::user()->has_permission($route_name) )
                return $next($request);
            else
                if ($request->ajax() || $request->wantsJson())
                    return response()->json(['error'=>true,'text'=>'Bạn không có quyền thực hiện hành động này!']);
                else
                    return redirect()->route('denied');
        }
        else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
?>