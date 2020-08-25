<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        //Logica abaixo implementada com FormRequest
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token not found'], 404);
        // }

        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);

        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if (!$category = $this->categoryService->getCategoryByUuid($identify)) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return new CategoryResource($category);
    }
}
