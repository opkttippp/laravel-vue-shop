<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:24',
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
            'name.min' => 'Вы не ввели менее 3 символов',
            'name.max' => 'Вы не ввели более 25 символов',
        ];
    }
}
