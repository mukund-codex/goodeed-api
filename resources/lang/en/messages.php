<?php

$messages = [
    'user' => [
        'login' => [
            'success' => 'User logged in successfully',
            'failure' => 'User login failed',
        ],
        'logout' => [
            'success' => 'User logged out successfully',
            'failure' => 'User logout failed',
        ],
        'profile' => [
            'success' => 'User profile updated successfully',
            'failure' => 'User profile update failed',
        ],
    ],
    'address' => [
        'add' => [
            'success' => 'Address added successfully',
            'failure' => 'Address add failed',
        ],
        'update' => [
            'success' => 'Address updated successfully',
            'failure' => 'Address update failed',
        ],
        'delete' => [
            'success' => 'Address deleted successfully',
            'failure' => 'Address delete failed',
        ],
        'get' => [
            'success' => 'Address fetched successfully',
            'failure' => 'Address fetch failed',
        ],
    ],
    'otp' => [
        'success' => 'OTP verified successfully',
        'failure' => 'OTP verification failed',
    ],
    'validation' => [
        'mobile_number' => [
            'required' => 'Mobile number is required',
            'integer' => 'Mobile number should be numeric',
            'digits' => 'Mobile number should be 10 digits',
        ],
        'otp' => [
            'required' => 'OTP is required',
            'integer' => 'OTP should be numeric',
            'digits' => 'OTP should be 4 digits',
            'exists' => 'Invalid OTP',
        ],
        'name' => [
            'required' => 'Name is required',
            'string' => 'Name should be string',
            'max' => 'Name should be less than 255 characters',
        ],
        'email' => [
            'required' => 'Email is required',
            'string' => 'Email should be string',
            'email' => 'Invalid email format',
            'max' => 'Email should be less than 255 characters',
            'unique' => 'Email already exists',
        ],
        'age' => [
            'required' => 'Age is required',
            'integer' => 'Age should be numeric',
        ],
        'city' => [
            'required' => 'City is required',
            'string' => 'City should be string',
            'max' => 'City should be less than 255 characters',
        ],
        'address_line_1' => [
            'required' => 'Address line 1 is required',
            'string' => 'Address line 1 should be string',
            'max' => 'Address line 1 should be less than 255 characters',
        ],
        'address_line_2' => [
            'string' => 'Address line 2 should be string',
            'max' => 'Address line 2 should be less than 255 characters',
        ],
        'landmark' => [
            'string' => 'Landmark should be string',
            'max' => 'Landmark should be less than 255 characters',
        ],
        'state' => [
            'required' => 'State is required',
            'string' => 'State should be string',
            'max' => 'State should be less than 255 characters',
        ],
        'pincode' => [
            'required' => 'Pincode is required',
            'integer' => 'Pincode should be numeric',
            'digits' => 'Pincode should be 6 digits',
        ],
        'type' => [
            'required' => 'Type is required',
            'in' => 'Invalid type',
        ],
        'other_type' => [
            'required_if' => 'Other type is required',
            'max' => 'Other type should be less than 255 characters',
        ],
        'is_default' => [
            'boolean' => 'Invalid is default',
        ],
        'address' => [
            'id' => [
                'required' => 'Address id is required',
                'integer' => 'Address id should be numeric',
                'exists' => 'Invalid address id',
            ],
        ]
    ],
];

return $messages;
