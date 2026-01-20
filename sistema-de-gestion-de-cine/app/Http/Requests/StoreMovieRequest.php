<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'genre' => 'required|string|max:100',
            'director_id' => 'required|exists:directors,id',
            'poster' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Izenburua derrigorrezkoa da',
            'description.required' => 'Deskribapena derrigorrezkoa da',
            'release_date.required' => 'Argitaratze data derrigorrezkoa da',
            'duration.required' => 'Iraupena derrigorrezkoa da',
            'director_id.required' => 'Zuzendaria hautatu behar da',
            'poster.image' => 'Kartela irudi bat izan behar da',
        ];
    }
}
