<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NameRule;
class ExampleCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this->all());
        return [
            'name' => ['required','string',],
            'content' => 'required|string',
            'status' => 'required|string',
            'photo' => 'required|image',
            'show' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Title',
            'content' => 'Content text',
            'photo' => 'Photo',
        ];
    }


}
