<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kultum;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KultumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kultum::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/kultumDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/kultum/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kegiatan.kultum.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = Kultum::create([
            'id_akun'=>$user->id,
            'ceramah'=>$request->ceramah,
            'penanggung_jawab'=>$request->pj,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('home');
    }

    public function updateview($id)
    {
        $data = Kultum::findOrFail($id);
        return view('kegiatan.kultum.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = Kultum::findOrFail($id);
       $update->update([
        'ceramah'=>$request->ceramah,
        'penanggung_jawab'=>$request->pj,
        'keterangan'=>$request->keterangan,
       ]);

       return redirect()->route('home');
    }

    public function delete(Request $request,$id)
    {
        $data = Kultum::findOrFail($id);
        $data->delete();

        return redirect()->route('home');
    }
}
