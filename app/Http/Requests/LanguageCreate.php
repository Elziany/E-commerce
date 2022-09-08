<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $routes=\Route::getRoutes();
        if($routes->getByName('admin.store.language') === \Route::getCurrentRoute()){
        return [
         "name"=>'required |unique:languages',
         'abbr'=>'required |unique:languages',
         'direction'=>'required'
        ];
    }
    else{
        return [
            "name"=>'required ',
            'abbr'=>'required ',
            'direction'=>'required'
           ];
    }
    }
    public function messages()
    {
        return [
            'name'=>'name is required',
            'abbr'=>'abbr is required',
            'direction'=>'direction is required'
        ];
    }
}
