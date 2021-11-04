<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataPemasukan = Pemasukan::all();
        $pemasukan = 0;
        $dataPengeluaran = Pengeluaran::all();
        $rolec = User::role('dkm')->count();
        $pengeluaran = 0;
        foreach ($dataPemasukan as $key) {
           $pemasukan = $pemasukan + floatval(str_replace('.','',$key->pemasukan));
        }
        foreach ($dataPengeluaran as $key) {
            $pengeluaran = $pengeluaran + floatval(str_replace('.','',$key->pengeluaran));
         }
        return view('home', compact('pemasukan','pengeluaran','rolec'));
    }

    public function ChangePass(Request $request)
    {
        $user = Auth::user();
        $dataUser = User::findOrFail($user->id);
        if (Hash::check($request->oldPass, $dataUser->password)) {
            $dataUser->password = Hash::make($request->passwordnew);
            $dataUser->save();
        return redirect()->route('home')->with('message', 'Sukses Ganti!!');

        }else{
            return redirect()->route('home')->with('error','password lama salah');
        }

    }
}
