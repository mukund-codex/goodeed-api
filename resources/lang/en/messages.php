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
    'restaurant' => [
        'list' => [
            'success' => 'Restaurant fetched successfully',
            'failed' => 'Failed to fetch restaurants'
        ],
        'create' => [
            'success' => 'Restaurant added successfully',
            'failed' => 'Failed to add restaurant'
        ],
        'update' => [
            'success' => 'Restaurant updated successfully',
            'failed' => 'Failed to update restaurant'
        ],
    ],
    'dishes' => [
        'list' => [
            'success' => 'Dishes fetched successfully',
            'failed' => 'Failed to fetch dishes'
        ],
        'create' => [
            'success' => 'Dish added successfully',
            'failed' => 'Failed to add dish'
        ],
        'update' => [
            'success' => 'Dish updated successfully',
            'failed' => 'Failed to update dish'
        ],
        'get' => [
            'success' => 'Dish fetched successfully',
            'failed' => 'Failed to fetch dish'
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
        ],
        'restaurant' => [
            'name' => [
                'required' => 'Restaurant name is required',
                'string' => 'Restaurant name should be string',
                'max' => 'Restaurant name should be less than 255 characters',
            ],
            'address' => [
                'required' => 'Restaurant address is required',
                'string' => 'Restaurant address should be string',
                'max' => 'Restaurant address should be less than 255 characters',
            ],
            'phone' => [
                'required' => 'Restaurant phone is required',
                'string' => 'Restaurant phone should be string',
                'max' => 'Restaurant phone should be less than 255 characters',
            ],
            'email' => [
                'required' => 'Restaurant email is required',
                'string' => 'Restaurant email should be string',
                'email' => 'Invalid restaurant email format',
                'max' => 'Restaurant email should be less than 255 characters',
            ],
        ],
        'dishes' => [
            'id' => [
                'required' => 'Restaurant id is required',
                'integer' => 'Restaurant id should be numeric',
                'exists' => 'Invalid restaurant id',
            ],
            'name' => [
                'required' => 'Dish name is required',
                'string' => 'Dish name should be string',
                'max' => 'Dish name should be less than 255 characters',
            ],
            'description' => [
                'required' => 'Dish description is required',
                'string' => 'Dish description should be string',
                'max' => 'Dish description should be less than 255 characters',
            ],
            'price' => [
                'required' => 'Dish price is required',
                'numeric' => 'Dish price should be numeric',
            ],
            'is_active' => [
                'required' => 'Dish status is required',
                'boolean' => 'Dish status should be boolean',
            ],
            'is_veg' => [
                'required' => 'Dish type is required',
                'boolean' => 'Dish type should be boolean',
            ],
            'discount_price' => [
                'nullable' => 'Dish discount price should be nullable',
                'numeric' => 'Dish discount price should be numeric',
            ],
        ],
    ],
];

return $messages;
