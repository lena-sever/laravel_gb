<?php

namespace App\Http\Requests\News;

use App\Rules\CorrectWords;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title' => ['string', 'min:5', 'max:100', new CorrectWords],
            'description' => ['string', 'min:5', 'max:50000', new CorrectWords],
            'category_id' => ['integer', 'exists:categories,id'],
            'source_id' => ['integer', 'exists:sources,id'],
            'rating' => ['integer', 'min:1', 'max:55']
        ];
    }
}
