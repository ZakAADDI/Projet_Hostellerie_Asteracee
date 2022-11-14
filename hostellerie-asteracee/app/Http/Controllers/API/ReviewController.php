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

        return response()->json($reviews);
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
            'content' => $request->contentReview,
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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Review $review)
    {
        return response()->json($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Review $review): \Illuminate\Http\JsonResponse
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'content' => 'required|max:256',
            'score' => 'required|int|max:5',
            'user_firstname' => 'required|max:100',
            'user_lastname' => 'required|max:100',
            'gender' => 'required|max:6'
        ]);

        $review->update([
            'title' => $request->title,
            'content' => $request->contentReview,
            'score' => $request->score,
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'gender' => $request->gender
        ]);


        return response()->json($review, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json();
    }
}
