<?php

namespace App\Http\Controllers\Web;

use App\Exports\PengeluaranExport;
use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PengeluaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengeluaran::with('user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/pengeluaranDelete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a> <a href="/pengeluaran/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('keuangan.pengeluaran.index');
    }

    public function add(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = Pengeluaran::create([
            'id_akun'=>$user->id,
            'pengeluaran'=>$request->pengeluaran,
            'penanggung_jawab'=>$request->pj,
            'keperluan'=>$request->keterangan,
        ]);

        return redirect()->route('pengeluaran-index');
    }

    public function updateview($id)
    {
        $data = Pengeluaran::findOrFail($id);
        return view('keuangan.pengeluaran.edit',compact('data'));
    }

    public function updateStore(Request $request,$id)
    {
       $update = Pengeluaran::findOrFail($id);
       $update->update([
        'pengeluaran'=>$request->pengeluaran,
        'penanggung_jawab'=>$request->pj,
        'keperluan'=>$request->keterangan,
       ]);

       return redirect()->route('pengeluaran-index');
    }

    public function delete(Request $request,$id)
    {
        $data = Pengeluaran::findOrFail($id);
        $data->delete();

        return redirect()->route('pengeluaran-index');
    }

    public function download()
    {
        return Excel::download(new PengeluaranExport, 'pengeluaran.xlsx');
    }
}
