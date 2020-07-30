<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use App;
class Local
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
    $language = Session::get('website_language');
    // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config
    // App::setLocale($language);
    //app()->getLocale('vi');
    config(['app.locale' => $language]);
    // Chuyển ứng dụng sang ngôn ngữ được chọn

    return $next($request);
}
}