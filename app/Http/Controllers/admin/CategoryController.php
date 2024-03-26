<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    private CategoryRepository $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index(): RedirectResponse
    {
        $res = $this->category->getAllCategory();
        return redirect()->route($res['route'])->with('data', $res['data']);
    }

    public function categoryHandler(AddCategoryRequest $request): RedirectResponse
    {
        $res = $this->category->createCategory($request->validated());
        return redirect()->route($res['route'])->with($res['status'], $res['message']);
    }
}
