<?php

namespace App\Repositories\Category;

interface CategoryInterface
{
    public function getAllCategory(): array;
//    public function getCategoryById(int $id);
    public function createCategory(array $data): array;
//    public function updateCategory(int $id, array $data);
//    public function deleteCategory(int $id);
}
