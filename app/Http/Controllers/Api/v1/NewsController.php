<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsDeleteRequest;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->newsService->getAll($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $data = $request->validated();
        return $this->newsService->save($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->newsService->getById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        return $this->newsService->update($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsDeleteRequest $request, string $id)
    {
        return $this->newsService->deleteById($id);
    }
}
