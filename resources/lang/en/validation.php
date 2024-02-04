<?php

$validations = [
    'mobile_number' => [
        'required' => 'Mobile number is required',
        'numeric' => 'Mobile number should be numeric',
        'digits' => 'Mobile number should be 10 digits',
    ],
];

return $validations;
