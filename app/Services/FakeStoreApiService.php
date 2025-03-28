<?php

namespace App\Services;

use App\Services\Contracts\ProductInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class FakeStoreApiService implements ProductInterface
{
    protected $baseUrl = 'https://fakestoreapi.com';

    public function addProduct(array $data): JsonResponse
    {
        $response = Http::post("{$this->baseUrl}/products", $data);
        return response()->json($response->json(), $response->status());
    }

    public function getAllProduct(): JsonResponse
    {
        $response = Http::get("{$this->baseUrl}/products");
        return response()->json($response->json(), $response->status());
    }

    public function getSingleProduct($id): JsonResponse
    {
        $response = Http::get("{$this->baseUrl}/products/{$id}");
        return response()->json($response->json(), $response->status());
    }
}
