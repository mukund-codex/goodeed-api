<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VendorRepository implements VendorInterface
{
    private Vendor $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function login(array $data): Vendor
    {
        $vendor = $this->vendor->where('mobile_number', $data['mobile_number'])->first();
        $otp = rand(1000, 9999);
        if ($vendor) {
            $vendor->token = Str::random(60);
            $vendor->otp = $otp;
            $vendor->otp_verified_at = null;
            $vendor->type = config('constants.USER_TYPE.RESTAURANT');
            $vendor->update();
        }

        if (! $vendor) {
            $vendor = $this->vendor->create([
                'mobile_number' => $data['mobile_number'],
                'otp' => $otp,
                'token' => Str::random(60),
                'type' => config('constants.USER_TYPE.RESTAURANT')
            ]);
        }

        $vendor->token = $vendor->createToken(config('constants.TOKEN.WEB'))->plainTextToken;
        $vendor->token_type = config('constants.TOKEN_TYPE.BEARER');

//        SMSHelper::class::sendSMS($request->mobile_number, $otp);

        return $vendor;
    }

    public function verifyOtp(array $data): Vendor
    {
        $vendorData = Auth::user();
        $vendor = $this->vendor->where('id', $vendorData['id'])->first();
        if ($vendor->otp == $data['otp']) {
            $vendor->otp = null;
            $vendor->otp_verified_at = now();
            $vendor->is_active = true;
            $vendor->status = config('constants.STATUS.ACTIVE');
            $vendor->is_mobile_verified = true;
            $vendor->update();
        }
        $vendor->token = $vendor->createToken(config('constants.TOKEN.WEB'))->plainTextToken;
        $vendor->type = config('constants.TOKEN_TYPE.BEARER');

        return $vendor;
    }
}
