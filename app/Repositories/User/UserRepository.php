<?php

namespace App\Repositories\User;

use App\Http\Services\SMSHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login(array $data): User
    {
        $user = $this->user->where('mobile_number', $data['mobile_number'])->first();
        $otp = rand(1000, 9999);
        if ($user) {
            $user->token = Str::random(60);
            $user->otp = $otp;
            $user->otp_verified_at = null;
            $user->update();
        }

        if (! $user) {
            $user = $this->user->create([
                'mobile_number' => $data['mobile_number'],
                'otp' => $otp,
                'token' => Str::random(60),
                'type' => config('constants.USER_TYPE.CUSTOMER')
            ]);
        }

        $user->token = $user->createToken(config('constants.TOKEN.WEB'))->plainTextToken;
        $user->token_type = config('constants.TOKEN_TYPE.BEARER');

//        SMSHelper::class::sendSMS($request->mobile_number, $otp);

        return $user;
    }

    public function verifyOtp(array $data): User
    {
        $userData = Auth::user();
        $user = $this->user->where('id', $userData['id'])->first();
        if ($user->otp == $data['otp']) {
            $user->otp = null;
            $user->otp_verified_at = now();
            $user->update();
        }
        $user->token = $user->createToken(config('constants.TOKEN.WEB'))->plainTextToken;
        $user->type = config('constants.TOKEN_TYPE.BEARER');

        return $user;
    }
    public function updateFields(int $id, array $values): bool|int
    {
        return $this->user
            ->where('id', $id)
            ->update($values);
    }

    public function getUserProfile(int $id): User
    {
        return $this->user->find($id);
    }

    public function updateUserProfile(int $id, array $data): User
    {
        $user = $this->user->find($id);
        $user->update($data);
        return $user;
    }
}
