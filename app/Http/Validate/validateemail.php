<?php  
namespace App\Validate;
use Illuminate\Support\Facades\Validator;

class ValidateEmail 
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
    
}