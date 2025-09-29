<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExampleUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
           'name'=>'required|string',
           'content'=>'required|string',
           'photo' => 'sometimes|nullable|image',
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
