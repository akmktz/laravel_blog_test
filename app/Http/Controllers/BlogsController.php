<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $blogsList = $this->repository->paginate((int)$request->get('per_page', 10));

        return response()->json($blogsList);
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
        $response = $this->repository->find($id);

        return response()->json($response);
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
        $response = $this->repository->create($request->validated());

        return response()->json($response, 201);
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

        $response = $this->repository->update($attributes, $id);

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
        ], 200);
    }
}
