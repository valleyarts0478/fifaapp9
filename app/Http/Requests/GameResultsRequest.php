<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\num_only;

class GameResultsRequest extends FormRequest
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
            'total_goal' => ['nullable', new num_only],
            //     'goals.*' => ['nullable', new num_only],
            //     'assists.*' => ['nullable', new num_only]
        ];
    }
}
