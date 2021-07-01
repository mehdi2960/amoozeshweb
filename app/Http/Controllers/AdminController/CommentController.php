<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.productComments.index', compact('product'));
    }

    public function edit(Comment $comment)
    {
        return view('admin.productComments.edit', compact('comment'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'status' => '1'
        ]);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
