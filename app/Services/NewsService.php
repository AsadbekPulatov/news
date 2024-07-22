<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService
{
    protected $newsReporitory;

    public function __construct(NewsRepository $newsReporitory)
    {
        $this->newsReporitory = $newsReporitory;
    }

    public function getAll()
    {
        return $this->newsReporitory->getAll();
    }

    public function getById($id)
    {
        return $this->newsReporitory->getById($id);
    }

    public function save($data)
    {
        return $this->newsReporitory->save($data);
    }

    public function update($data, $id)
    {
        return $this->newsReporitory->update($data, $id);
    }

    public function deleteById($id)
    {
        return $this->newsReporitory->delete($id);
    }
}
