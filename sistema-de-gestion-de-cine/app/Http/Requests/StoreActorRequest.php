<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class StoreActorRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:100',
            'biography' => 'nullable|string|max:5000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
'name.required' => 'El nombre es obligatorio',
'name.string' => 'El nombre debe ser una cadena de texto',
'name.max' => 'El nombre debe tener un máximo de 255 caracteres',

'surname.required' => 'El apellido es obligatorio',
'surname.string' => 'El apellido debe ser una cadena de texto',
'surname.max' => 'El apellido debe tener un máximo de 255 caracteres',

'birth_date.required' => 'La fecha de nacimiento es obligatoria',
'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida',

'nationality.required' => 'La nacionalidad es obligatoria',
'nationality.string' => 'La nacionalidad debe ser una cadena de texto',
'nationality.max' => 'La nacionalidad debe tener un máximo de 100 caracteres',

'biography.string' => 'La biografía debe ser un texto string',
'biography.max' => 'La biografía debe tener un máximo de 100 caracteres',
'biography.max' => 'La biografía debe tener un máximo de 100 caracteres',

'photo.image' => 'La foto debe ser una imagen',
'photo.mimes' => 'La foto debe estar en formato JPEG, PNG, JPG o GIF',
'photo.max' => 'La foto tiene un tamaño máximo de 2 MB',
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'izena',
            'surname' => 'abizenak',
            'birth_date' => 'sortzea eguna',
            'nationality' => 'nazionalitatea',
            'biography' => 'biografía',
            'photo' => 'argazkia',
        ];
    }
}
