<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(){
        try {
            $posts = Post::all();
            return response()->json([
                'data' => $posts,
                'message' => 'Succeed',
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    function show($id){
        try {
            $post = Post::findOrFail($id);
            return response()->json([
                'data' => $post,
                'message' => 'Succeed',
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
