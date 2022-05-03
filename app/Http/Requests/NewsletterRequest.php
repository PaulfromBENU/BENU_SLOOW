<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'newsletter_first_name' => 'string|required|min:2|max:50',
            'newsletter_last_name' => 'string|required|min:2|max:50',
            'newsletter_email' => 'email|required',
        ];
    }
}
