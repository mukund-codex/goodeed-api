<?php

namespace App\Repositories\Vendor;

use App\Mail\VerificationMail;
use App\Models\Vendor;
use App\Models\VerificationToken;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function create(array $data): RedirectResponse
    {
        $vendor = $this->vendor->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number' => $data['mobile_number'],
            'type' => config('constants.USER_TYPE.RESTAURANT'),
        ]);

        if($vendor) {

            $token = base64_encode(Str::random(60));
            VerificationToken::create([
                'user_type' => config('constants.USER_TYPE.VENDOR'),
                'email' => $data['email'],
                'token' => $token
            ]);

            $actionLink = route('vendors.verify', ['token' => $token]);

            if( Mail::to($data['email'])->send(new VerificationMail($actionLink, $data['name']) )) {
                return redirect()->route('vendors.register-success')->with('success', 'Vendor registered successfully. Please verify your email address');
            }

            return redirect()->route('vendors.register')->with('fail', 'Failed to send verification email');
        }

        return redirect()->route('vendors.register')->with('fail', 'Failed to register vendor');
    }

    public function verify(string $token): RedirectResponse
    {
        $verificationToken = VerificationToken::where('token', $token)->first();
        if ($verificationToken) {
            $vendor = $this->vendor->where('email', $verificationToken->email)->first();

            if ($vendor->is_email_verified) {
                return redirect()->route('vendors.login')
                    ->with('info', 'Your email is already verified. Please login to continue.');
            }

            $vendor->is_email_verified = true;
            $vendor->email_verified_at = now();
            $vendor->is_active = true;
            $vendor->status = config('constants.STATUS.ACTIVE');
            $vendor->update();
            return redirect()->route('vendors.login')
                ->with('success', 'Email verified successfully. Please login to continue.');
        }
        return redirect()->route('vendors.register')->with('fail', 'Invalid token.');
    }

    public function loginHandler(array $data): array
    {
        if ( Auth::guard('vendor')->attempt($data) ) {
            if ( !auth('vendor')->user()->is_email_verified && auth('vendor')->user()->status != config('constants.STATUS.ACTIVE') ){
                auth('vendor')->logout();
                return [
                    'route' => 'vendors.login',
                    'status' => 'fail',
                    'message' => 'Please verify your email address before login. Check your email for verification link.'
                ];
            }
            return [
                'route' => 'vendors.dashboard',
                'status' => 'success',
                'message' => 'Logged in successfully'
            ];
        }

        return [
            'route' => 'vendors.login',
            'status' => 'fail',
            'message' => 'Invalid credentials'
        ];
    }
}
