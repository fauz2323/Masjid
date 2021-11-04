<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sholat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ShalatCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sholat::with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/sholatDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/sholat/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kegiatan.Sholat.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = Sholat::create([
            'id_akun'=>$user->id,
            'imam'=>$request->imam,
            'penanggung_jawab'=>$request->pj,
            'WaktuSholat'=>$request->WaktuSholat,
        ]);

        return redirect()->route('shalat-index');
    }

    public function updateview($id)
    {
        $data = Sholat::findOrFail($id);
        return view('kegiatan.Sholat.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = Sholat::findOrFail($id);
       $update->update([
        'imam'=>$request->imam,
        'penanggung_jawab'=>$request->pj,
        'WaktuSholat'=>$request->WaktuSholat,
       ]);

       return redirect()->route('shalat-index');
    }

    public function delete(Request $request,$id)
    {
        $data = Sholat::findOrFail($id);
        $data->delete();

        return redirect()->route('shalat-index');
    }
}
