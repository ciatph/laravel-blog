<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Carbon\Carbon;

use App\Repositories\Posts;

class PostController extends Controller
{
    public function index(Tag $tag = null)
    {
        // $posts = Post::all();

        // order by latest post
        // Method #1: 
        // $posts = Post::latest()->get();

        /** Filter Method #1: Filter posts if there are GET month and year params */
        /*
        $posts = Post::latest();

        if($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }        

        $posts = $posts->get();
        */


        /** Filter Method #2: Shorten, see PostController:scopeFilter() */
        $posts = post::latest()
            ->filter(request(['month', 'year']))
            ->get();
        
        
        // Test: Repositories class
        /*
        $posts = new \App\Repositories\Posts;
        $posts->all();
        */

        // Method #2:
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // sidebar archives list        
        // $archives = Post::archives();
        // return view('posts.index', compact('posts', 'archives'));
        // return $archives

        // Method #3: Use view composers. See AppServiceProvider.php and Post::archives() (model)
    
        return view('posts.index', compact('posts'));
    }

    /** Method #1: find the post using id */
    /*
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    */

    /** Method #2: Route model binding. Param should be same name as in web route */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }    

    public function store()
    {
        //return view('posts.create');
        //dd(request('title', 'body'));
        /* Method 1: save 
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');        
        $post->save();
        */

        /* Method #2: Mass assignment. Must update model, 
         * protected $fillable = ['title', 'body']; 
        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
        */

        /** Method #3: shorthand of #2 */
        // Post::create(request(['title', 'body']));

        /** Method #4: Validate before saving */
        $this->validate(request(), [
            'title' => 'required|max:10',
            'body' => 'required'
        ]);

        Post::create(request(['title', 'body']));

        return redirect('/');
    }       
}
