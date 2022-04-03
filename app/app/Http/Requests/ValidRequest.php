<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        нужна авторизация
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/|min:3|max:24',
            'subject' => 'required|min:3|max:30',
            'review' => 'required|min:3|max:600',
            'email' => 'required|email|min:6|max:27'
        ];
    }

    //-------------Изменение одного поля errors---------------

    /*    public function attributes()
        {
            return [
                'name' => 'Имя',
                'subject' => 'Тема',
                'review' => 'Обзор',
            ];
        }*/

    //-------------Изменение вывода текста errors по условию---

    public function messages()
    {
        return [
            'name.required' => 'Вы не ввели Имя',
            'name.min' => 'Вы ввели менее 3 символов',
            'name.max' => 'Вы ввели более 25 символов',
        ];
    }
}
