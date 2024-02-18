<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            //'age_range' => ['required', 'integer', 'between:1,5'],
            //'gender' => ['required', 'string', 'in:1,2'], 
            //'is_seller' => ['boolean'], 
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            //'age_range' => $input['age_range'],
            //'gender' => $input['gender'], 
        ]);
    }
}
