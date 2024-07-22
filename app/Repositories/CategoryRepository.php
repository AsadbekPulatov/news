<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function getAll()
    {
        return $this->category->get();
    }

    public function getById($id)
    {
        return $this->category
            ->where('id', $id)
            ->get();
    }

    public function save($data)
    {
        return $this->category->create($data);
    }


    public function update($data, $id)
    {
        return $this->category->find($id)->update($data);
    }


    public function delete($id)
    {
        return $this->category->find($id)->delete();
    }
}
