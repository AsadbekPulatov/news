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
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'description' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $post = $this->categoryReporitory->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update post data');
        }

        DB::commit();

        return $post;

    }


    public function deleteById($id)
    {
        return $this->categoryReporitory->delete($id);
    }
}
