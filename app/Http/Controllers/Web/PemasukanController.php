<?php

namespace App\Http\Controllers\Web;

use App\Exports\PemasukanExport;
use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PemasukanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemasukan::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/pemasukanDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/pemasukan/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('keuangan.pemasukan.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = Pemasukan::create([
            'id_akun'=>$user->id,
            'pemasukan'=>$request->pemasukan,
            'penanggung_jawab'=>$request->pj,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('pemasukan-index');
    }

    public function updateview($id)
    {
        $data = Pemasukan::findOrFail($id);
        return view('keuangan.pemasukan.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = Pemasukan::findOrFail($id);
       $update->update([
        'pemasukan'=>$request->pemasukan,
        'penanggung_jawab'=>$request->pj,
        'keterangan'=>$request->keterangan,
       ]);

       return redirect()->route('pemasukan-index');
    }

    public function delete(Request $request,$id)
    {
        $data = Pemasukan::findOrFail($id);
        $data->delete();

        return redirect()->route('pemasukan-index');
    }

    public function download()
    {
        return Excel::download(new PemasukanExport, 'pemasukan.xlsx');
    }
}
