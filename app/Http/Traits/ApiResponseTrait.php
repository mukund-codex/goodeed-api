<?php

namespace App\Http\Traits;

use App\Exceptions\ApiException;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    private $errors;

    private $message;

    private $http_code;

    public function createJsonResponse($result, $message = ''): array
    {
        return [
            'data' => $result,
            'message' => $message,
        ];
    }

    public function showSuccessResponse($data_set, $message, $http_code): JsonResponse
    {
        $response_data = $this->createJsonResponse($data_set, $message);
        return new JsonResponse($response_data, $http_code);
    }

    /**
     * @throws ApiException
     */
    public function sendErrorResponse($data_set, $message, $http_code)
    {
        throw new ApiException($data_set, $message, $http_code);
    }

    public function showFailureRequest(array $data_set, string $message, int $http_code = 404): JsonResponse
    {
        $response_data = $this->createJsonResponse($data_set, $message);
        return new JsonResponse($response_data, $http_code);
    }
}
