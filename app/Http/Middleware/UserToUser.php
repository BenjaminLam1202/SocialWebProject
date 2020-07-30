<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;
use Auth;
class UserToUser
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
        $data=$request->route()->parameters();
        if (auth::user()->id == Post::find($data['poid'])->user_id) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
        return redirect('/')->with('status', 'Not Authorized!');
    }
}
