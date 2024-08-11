<?php

namespace App\Repositories;

use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Services\UploadFile;

class NewsRepository
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getAll($params)
    {
        $news = $this->news->with('author', 'category')->filter($params)->get();
        return NewsResource::collection($news);
    }

    public function getById($id)
    {
        return $this->news
            ->where('id', $id)
            ->get();
    }

    public function save($data)
    {
        $data['img'] = UploadFile::uploadFile($data['img'], 'news');
        return $this->news->create($data);
    }

    public function update($data, $id)
    {
        $old = $this->news->find($id);
        if (isset($data['img'])) {
            if (isset($old['img']))
                $data['img'] = UploadFile::updateFile($old['img'], $data['img'], 'news');
            else
                $data['img'] = UploadFile::uploadFile($data['img'], 'news');
        }
        return $old->update($data);
    }

    public function delete($id)
    {
        return $this->news->find($id)->delete();
    }
}
