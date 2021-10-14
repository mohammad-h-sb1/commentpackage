<?php

namespace Saberycategory\Cms\App\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sabery\Package\models\Product;
use Saberycategory\Cms\App\Models\Category;
use Saberycategory\Cms\App\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::query()->paginate(request('limit'));
        return response()->json([
            'status'=>'ok',
            'data'=>CategoryResource::collection($category)
        ]);
    }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required|string|max:50',
            'description'=>'string',
            'product'=>'array|exists:products,id'
        ]);
        $data=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $category=Category::create($data);
        $category->products()->sync($request->input('product'));

        return response()->json([
            'status'=>'ok',
            'data'=>new CategoryResource($category)
        ],201);
    }

    public function show($id)
    {
        $category=Category::query()->where('id',$id)->first();
        return response()->json([
            'status'=>'ok',
            'data'=>new CategoryResource($category)
        ]);
    }
    public function edit($id)
    {
        $category=Category::query()->where('id',$id)->first();
        return response()->json([
            'status'=>'ok',
            'data'=>new CategoryResource($category)
        ]);
    }

    public function update(Request $request,$id)
    {
        $category=Category::query()->where('id',$id)->first();
        $validate=$request->validate([
            'name'=>'required|string|max:50',
            'description'=>'string',
            'product'=>'array|exists:products,id'
        ]);
        $data=[
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $category->update($data);
        $category->products()->sync($request->input('product'));
   }

    public function delete($id)
    {
        $category=Category::query()->where('id',$id)->first();
        $category->delete();
    }
}
