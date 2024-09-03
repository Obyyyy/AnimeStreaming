<?php

namespace App\Http\Controllers\Dashboard;

use DateTime;
use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimeDashboardController extends Controller
{
    public function getAnimes()
    {
        $animes = Anime::filter(request(['search']))->latest()->paginate(10)->withQueryString()->onEachSide(1);

        return view('pages.Admin.animes.animes', compact('animes'));
    }

    public function formAddAnime()
    {
        $genres = Genre::all();
        return view('pages.Admin.animes.add-anime', compact('genres'));
    }

    public function addAnime(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'date_aired' => 'required|date_format:m/d/Y',
            'description' => 'required',
            'type' => 'required',
            'studios' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'quality' => 'required',
        ]);

        $animeNameExists = Anime::where('slug', Str::slug($request->title))->exists();
        if($animeNameExists) {
            return redirect()->route('admin.animes')->with('error', 'Give different title');
        }

        if ($request->hasFile('image')) {
            $destinationFile = 'img/';
            $inputImage = $request->file('image')->getClientOriginalName(); // Menggunakan metode file()
            if(!file_exists(public_path($destinationFile.$inputImage))) {
                $request->file('image')->move(public_path($destinationFile), $inputImage);
            }

            $date = DateTime::createFromFormat('m/d/Y', $request->date_aired)->format('Y-m-d');

            $anime = Anime::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $inputImage,
                'description' => $request->description,
                'type' => $request->type,
                'studios' => $request->studios,
                'date_aired' => $date,
                'status' => $request->status,
                'duration' => $request->duration,
                'quality' => $request->quality,
            ]);

            if ($anime) {
                $selectedGenres = $request->input('genres');
                foreach($selectedGenres as $genreSlug) {
                    $genre = Genre::select('id')->where('slug', $genreSlug)->first();
                    $anime->genres()->attach($genre, [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                return redirect()->route('admin.animes')->with('success', 'Anime added successfully');
            }
        }
        return redirect()->route('admin.animes')->with('error', 'Anime failed to add');
    }

    public function formEditAnime(Anime $anime)
    {
        $date_aired = DateTime::createFromFormat('Y-m-d', $anime->date_aired)->format('m/d/Y');
        $genres = Genre::all();
        $selectedGenres = $anime->genres;
        // return dd($selectedGenres);
        return view('pages.Admin.animes.edit-anime', compact('anime', 'genres', 'date_aired', 'selectedGenres'));
    }

    public function editAnime(Anime $anime, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'date_aired' => 'required|date_format:m/d/Y',
            'description' => 'required',
            'type' => 'required',
            'studios' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'quality' => 'required',
        ]);

        $animeNameExists = Anime::where('slug', Str::slug($request->title))->exists();
        if($animeNameExists) {
            return redirect()->route('admin.animes')->with('error', 'Give different title');
        }

        if ($request->hasFile('image')) {
            $destinationFile = 'img/';
            $inputImage = $request->file('image')->getClientOriginalName(); // Menggunakan metode file()
            if(!file_exists(public_path($destinationFile.$inputImage))) {
                $request->file('image')->move(public_path($destinationFile), $inputImage);
            }

            $date = DateTime::createFromFormat('m/d/Y', $request->date_aired)->format('Y-m-d');

            $updatedAnime = $anime->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $inputImage,
                'description' => $request->description,
                'type' => $request->type,
                'studios' => $request->studios,
                'date_aired' => $date,
                'status' => $request->status,
                'duration' => $request->duration,
                'quality' => $request->quality,
                'updated_at' => now(),
            ]);

            if ($updatedAnime) {
                $selectedGenres = $request->input('genres');
                $genreIds = Genre::whereIn('slug', $selectedGenres)->pluck('id')->toArray();

                $anime->genres()->sync(array_fill_keys($genreIds, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));

                return redirect()->route('admin.animes')->with('success', 'Anime updated successfully');
            }
        }
        return redirect()->route('admin.animes')->with('success', 'Anime added successfully');
    }

    public function deleteAnime(Anime $anime)
    {
        $deleted = $anime->delete();
        if($deleted) {
            return redirect()->route('admin.animes')->with('success', 'Anime deleted successfully.');
        }
        return redirect()->route('admin.animes')->with('success', 'Anime failed to delete.');
    }
}