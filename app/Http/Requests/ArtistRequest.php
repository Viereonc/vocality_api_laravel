<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'artist_name' => 'required',
            'artist_country' => 'required',
            'artist_debut' => 'required',
            'artist_image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
