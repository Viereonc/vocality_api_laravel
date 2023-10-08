<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
            'album_id_foreign' => 'required',
            'song_name' => 'required',
            'song_duration' => 'required',
            'song_file_url' => 'required',
            'song_image_url' => 'nullable' 
        ];
    }
}
