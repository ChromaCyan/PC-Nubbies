<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
<<<<<<< HEAD
=======
            'gender' => ['nullable', 'integer', 'between:0,1'],
            'age_range' => ['nullable', 'integer', 'between:1,5'],
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
        ];
    }
}
