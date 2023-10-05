<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'artist_id_foreign' => 'required',
            'album_name' => 'required',
            'album_created' => 'nullable',
            'album_image_url' => 'nullable',
            'album_banner_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
