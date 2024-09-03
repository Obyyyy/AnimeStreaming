<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function getGenres()
    {
        $genres = Genre::filter(request(['search']))->latest()->paginate(10)->withQueryString()->onEachSide(1);
        return view('pages.Admin.genres.genres', compact('genres'));
    }

    public function formAddGenre()
    {
        return view('pages.Admin.genres.add-genre');
    }

    public function addGenre(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:15',
        ]);
        $genreExists = Genre::where('slug', Str::slug($request->name))->exists();
        if($genreExists) {
            return redirect()->route('admin.genres')->with('error', 'Genre failed to add, give different genre name');
        }
        $success = Genre::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        if($success) {
            return redirect()->route('admin.genres')->with('success', 'Genre added successfully');
        }
        return redirect()->route('admin.genres')->with('error', 'Genre failed to add');
    }

    public function deleteGenre(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres')->with(['success' => 'Genre deleted successfully']);
    }

    public function formEditGenre(Genre $genre)
    {
        return view('pages.Admin.genres.edit-genre', compact('genre'));
    }

    public function editGenre(Genre $genre, Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:15',
        ]);

        $genreExists = Genre::where('slug', Str::slug($request->name))->exists();
        if($genreExists) {
            return redirect()->route('admin.genres')->with('error', 'Genre failed to add, give different genre name');
        }

        $genre->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.genres')->with(['success' => 'Genre edited successfully']);
    }
}