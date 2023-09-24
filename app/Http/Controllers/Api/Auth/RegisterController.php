<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class RegisterController extends Controller
{
    use PasswordValidationRules;
    public function register(Request $request)
    {
        try {
            $input = $request->toArray();
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ])->validate();
    
            $user =  User::create([
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'customer_group' => 'provider',
                        'password' => Hash::make($input['password']),
                    ]);
            // Optionally, you can generate an API token here for the registered user
            $token = $user->createToken('api-token')->plainTextToken;

            $this->registerDetails($input, $user);

            return response()->json(['message' => 'User registered successfully', 'data'=>$user, 'token'=> $token], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User registrtion failed', 'data'=>[], 'token'=>''], 500);
        }
    }


    public function registerDetails($data, $user){
        UserDetail::create([
            'business_type' => $data['business_type'],
            'fullname' => $data['fullname'],
            'phone_number' => $data['phone_number'],
            'city' => $data['city'],
            'province' => $data['province'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'languages' => $data['languages'],
            'employement' => $data['employement'],
            'service' => $data['service'],
            'user_id' => $user->id,
        ]);
    }


}
