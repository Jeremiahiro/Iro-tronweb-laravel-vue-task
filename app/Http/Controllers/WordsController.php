<?php

namespace App\Http\Controllers;

use App\Models\Words;
use Illuminate\Http\Request;
use App\Http\Resources\WordResource;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Words::latest()->paginate(20);
        return WordResource::collection($words);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Words  $words
     * @return \Illuminate\Http\Response
     */
    public function show(Words $words, Request $request)
    {
        return new UserResource($words);

        // // error message
        // $error = ['error' => 'No results found, please try with different keywords.'];

        // // Making sure the user entered a keyword.
        // if($request->has('q')) {

        //     // Using the Laravel Scout syntax to search the products table.
        //     $word = Words::search($request->get('q'))->get();

        //     // If there are results return them, if none, return the error message.
        //     return $word->count() ? $word : $error;

        // }

        // // Return the error message if no keywords existed
        // return $error;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Words  $words
     * @return \Illuminate\Http\Response
     */
    public function edit(Words $words)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Words  $words
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Words $words)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Words  $words
     * @return \Illuminate\Http\Response
     */
    public function destroy(Words $words)
    {
        $words->delete();

        return response(null, 204);
    }
}
