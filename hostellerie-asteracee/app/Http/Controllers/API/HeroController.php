<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class HeroController extends Controller
{
    /**
     * Display the hero.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hero = Hero::first()->with(['logoMedia','centerMedia','leftMedia','rightMedia'])->firstOrFail();

        return response()->json($hero);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Hero $hero)
    {
        $this->validate($request,[
            'logo_media_id' => 'required',
            'text_fr' => 'required',
            'text_en' => 'required',
            'left_media_id' => 'required',
            'center_media_id' => 'required',
            'right_media_id' => 'required',
        ]);

        $hero->update([
            'logo_media_id' => $request->logo_media_id,
            'text_fr' => $request->text_fr,
            'text_en' => $request->text_en,
            'left_media_id' => $request->left_media_id,
            'center_media_id' => $request->center_media_id,
            'right_media_id' => $request->right_media_id,
        ]);

        return response()->json($hero,201);
    }
}
