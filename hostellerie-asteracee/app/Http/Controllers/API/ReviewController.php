<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $reviews = Review::all();

        return response()->json($reviews, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'content' => 'required|max:256',
            'score' => 'required|int|max:5',
            'user_firstname' => 'required|max:100',
            'user_lastname' => 'required|max:100',
            'gender' => 'required|max:6'
        ]);

        $review = Review::create([
            'title' => $request->title,
            'content' => $request->content,
            'score' => $request->score,
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'gender' => $request->gender
        ]);

        return response()->json($review, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $review = Review::where('id',$id)->first();
        return response()->json($review, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'content' => 'required|max:512',
            'score' => 'required|int|max:5',
            'user_firstname' => 'required|max:100',
            'user_lastname' => 'required|max:100',
            'gender' => 'required|max:6'
        ]);
        $review = Review::where('id', $id)->first();

        $review->update([
            'title' => $request->title,
            'content' => $request->content,
            'score' => $request->score,
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'gender' => $request->gender
        ]);

        return response()->json('Reviews ' .$id. ' updated!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $review = Review::where('id', $id)->first();
        $review->delete();
        return response()->json('Review ' .$id. ' deleted!', 200);
    }
}
