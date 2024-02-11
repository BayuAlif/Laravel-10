<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('Home.Home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $photopath = $request->file('photo')->store('public/img');
        $photoFileName = basename($photopath);


        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'subject' => ['required', 'string', 'in:Kebersihan,Keamanan,Fasilitas Umum'],
            'name_report' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4048'],
            'description' => ['required', 'string'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'subject.required' => 'Subject harus diisi',
            'name_report.required' => 'Nama harus diisi',
            'photo.required' => 'Photo harus diisi',
            'photo.image' => 'Photo harus berupa gambar',
            'photo.mimes' => 'Photo harus berupa jpeg,png,jpg,gif',
            'description.required' => 'Deskripsi harus diisi',
        ]);


        $newLaporan = DB::table('Laporan')->insertGetId([
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'name_report' => $validatedData['name_report'],
            'photo' => $photoFileName,
            'description' => $validatedData['description'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/home')->with('success', 'Laporan Berhasil')->with('laporanId', $newLaporan);
    }

    public function gallery()
    {
        $userId = Auth::id();

        $laporan = Laporan::all();
        return view('Home.gallery', compact('laporan', 'userId'));
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $laporanId = $request->input('laporan_id'); // Tambahkan ini untuk menerima input ID laporan
    
        $query = Laporan::query();
    
        if ($category) {
            $query->where('subject', $category);
        }
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        if ($laporanId) {
            $query->where('id', $laporanId); // Tambahkan kondisi pencarian berdasarkan ID laporan
        }
    
        $laporan = $query->get();
    
        return view('Home.gallery', compact('laporan'));
    }
    

    public function login(){
        return view('Home.login');
    }

    public function sendlogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
    }

}

