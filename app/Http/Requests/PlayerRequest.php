<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\alpha_num_check;

class PlayerRequest extends FormRequest
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
            'player_no' => new alpha_num_check,
            // 'player_no' => Rule::unique('players')->where(function ($query) {
            //     return $query->where('id', 1);
            // })
            // 'player_no' => 'required|integer|unique:players|max:100',
            // 'player_name' => 'required|string|unique:players|max:20|',
        ];
    }
}
