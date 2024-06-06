<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('posts', compact('post'), ['title' => 'Home']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', ['title' => 'Create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:50000',
            'title' => 'required|string|max:15',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/post', $imageName);
        } else {
            $imageName = null;
        }

        Post::create([
            'image' => 'post/' . $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
        ]);

        return redirect('/post')->with(['success' => 'Data berhasil ditambah!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('show', ['title' => 'Show Details'], compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'), ['title' => 'Edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:50000',
            'title' => 'required|string|max:20',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
        ]);

        $post = Post::find($id);

        // periksa jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Upload gambar baru
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/post/' . $imageName);

            // Hapus gambar lama
            Storage::delete('public/post/' . $post->image);

            // Perbarui data post dengan gambar baru
            $post->update([
                'image' => 'post/' . $imageName,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
            ]);
        } else {
            // Perbarui post tanpa mengunggah gambar baru
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
            ]);
        }
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        Storage::delete('public/post/' . $post->image);

        $post->delete();

        return redirect('post');
    }

    public function home()
    {
        $post = Post::all();
        return view('home', ['title' => 'Home'], compact('post'));
    }
}
