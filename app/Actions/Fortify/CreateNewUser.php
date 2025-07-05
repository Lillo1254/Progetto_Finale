<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/@.*\.(it|com|outlook)$/i',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ], [
            'email.regex' => 'L\'email deve terminare con .it, .com , .outlook o .pec',
        ],[
    'password.regex' => 'La password deve contenere almeno una lettera maiuscola, una minuscola, un numero e un simbolo.',
    'password.confirmed' => 'Le password non coincidono.',
])->validate();
                                                                                                                                              
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
