<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'user_id'=>'require|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png|max:2048', 
            'name' => 'required|string|max:100', 
            'berat' => 'required|integer', 
            'harga' => 'required|integer', 
            'stock' => 'required|integer', 
            'kondisi' => 'required|in:baru,bekas', 
            'description' => 'required|string|max:200', 
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Gambar tidak boleh kosong.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'File gambar harus dalam format jpeg atau png.',
            'image.max' => 'Ukuran file gambar maksimum adalah 2MB.',
            'name.required' => 'Nama tidak boleh kosong.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimum :max karakter.',
            'berat.required' => 'Berat tidak boleh kosong.',
            'berat.integer' => 'Berat harus berupa bilangan bulat.',
            'harga.required' => 'Harga tidak boleh kosong.',
            'harga.integer' => 'Harga harus berupa bilangan bulat.',
            'stock.required' => 'Stok tidak boleh kosong.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'kondisi.required' => 'Kondisi tidak boleh kosong.',
            'kondisi.in' => 'Kondisi harus salah satu dari "baru" atau "bekas".',
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi maksimum :max karakter.',
        ];
    }
}
