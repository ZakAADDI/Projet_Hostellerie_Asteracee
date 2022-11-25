<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;

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

        return response()->json(ReviewResource::Collection($reviews), 200);
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

        $review = new Review;
        $review->fill($request->post())->save();

        return response()->json(ReviewResource::make($review), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(Review::findOrFail($id), 200);
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

        $review = Review::findOrFail($id);
        $review->update($request->all());
        return response()->json(ReviewResource::make($review),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json('Review ' .$id. ' deleted!', 200);
    }
}
