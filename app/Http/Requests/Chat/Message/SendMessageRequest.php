<?php

namespace App\Http\Requests\Chat\Message;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'max:255'
            ]
        ];
    }
}
