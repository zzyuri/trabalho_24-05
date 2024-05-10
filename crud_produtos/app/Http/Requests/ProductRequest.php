<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
        // dd(Auth::user());
        return [
            'name' => ['required', 'string', 'max:80'],
            'description' => ['required', 'string'],
            'price' => ['required', 'decimal:2'],
            'quantity' => ['required', 'integer'],
            // 'id_user' => Auth::user()->id
            'id_user' => 1
        ];
    }
}
