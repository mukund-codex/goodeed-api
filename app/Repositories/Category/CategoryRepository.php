<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategory(): array
    {
        $data = $this->category->all();
        return [
            'route' => 'admin.category',
            'data' => $data
        ];

    }

    public function createCategory(array $data): array
    {
        if ( $this->category->create($data) ) {
            return [
                'route' => 'admin.category',
                'status' => 'success',
                'message' => 'Category Created successfully.'
            ];
        }

        return [
            'route' => 'admin.category',
            'status' => 'fail',
            'message' => 'Fail to add category, try again!'
        ];
    }
}
