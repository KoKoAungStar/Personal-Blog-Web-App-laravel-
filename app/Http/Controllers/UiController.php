<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Project;
use App\StudentCount;
use App\Category;
use App\Comment;
use App\LikesDislike;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class UiController extends Controller
{
    public function index(){
        $projects = Project::all();
        $skills = Skill::paginate(10);
        $studentCount = StudentCount::find(1);
        $posts = Post::latest()->take(6)->get();
        return view('ui-panel.index', compact('skills', 'projects', 'studentCount', 'posts'));
    }
    public function postsIndex(){
        $posts = Post::latest()->paginate(10);
        $categories = Category::all();
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
    public function postDetailsIndex($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();
        $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        $comments = Comment::where('post_id', $id)->where('status','show')->get();
        return view('ui-panel.post-details', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }
    public function search(Request $request){
        $categories = Category::all();
        $searchData = $request->search_data;
        $posts = Post::where('title', 'like', '%'.$searchData.'%')
        ->orWhere('content', 'like', '%'.$searchData.'%')
        ->orWhereHas('category', function($category)use($searchData){
            $category->where('name', 'like', '%'.$searchData.'%');
        })
        ->paginate(10);
        return view('ui-panel.posts', compact('posts', 'categories'));
    }
    public function searchByCategory($catId){
        $categories = Category::all();
        $posts = Post::where('category_id', $catId)->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
}
