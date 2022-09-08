<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCatagoryRequest extends FormRequest
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
        if(!$routes->getByName("admin.update.catagory") === \Route::getCurrentRoute())
        return [
            'photo'=>'required|mimes:png,jpg,jpeg',
            'catagory'=>'required|array|min:1',
            'catagory.*.name'=>'required',
            'catagory.*.abbr'=>'required',

        ];
        else{
            return [
                'catagory'=>'required|array|min:1',
                'catagory.*.name'=>'required',
                'catagory.*.abbr'=>'required',
    
            ];
        }
    }
    
  
}
