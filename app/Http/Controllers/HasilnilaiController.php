<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Hasilnilai;
use App\Models\Stakeholder;
use Illuminate\Http\Request;

class HasilnilaiController extends Controller
{
    public function stake()
    {
        $data = Stakeholder::get();
        return view('superadmin.hasilnilai.stake', compact('data'));
    }

    public function index($id)
    {
        $data = Alumni::get();
        $st = Stakeholder::find($id);
        $data->map(function ($item) use ($id) {
            $hasilnilai = Hasilnilai::where('alumni_id', $item->id)->where('stakeholder_id', $id)->first();
            if ($hasilnilai == null) {
                $item->integritas = null;
                $item->profesionalitas = null;
                $item->komunikasi = null;
                $item->kerjasama = null;
                $item->pengembangan_diri = null;
                $item->penguasaan_tik = null;
                $item->bahasa_inggris = null;
            } else {
                $item->integritas = $hasilnilai->integritas;
                $item->profesionalitas = $hasilnilai->profesionalitas;
                $item->komunikasi = $hasilnilai->komunikasi;
                $item->kerjasama = $hasilnilai->kerjasama;
                $item->pengembangan_diri = $hasilnilai->pengembangan_diri;
                $item->penguasaan_tik = $hasilnilai->penguasaan_tik;
                $item->bahasa_inggris = $hasilnilai->bahasa_inggris;
            }
            return $item;
        });

        return view('superadmin.hasilnilai.index', compact('data', 'st'));
    }
}
