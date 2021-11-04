<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/change-akun/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Add DKM</a> <a href="/delete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm editCustomer">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('setting.akun.index');
    }

    public function add($id)
    {
        $user = User::findOrFail($id);
        $user->assignRole('dkm');

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $user =User::findOrFail($id);
        $user->delete();

        return redirect()->route('add');
    }
}
