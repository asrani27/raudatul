<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Hasilnilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $data = Alumni::get();
        return view('stakeholder.alumni.index', compact('data'));
    }

    public function nilai($id)
    {
        $alumni = Alumni::find($id);
        $data = Hasilnilai::where('stakeholder_id', Auth::user()->stakeholder->id)->where('alumni_id', $id)->first();

        return view('stakeholder.alumni.nilai', compact('alumni', 'data'));
    }

    public function store(Request $req, $id)
    {
        $attr = $req->all();
        $attr['alumni_id'] = $id;
        $attr['tgl'] = $req->tanggal;
        $attr['stakeholder_id'] = Auth::user()->stakeholder->id;

        $check = Hasilnilai::where('stakeholder_id', Auth::user()->stakeholder->id)->where('alumni_id', $id)->first();
        if ($check == null) {
            Hasilnilai::create($attr);
            toastr()->success('nilai disimpan');
        } else {
            $check->update($attr);
            toastr()->success('nilai di update');
        }
        return redirect('/stakeholder/penilaian');
    }
}
