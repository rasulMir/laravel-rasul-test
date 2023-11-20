<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all()->sortByDesc('likes');
        return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContentRequest $request)
    {
        $text = $request->validated('text');
        $path = null;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $path = 'storage/' . $image->store('user_images');
        }

        if ($text || $path) {
            Content::create([
                'text' => $text,
                'image_path' => $path,
            ]);

            return redirect()->route('content.index');
        }

        return back()->withInput();
    }

    public function like(string $id)
    {
        $rated = session('rated');

        if ($rated) {
            $ratedArr = explode(',', $rated);

            foreach ($ratedArr as $value) {
                if ($id === $value) {

                    session(['alert' => 'Вы уже отреагировали на этот пост!']);
                    return redirect()->route('content.index');
                }
            }
        }

        session([
            'rated' => $rated ? $rated . ',' . $id : $id,
            'alert' => 'Вы поставили лайк посту!',
        ]);
        Content::rateContent($id);

        return redirect()->route('content.index');
    }

    public function dislike(string $id)
    {
        $rated = session('rated');

        if ($rated) {
            $ratedArr = explode(',', $rated);

            foreach ($ratedArr as $value) {
                if ($id === $value) {

                    session(['alert' => 'Вы уже отреагировали на этот пост!']);
                    return redirect()->route('content.index');
                }
            }
        }

        session([
            'rated' => $rated ? $rated . ',' . $id : $id,
            'alert' => 'Вы поставили дизлайк посту!',
        ]);

        Content::rateContent($id, 'dislike');

        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
