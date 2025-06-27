<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\replyModel;
use App\Models\replytoreplyModel;



use Illuminate\Support\Facades\File;

use Session;
use Hash;
use Auth;
use Carbon\Carbon;


class AuthController extends Controller
{
   public function storeReply(Request $request)
{
 // return $request;
    $request->validate([
        'content' => 'required|string|max:1000',
        'comment_id' => 'required|exists:comments,id',
        'post_id' => 'required|exists:posts,id',
    ]);

    replyModel::create([
        'content' => $request->content,
        'comment_id' => $request->comment_id,
        'post_id' => $request->post_id,
        'user_id' => Auth::id(),
    ]);

    return back()->with('success', 'Reply posted successfully!');
}
  public function storeReplytoReply(Request $request)
{
    // return $request; ❌ Remove this

    $request->validate([
        'content' => 'required|string|max:1000',
        'comment_id' => 'required|exists:comments,id',
        'post_id' => 'required|exists:posts,id',
        'reply_id' => 'required|exists:reply,id', // ✅ Correct table name
    ]);

    replytoreplyModel::create([
        'content' => $request->content,
        'comment_id' => $request->comment_id,
        'post_id' => $request->post_id,
        'reply_id' => $request->reply_id,
        'user_id' => Auth::id(),
    ]);

    return back()->with('success', 'Reply posted successfully!');
}

    public function register()
    {
        return view('register');
    }
     public function login()
    {
        return view('login');
    }

       public function postLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // ✅ Login successful
        return redirect()->intended('welcome');
    }

    // ❌ Login failed: redirect back with error
    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->withInput(); // input preserve karega (like old email)
}
    public function dashboard()
    {
        $todayCount = User::whereDate('created_at', Carbon::today())->count();
       $userCount = User::count(); 

        return view('dashboard',compact('userCount','todayCount'));
    }
    public function logout() {
    Session::flush();
    Auth::logout();

    return Redirect('/login');
}
   public function registerStore(Request $request)
   {
       $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6'
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
      
       

        $data->password = Hash::make($request->password);

        $data->save();
        return redirect('/login');
   }
   public function welcome()
   {
  
    $posts = Post::with([
    'comments.user',
    'comments.replies.user',
    'comments.replies.replyToReplies.user' // 👈 important for reply-to-reply
])->latest()->get();

    return view('welcome', compact('posts'));
   }
   public function addPost()
   {
    $posts = Post::all();
    return view('post.show',compact('posts'));
   }
   public function editPost($id)
   {
     $posts = Post::all();
    $data = Post::find($id);
    return view('post.edit',compact('data','posts'));
   }
   public function deletePost($id)
{
    // Find the item by its ID
    $item = Post::findOrFail($id);

    // Delete the item from the database
    $item->delete();

    // Redirect back to the index page with a success message
    return back();
}
 public function commentStore(Request $request, $postId)
{
    // ✅ Validate content
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    // ✅ Ensure the post exists (or throw 404 if not)
    $post = Post::findOrFail($postId);

    // ✅ Create new comment and associate with post and user
    $comment = new Comment();
    $comment->content = $request->content;
    $comment->user_id = Auth::id();     // Current user
    $comment->post_id = $post->id;      // From validated Post model
    $comment->save();

    return back()->with('success', 'Comment posted successfully!');
}
   public function Poststore(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'required|image|max:2048',
    ]);

    $path = $request->file('image')->store('posts', 'public');

    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $path,
    ]);

    return redirect()->back()->with('success', 'Post created successfully!');
}
public function Postupdate(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048', // Allow updating without re-uploading image
    ]);

    $post = Post::findOrFail($id);

    // Check if new image uploaded
    if ($request->hasFile('image')) {
        // Delete old image if needed
        if ($post->image && \Storage::disk('public')->exists($post->image)) {
            \Storage::disk('public')->delete($post->image);
        }

        $path = $request->file('image')->store('posts', 'public');
        $post->image = $path;
    }

    // Update other fields
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();

    return redirect('/add/post');
}

}
