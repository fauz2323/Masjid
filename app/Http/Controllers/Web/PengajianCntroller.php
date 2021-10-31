<?php

namespace App\Http\Controllers\Web;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Pengajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajianCntroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengajian::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/pengajianDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/pengajian/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kegiatan.pengajian.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = Pengajian::create([
            'id_akun'=>$user->id,
            'guru'=>$request->guru,
            'penanggung_jawab'=>$request->pj,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('pengajian-index');
    }

    public function updateview($id)
    {
        $data = Pengajian::findOrFail($id);
        return view('kegiatan.pengajian.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = Pengajian::findOrFail($id);
       $update->update([
        'guru'=>$request->guru,
        'penanggung_jawab'=>$request->pj,
        'keterangan'=>$request->keterangan,
       ]);

       return redirect()->route('pengajian-index');
    }

    public function delete(Request $request,$id)
    {
        $data = Pengajian::findOrFail($id);
        $data->delete();

        return redirect()->route('pengajian-index');
    }
}
