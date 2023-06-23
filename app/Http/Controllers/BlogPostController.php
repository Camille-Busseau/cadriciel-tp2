<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::Select()
        ->orderBy('created_at')
        ->paginate(10);
    return view('forum.index', ['blogPosts' => $blogPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required_without:title_fr',
            'title_fr' => 'required_without:title_en',
            'body_en' => 'required_without:body_fr',
            'body_fr' => 'required_without:body_en'
        ]);

        $newArticle = BlogPost::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'body_en' => $request->body_en,
            'body_fr' => $request->body_fr,
            'user_id' => Auth::user()->id
        ]);
        return redirect(route('forum.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        // $users = User::selectCity();
        return view('forum.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('forum.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title_en' => 'required_without:title_fr',
            'title_fr' => 'required_without:title_en',
            'body_en' => 'required_without:body_fr',
            'body_fr' => 'required_without:body_en'
        ]);

        $blogPost->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'body_en' => $request->body_en,
            'body_fr' => $request->body_fr,
        ]);

        return redirect(route('forum.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('forum.index'));
    }
}
