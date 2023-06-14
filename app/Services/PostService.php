<?php

namespace App\Services;

use App\Models\Post;

class PostService {

    public function getAll()
    {
        try {

            $post = Post::all();

            $response = [
                'success' => true,
                'status' => 200,
                'message' => 'Data Recieved Successfully',
                'data' => $post
            ];

        } catch (\Throwable $th) {

            $response = [
                'success' => false,
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }

        return $response;
    }

    public function getOne($id)
    {
        try {

            //Check Post Exist
            $post_count = Post::where('id', $id)->count();

            if($post_count > 0){

                $post = Post::where('id', $id)->first();

                $response = [
                    'success' => true,
                    'status' => 200,
                    'message' => 'Data Recieved Successfully',
                    'data' => $post
                ];


            }else{
                $response = [
                    'success' => false,
                    'status' => 404,
                    'message' => 'Data Not Found',
                    'data' => null
                ];


            }

        } catch (\Throwable $th) {

            $response = [
                'success' => false,
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }

        return $response;
    }

    public function addPost(object $request)
    {
        try {

            $post = Post::create($request->all());

            $response = [
                'success' => true,
                'status' => 201,
                'message' => 'Data Created Successfully',
                'data' => $post
            ];


        } catch (\Throwable $th) {

            $response = [
                'success' => false,
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }

        return $response;
    }

    public function updatePost(object $request, $id)
    {
        try {

            $post = Post::find($id)->update($request->all());

            $response = [
                'success' => true,
                'status' => 200,
                'message' => 'Data Updated Successfully',
                'data' => $post
            ];


        } catch (\Throwable $th) {

            $response = [
                'success' => false,
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }

        return $response;
    }

    public function deletePost($id)
    {
        try {

            Post::find($id)->delete();

            $response = [
                'success' => true,
                'status' => 200,
                'message' => 'Data Deleted Successfully',
                'data' => null
            ];


        } catch (\Throwable $th) {

            $response = [
                'success' => false,
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ];
        }

        return $response;
    }

}
