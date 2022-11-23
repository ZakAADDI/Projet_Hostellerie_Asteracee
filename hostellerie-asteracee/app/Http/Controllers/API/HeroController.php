<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Resources\HeroResource;
class HeroController extends Controller
{
    /**
     * Display the hero.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hero = Hero::with(['logoMedia','centerMedia','leftMedia','rightMedia'])->firstOrFail();

        return response()->json(HeroResource::make($hero), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'logo_media_id' => 'exists:App\Models\Media,id|int',
            'text_fr' => 'string|max:100',
            'text_en' => 'string|max:100',
            'left_media_id' => 'exists:App\Models\Media,id|int',
            'center_media_id' => 'exists:App\Models\Media,id|int',
            'right_media_id' => 'exists:App\Models\Media,id|int',
        ]);
        $hero = Hero::first();
        $hero->update($request->all());

        return response()->json($hero, 200);
    }
}
