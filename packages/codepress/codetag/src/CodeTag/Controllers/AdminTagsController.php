<?php

namespace CodePress\CodeTag\Controllers;

use Illuminate\Http\Request;
use CodePress\CodeTag\Models\Tag;
use Illuminate\Routing\ResponseFactory;

class AdminTagsController extends Controller
{
    private $model;
    /**
     * @var ResponseFactory
     */
    private $response;

    /**
     * AdminTagController constructor.
     * @param Tag $model
     */
    public function __construct(Tag $model, ResponseFactory $response)
    {
        $this->model = $model;
        $this->response = $response;
    }

    public function index()
    {
        $tags = $this->model->all();

        return $this->response->view('codetag::index', compact('tags'));
    }

    public function create()
    {
        return $this->response->view('codetag::create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|between:2,255|unique:codepress_tags'
        ]);

        $this->model->create($request->all());
        return $this->response->redirectToRoute('admin.tags.index');
    }

    public function edit($id)
    {
        $tag = $this->model->find($id);
        return $this->response->view('codetag::edit', compact('tag'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $this->model->find($id)->update($request->all());

        return $this->response->redirectToRoute('admin.tags.index');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return $this->response->redirectToRoute('admin.tags.index');
    }
}