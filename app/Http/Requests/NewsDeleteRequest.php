<?php

namespace App\Http\Requests;

use App\Rules\UpdateNewsAuthor;
use Illuminate\Foundation\Http\FormRequest;

class NewsDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'author' => auth()->id(),
            'id' => $this->news,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', new UpdateNewsAuthor],
            'author' => 'required|exists:users,id',
        ];
    }
}
