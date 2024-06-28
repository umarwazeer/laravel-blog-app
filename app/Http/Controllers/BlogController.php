<?php
// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10000'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $data['video'] = $path;
        }


        $blog = Blog::create($data);

        return response()->json(['success' => 'Blog created successfully.', 'blog' => $blog]);
    }

    public function show(Blog $blog)
    {
        return $blog;
    }

    // public function update(Request $request, Blog $blog)
    //     {
    //     try {
    //         $validated = $request->validate([
    //             'title' => 'required|string|min:3',
    //             'content' => 'required|min:3',
    //             'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    //         ]);

    //         if ($request->file('image')) {
    //             if ($blog->image) {
    //                 Storage::disk('public')->delete($blog->image);
    //             }
    //             $imagePath = $request->file('image')->store('images', 'public');
    //         } else {
    //             $imagePath = $blog->image;
    //         }

    //         $blog->update([
    //             'title' => $validated['title'],
    //             'content' => $validated['content'],
    //             'image' => $imagePath,
    //         ]);

    //         return response()->json($blog, 200);
    //     } catch (ValidationException $e) {
    //         return response()->json(['errors' => $e->errors()], 422);
    // }
    // }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            // Store new image
            $data['image'] = $request->file('image')->store('images', 'public');
        } else {
            // Do not update the image field if no new image is uploaded
            unset($data['image']);
        }

        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($blog->video) {
                Storage::disk('public')->delete($blog->video);
            }
            // Store new video
            $data['video'] = $request->file('video')->store('videos', 'public');
        } else {
            // Do not update the video field if no new video is uploaded
            unset($data['video']);
        }

        $blog->update($data);

        return response()->json($blog, 200);
    }


    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        if ($blog->video) {
            Storage::disk('public')->delete($blog->video);
        }

        $blog->delete();

        return response()->json(null, 204);
    }
}
