<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeDashboardController extends Controller
{
    public function getEpisodes()
    {
        $episodes = Episode::filter(request(['anime']))->latest()->with('anime')->paginate(10)->withQueryString()->onEachSide(1);
        $animes = Anime::select()->orderBy('id', 'desc')->get();

        return view('pages.Admin.episodes.episodes', compact('episodes', 'animes'));
    }

    public function formAddEpisode()
    {
        $animes = Anime::latest()->get();
        return view('pages.Admin.episodes.add-episode', compact('animes'));
    }

    public function addEpisode(Request $request)
    {
        $request->validate([
            'anime' => 'required',
            'episode_name' => 'required|numeric',
            'video' =>'required|mimes:mp4',
            'image' =>'required|image|mimes:jpeg,png,jpg',
        ]);

        $episodeExists = Episode::where('anime_id', $request->anime)
        ->where('episode_name', $request->episode_name)
        ->exists();
        if($episodeExists) {
            return redirect()->route('admin.episodes')->with('error', 'Give different episode name');
        }

        if ($request->hasFile('image') && $request->hasFile('video')) {
            $destinationFile = 'thumbnails/';
            $inputImage = $request->file('image')->getClientOriginalName(); // Menggunakan metode file()
            if(!file_exists(public_path($destinationFile.$inputImage))) {
                $request->file('image')->move(public_path($destinationFile), $inputImage);
            }

            $destinationVideo = 'videos/';
            $inputVideo = $request->file('video')->getClientOriginalName();
            if(!file_exists(public_path($destinationVideo.$inputVideo))){
                $request->file('video')->move(public_path($destinationVideo), $inputVideo);
            }

            $episode = Episode::create([
                'anime_id' => $request->anime,
                'episode_name' => $request->episode_name,
                'video' => $inputVideo,
                'thumbnail' => $inputImage,
            ]);

            if($episode){
                return redirect()->route('admin.episodes')->with('success', 'Episode added successfully');
            }
        }
        return redirect()->route('admin.episodes')->with('error', 'Episode failed to add');
    }

    public function deleteEpisode($id) {
        $episode = Episode::find($id);
        $deleted = $episode->delete();
        if($deleted) {
            return redirect()->route('admin.episodes')->with('success', 'Episode deleted successfully');
        }
        return redirect()->route('admin.episodes')->with('error', 'Episode failed to delete');
    }

    public function formEditEpisode($id) {
        $episode = Episode::find($id);
        $animes = Anime::latest()->get();
        return view('pages.Admin.episodes.edit-episode', compact('episode', 'animes'));
    }

    public function editEpisode($id, Request $request) {
        $request->validate([
            'anime' => 'required',
            'episode_name' => 'required|numeric',
            'video' =>'required|mimes:mp4',
            'image' =>'required|image|mimes:jpeg,png,jpg',
        ]);

        $episodeExists = Episode::where('anime_id', $request->anime)
        ->where('episode_name', $request->episode_name)
        ->exists();
        if($episodeExists) {
            return redirect()->route('admin.episodes')->with('error', 'Give different episode name');
        }

        if ($request->hasFile('image') && $request->hasFile('video')) {
            $destinationFile = 'thumbnails/';
            $inputImage = $request->file('image')->getClientOriginalName(); // Menggunakan metode file()
            if(!file_exists(public_path($destinationFile.$inputImage))) {
                $request->file('image')->move(public_path($destinationFile), $inputImage);
            }

            $destinationVideo = 'videos/';
            $inputVideo = $request->file('video')->getClientOriginalName();
            if(!file_exists(public_path($destinationVideo.$inputVideo))){
                $request->file('video')->move(public_path($destinationVideo), $inputVideo);
            }

            $episode = Episode::find($id);
            $updated = $episode->update([
                'episode_name' => $request->episode_name,
                'anime_id' => $request->anime,
                'thumbnail' => $inputImage,
                'video' => $inputVideo,
                'updated_at' => now(),
            ]);

            if($updated){
                return redirect()->route('admin.episodes')->with('success', 'Episode updated successfully');
            }
        }
        return redirect()->route('admin.episodes')->with('error', 'Episode failed to update');
    }

}