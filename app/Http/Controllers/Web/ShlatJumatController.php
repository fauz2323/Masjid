<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SholatJumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ShlatJumatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SholatJumat::with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/sholatJumatDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/sholatJumat/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kegiatan.sholatJumat.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = SholatJumat::create([
            'id_akun'=>$user->id,
            'imam'=>$request->imam,
            'penanggung_jawab'=>$request->pj,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('sholatJumat-index');
    }

    public function updateview($id)
    {
        $data = SholatJumat::findOrFail($id);
        return view('kegiatan.sholatJumat.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = SholatJumat::findOrFail($id);
       $update->update([
        'imam'=>$request->imam,
        'penanggung_jawab'=>$request->pj,
        'keterangan'=>$request->keterangan,
       ]);

       return redirect()->route('sholatJumat-index');
    }

    public function delete(Request $request,$id)
    {
        $data = SholatJumat::findOrFail($id);
        $data->delete();

        return redirect()->route('sholatJumat-index');
    }
}
