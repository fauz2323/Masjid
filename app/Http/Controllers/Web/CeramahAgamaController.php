<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CeramahAgama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CeramahAgamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CeramahAgama::with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/ceramahDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/ceramah/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kegiatan.ceramahAgama.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = CeramahAgama::create([
            'id_akun'=>$user->id,
            'ustad'=>$request->ustad,
            'penanggung_jawab'=>$request->pj,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('ceramah-index');
    }

    public function updateview($id)
    {
        $data = CeramahAgama::findOrFail($id);
        return view('kegiatan.ceramahAgama.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = CeramahAgama::findOrFail($id);
       $update->update([
        'ustad'=>$request->ustad,
        'penanggung_jawab'=>$request->pj,
        'keterangan'=>$request->keterangan,
       ]);

       return redirect()->route('ceramah-index');
    }

    public function delete(Request $request,$id)
    {
        $data = CeramahAgama::findOrFail($id);
        $data->delete();

        return redirect()->route('ceramah-index');
    }

}
