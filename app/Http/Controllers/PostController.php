<?php
namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;

   
class PostController extends Controller
{
    public function getDashboard()
{
    $posts = Post::orderBy('created_at', 'desc')->get();
   return view('dashboard', ['posts' =>$posts]); 

 }

public function postCreatePost(Request $request)
{
    //Validation
    $this->validate($request, [
        'body' => 'required|max:1000'
    ]);
    $post = new Post();
    $post->body = $request['body'];
    $message = 'There was an error';
    if($request->user()->posts()->save($post)) {
        $message = 'Post successfully created!';
    }
    return redirect()->route('dashboard')->with(['message' => $message]);
}
  public function getDeletePost($post_id)
  {
     $post = Post::where('id', $post_id)->first();
     if (Auth::user() != $post->user) {
         return redirect()-back();
     }
     $post->delete();
     return redirect()->route('dashboard')->with(['message' => 'successfully deleted!']);
  }

  public function postEditPost(Request $request)
{
    $this->validate($request, [
        'body' => 'required' 
    ]);
    $post =Post::find($request['postId']);
    if (Auth::user() != $post->user) {
        return redirect()-back();
    }
    $post->body = $request['body'];
    $post->update();
    return response()->json(['new-body' => $post->body], 200);
}

public function postLikePost(Request $request)
{
    $post_id = $request['postId'];
    $is_like = $request['isLike'] === 'true';
    $update = false;
    $post = Post::find($post_id);
    if (!$post) {
        return null;
    }
    $user = Auth::user();
    $like = $user->likes->where('post_id', $post_id)->first();
    if ($like) {
        $already_like = $like->like;
        $update = true;
        if ($already_like == $is_like) {
            $like->delete();
            return null;
        }

    }else{
       $like = new Like();
    }
    $like->like = $is_like;
    $like->user_id = $user->id;
    $like->post_id = $post->id;
    if ($update) {
        $like->update();
    }else {
        $like->save();
    }
    return null;
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}

