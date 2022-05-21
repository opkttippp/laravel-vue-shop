<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class ValidRequest extends FormRequest
{
    //----------перенаправление после fail valid-------------------------
//    protected $redirect = '/';


    public function authorize(): bool
    {
/*        не нужна авторизация
        return false;*/
        return true;
    }

    public static function rules(): array
    {
        return [
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/|min:3|max:24|string',
            'subject' => 'required|min:3|max:30|string',
            'review' => 'required|min:3|max:600',
            'email' => 'required|email|min:6|max:27',
//            'image' => 'sometimes'
        ];
    }

    //-------------Изменение одного поля errors---------------

    /*        public function attributes()
            {
                return [
                    'name' => 'Имя',
                    'subject' => 'Тема',
                    'review' => 'Обзор',
                ];
            }*/

    //-------------Изменение вывода текста errors по условию---

    public function messages(): array
    {
        return [
            'name.required' => 'Вы не ввели Имя',
            'name.min' => 'Вы ввели менее 3 символов',
            'name.max' => 'Вы ввели более 25 символов',
        ];
    }
}
