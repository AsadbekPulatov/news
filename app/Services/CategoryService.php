<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryReporitory;

    public function __construct(CategoryRepository $categoryReporitory)
    {
        $this->categoryReporitory = $categoryReporitory;
    }

    public function getAll()
    {
        return $this->categoryReporitory->getAll();
    }

    public function getById($id)
    {
        return $this->categoryReporitory->getById($id);
    }

    public function save($data)
    {
        return $this->categoryReporitory->save($data);
    }

    public function update($data, $id)
    {
        return $this->categoryReporitory->update($data, $id);
    }

    public function deleteById($id)
    {
        return $this->categoryReporitory->delete($id);
    }
}
