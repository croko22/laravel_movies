<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        $genres = $request->input("genres", []); // Adjusted for multiple genres
        $director = $request->input("director");
        $year = $request->input("year");
        $allGenres = Genre::all();

        $movies = Movie::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->when($genres, function ($query, $genres) {
                return $query->whereHas('genres', function ($query) use ($genres) {
                    $query->whereIn('genres.id', $genres);
                });
            })
            ->when($director, function ($query, $director) {
                return $query->whereHas('director', function ($query) use ($director) {
                    $query->where('name', 'like', "%$director%");
                });
            })
            ->when($year, function ($query, $year) {
                return $query->where('year', '=', $year);
            })
            ->paginate(12)->withQueryString();

        return view('home', compact('movies', 'allGenres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
