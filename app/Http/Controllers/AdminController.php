<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\Genre;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $adminCount = Admin::all()->count();
        $animeCount = Anime::all()->count();
        $genreCount = Genre::all()->count();
        $episodeCount = Episode::all()->count();

        return view('pages.Admin.index', compact('adminCount', 'animeCount', 'genreCount', 'episodeCount'));
    }

    public function viewAdminLogin()
    {
        return view('pages.Admin.login');
    }

    public function adminLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")]))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['Error' => 'Login Error']);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.view.login');
    }

    public function getAdmins()
    {
        $admins = Admin::filter(request(['search']))->latest()->paginate(10)->withQueryString()->onEachSide(1);

        return view('pages.Admin.admins.admins', compact('admins'));
    }

    public function formAddAdmin()
    {
        return view('pages.Admin.admins.add-admin');
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'email|required',
            'password' =>'required|min:8|max:12',
        ]);
        $emailExists = Admin::where('email', $request->email)->exists();
        if($emailExists) {
            return redirect()->route('admin.admins')->with('error', 'Give different email');
        }

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($admin) {
            return redirect()->route('admin.admins')->with('success', 'Admin added successfully');
        }
        return redirect()->route('admin.admins')->with('error', 'Error to adding Admin');
    }

    public function formEditAdmin(Admin $admin)
    {
        return view('pages.Admin.admins.edit-admin', compact('admin'));
    }

    public function editAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'email|required',
            'password' =>'required|min:8|max:12',
        ]);
        $emailExists = Admin::where('email', $request->email)->exists();
        if($emailExists) {
            return redirect()->route('admin.admins')->with('error', 'Give different email');
        }
        $admin = Admin::find($id);
        $sucess = $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        if($sucess) {
            return redirect()->route('admin.admins')->with('success', 'Admin updated successfully');
        }
        return redirect()->route('admin.admins')->with('error', 'Error to updated Admin');
    }

    public function deleteAdmin(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.admins')->with('success', 'Admin deleted successfully');
    }
}