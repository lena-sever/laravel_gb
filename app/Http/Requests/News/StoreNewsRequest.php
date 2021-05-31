<?php

namespace App\Http\Requests\News;

use App\Rules\CorrectWords;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:10', 'max:100', new CorrectWords],
            'description' => ['required', 'string', 'min:5','max:50000', new CorrectWords],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'source_id' => ['required', 'integer', 'exists:sources,id']
        ];
    }
}
