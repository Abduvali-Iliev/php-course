<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsersCreateRequest extends FormRequest
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
        return [
            'name' => ['required', 'min:3', 'max:128', 'string'],
            'lastname' => ['required', 'min:3', 'max:128', 'string'],
            'email' => ['required', 'min:6', 'email', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'password' => ['required',  'max:128', Password::min(6)->letters()->numbers()],
            'description' => ['max:2048', "not_regex:/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+>/"],
            'sex' => ['required'],
            'state' => ['required'],
            'user_activity' => ['required'],
            'url' => ['url'],
            'dob' => ['required', 'date'],
            'picture' => ['image']
        ];
    }

    public function messages()
    {
        return[
            "picture.image" => 'Выбранный файл не является картинкой',
            "dob.required" => 'Поле должно быть заполнено',
            "dob.date" => 'Поле должно быть валидной датой',

            'url.url' => 'URL адрес должен быть валидным',

            'sex.required' => 'Поле должно быть выбранно',
            'state.required' => 'Поле должно быть заполнено',
            'user_activity.required' => 'Поле должно быть выбранно',

            'description.max' => 'Поле должно быть не более 128 символов',
            'description.not_regex' => 'Поле не должно содержать теги HTML',

            'password.required' => 'Поле должно быть заполнено',
            'password.max' => 'Поле должно быть не более 128 символов',

            "email.email" => 'Поле должно быть валидным email адресом',
            'email.min' => 'Поле должно быть не менее шести символов',
            "email.required" => 'Поле должно быть заполнено',

            "name.required" => 'Поле должно быть заполнено',
            "name.min" => 'Поле должно быть не менее трех символов',
            "name.max" => 'Поле должно быть не более 128 символов',
            "name.string" => 'Поле должно быть не более 128 символов',

            'lastname.required' => 'Поле должно быть заполнено',
            "lastname.min" => 'Поле должно быть не менее трех символов',
            "lastname.max" => 'Поле должно быть не более 128 символов',
            "lastname.string" => 'Поле должно быть не более 128 символов',
        ];
    }
}
