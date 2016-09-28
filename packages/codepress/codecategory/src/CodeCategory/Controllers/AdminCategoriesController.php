<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class AdminCategoriesController extends Controller
{
    private $response;
    private $category;

    /**
     * AdminCategoriesController constructor.
     * @param ResponseFactory $response
     * @param Category $category
     */
    public function __construct(ResponseFactory $response, Category $category)
    {

        $this->response = $response;
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->pluck('name', 'id');
        return $this->response->view('codecategory::create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->category->create($request->all());
        return $this->response->redirectToRoute('admin.categories.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->pluck('name', 'id');
        return $this->response->view('codecategory::edit', [
            'category' => $category->find($id),
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|between:2,255',
            'active' => 'in:on',
            'parent_id' => 'exists:codepress_categories,id'
        ]);

        $data = $request->all();
        $data['active'] = $request->has('active');
        $this->category
            ->find($request->input('id'))
            ->update($data);
        return $this->response->redirectToRoute('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();
        return $this->response->redirectToRoute('admin.categories.index');
    }
}