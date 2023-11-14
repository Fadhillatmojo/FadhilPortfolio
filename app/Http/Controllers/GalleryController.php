<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
        );
        return view('gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";

            $path = public_path('storage/posts_image/'.$filenameSimpan);
            $photoResized = Image::make($request->file('picture'));
            $photoResized->fit(100,100);
            $photoResized->save($path);
            // $path = $photoResized->storeAs('/posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }
        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Post::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
        $post = Post::findOrFail($id);
        // check apakah image is uploaded
        if ($request->hasFile('picture')){
            // menghapus image yang lama
            $path = 'posts_image/'. $post->picture;
    
            if (Storage::exists($path)) {
                Storage::delete($path);
            }

            // membuat nama file untuk nantinya dimasukkan ke dalam database
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";

            // ini path yang baru dimana nantinya path ini yang akan disimpan ke database dan juga image ini yang akan dimasukkan ke folder
            $path = public_path('storage/posts_image/'.$filenameSimpan);
            $photoResized = Image::make($request->file('picture'));
            $photoResized->fit(100,100);
            $photoResized->save($path);

            //update post with new image
            $post->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'picture'       => $filenameSimpan
            ]);
        } else {
            //update post with no image
            $post->update([
                'title'         => $request->title,
                'description'   => $request->description
            ]);
        }
        //redirect to dashboard
        return redirect()->route('gallery.edit', $post->id)->with(['message' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Post::findOrFail($id);
        $path = 'posts_image/'. $gallery->picture;

        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $gallery->delete();

        return redirect()->route('gallery.index')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}
