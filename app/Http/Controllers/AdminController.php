<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $userId = Auth::id();

        $laporan = Laporan::all();
        return view('admin', compact('laporan', 'userId'));
    }
    
    public function edit($id){

        $laporan = Laporan::findOrFail($id);
        return view('edit', compact('laporan'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'status' => ['required', 'string', 'in:Pending,Sucsess'],
        ]);

        DB::table('Laporan')->where('id', $id)->update([
            'status' => $validatedData['status'],
        ]);

        return redirect('/admin')->with('success', 'Status updated successfully!'); 
    }

    public function delete($id){
        DB::table('Laporan')->where('id', $id)->delete();

        DB::commit();

        return redirect('/admin')->with('success', 'Data deleted successfully!');
    }

}
