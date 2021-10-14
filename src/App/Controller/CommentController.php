<?php

namespace Saberycategory\Cms\App\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Saberycategory\Cms\App\Models\Comment;
use Saberycategory\Cms\App\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $comment=Comment::query()->paginate(request('limit'));
        return response()->json([
            'status'=>'ok',
            'data'=>CommentResource::collection($comment)
        ]);
    }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'description'=>'required',
            'product_id'=>'required|exists:products,id'
        ]);
        $data=[
            'user_id'=>auth()->user()->id,
            'product_id'=>$validate['product_id'],
            'description'=>$request->description
        ];
        $comment=Comment::create($data);
        return response()->json([
            'status'=>'ok',
            'data'=>new CommentResource($comment)
        ],201);
    }

    public function show($id)
    {
        $comment=Comment::query()->where('id',$id)->first();
        return response()->json([
            'status'=>'ok',
            'data'=>new CommentResource($comment)
        ]);

    }
    public function edit($id)
    {
        $comment=Comment::query()->where('id',$id)->where('user_id',auth()->user()->id)->first();
        if ($comment){
            return response()->json([
                'status'=>'ok',
                'data'=>new CommentResource($comment)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'مشادسترسی ندارید'
            ],403);
        }
    }

    public function update(Request $request ,$id)
    {
        $validate=$request->validate([
            'description'=>'required|string',
        ]);
        $comment=Comment::query()->where('id',$id)->where('user_id',auth()->user()->id)->first();
        if ($comment){
            $comment->update($validate);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شمادسترسی ندارید'
            ],403);
        }
    }

    public function delete($id)
    {
        $comment=Comment::query()->where('id',$id)->where('user_id',auth()->user()->id)->first();
        if ($comment){
            $comment->delete();
        }
        else{
            return response()->json([
                'status'=>'ok',
                'massage'=>'شمادست رسی ندارید'
            ],403);
        }
    }
}
