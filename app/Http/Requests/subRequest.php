<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class subRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $routes=\Route::getRoutes();
        if(request()->routeIs('subcatagory.update')){
          
        return [
            'catagory'=>'required|array|min:1',
            'catagory.*.name'=>'required',
            'catagory.*.abbr'=>'required',
           'maincatagory_id'=>'required'
        ];
    }
    else{
       
        return [
            'catagory'=>'required|array|min:1',
            'catagory.*.name'=>'required',
            'catagory.*.abbr'=>'required',

           'image'=>'required',
           'maincatagory_id'=>'required'
        ];
    }
    }
}
