<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
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
            'nisn' => 'required|unique:siswas,nisn,'. $this->siswa->id .',id|digits:10',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'alamat' => 'required',
        ];
    }
}
