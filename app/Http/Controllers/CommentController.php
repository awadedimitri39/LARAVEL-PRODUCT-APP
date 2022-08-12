<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::where('name',$request->product_name)->first();
        Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id, 
            'content' => $request->comment_body
        ]);
        return redirect()->back()->with('message','Comment added with success');
    }

    public function getCommentsByUserId($id)
    {
        $user = User::find($id);
        return view('comment.show',compact('user'));
    }
}