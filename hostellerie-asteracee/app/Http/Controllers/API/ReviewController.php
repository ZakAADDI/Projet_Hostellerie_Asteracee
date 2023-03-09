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
        $reviews = Review::orderBy('created_at','desc')->take(5)->get();

        return response()->json(ReviewResource::Collection($reviews));
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
            'booking_id' => 'exists:App\Models\Booking,id|int',
        ]);

        $review = new Review;
        $review->fill($request->post())->save();

        return response()->json(ReviewResource::make($review));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $review = Review::findOrFail($id);
        return response()->json(ReviewResource::make($review));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response()->json('Review ' .$id. ' deleted!');
    }
}
