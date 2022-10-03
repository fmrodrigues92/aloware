<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDO;

class PostController extends Controller
{
    private function data($post_id, $parent = null){

        return DB::query()
                        ->from('comments')
                        ->where('post_id', $post_id)
                        ->where('parent_id', $parent)
                        ->get();
    }

    public function post($slug){

        $post = DB::query()->from('posts')->where('slug', $slug)->first();
        
        if($post == null){
            return abort(404);
        }

        $comments = $this->data($post->id);

        // Level 2
        foreach($comments as &$comment){
            $comment->comments = $this->data($post->id, $comment->id);
            foreach($comment->comments as &$comment2){
                $comment2->comments = $this->data($post->id, $comment2->id);
                
            }
        }

        return view('post', compact('post', 'comments'));
    }

    public function postComment(Request $request, $slug){

        $post = DB::table('posts')->where('slug', $slug)->first();
        
        if($post == null){
            return abort(404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'comment' => 'required|string',
            'parent_id' => 'nullable|integer',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $validated = $validator->validated();

        if(isset($validated['parent_id'])){
            $pid = $validated['parent_id'];
            $check = DB::query()->from('comments')->where('id', $validated['parent_id'])->first();
            if($check->parent_id == null){
                $pid = $validated['parent_id'];
            }else{
                $pid = $check->parent_id;
            }
        }else{
            $pid = null;
        }

        $validated['post_id'] = $post->id;
        $validated['parent_id'] = $pid;

        $comment = DB::table('comments')->insert($validated);

        if($comment){
            return redirect()->back()->with('status', 'Success!');
        }else{
            return redirect()->back()->withErrors('Ops, There is a problem');
        }
    }
}
