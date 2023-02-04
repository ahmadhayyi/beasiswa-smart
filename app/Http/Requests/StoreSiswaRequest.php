<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nisn' => 'required|unique:siswas,nisn|digits:10',
            'jurusan_id' => 'required',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'alamat' => 'required',
        ];
    }
}
