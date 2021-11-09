<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Repositories\BlogRepository;

/**
 * Class BlogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BlogsController extends Controller
{
    /**
     * @var BlogRepository
     */
    protected $repository;

    /**
     * BlogsController constructor.
     *
     * @param BlogRepository $repository
     */
    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogsList = $this->repository->paginate();

        return response()->json([
            'data' => $blogsList,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogItem = $this->repository->find($id);

        return response()->json([
            'data' => $blogItem,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(BlogCreateRequest $request)
    {
        $blogItem = $this->repository->create($request->validated());

        $response = [
            'message' => 'Blog created.',
            'data' => $blogItem,
        ];

        return response()->json($response);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param BlogUpdateRequest $request
     * @param string $id
     *
     * @return Response
     *
     */
    public function update(BlogUpdateRequest $request, $id)
    {
        $attributes = $request->validated();
        unset($attributes['user_id']);

        $blogItem = $this->repository->update($attributes, $id);

        $response = [
            'message' => 'Blog updated.',
            'data' => $blogItem,
        ];

        return response()->json($response);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
            'message' => 'Blog deleted.',
            'deleted' => $deleted,
        ]);
    }
}
