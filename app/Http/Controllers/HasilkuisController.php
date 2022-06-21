<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Hasilkuis;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class HasilkuisController extends Controller
{
    public function index()
    {
        $data = Alumni::get();
        return view('superadmin.hasilkuis.index', compact('data'));
    }

    public function lihat($id)
    {
        $kuis = Kuesioner::get();

        $data = Alumni::find($id);
        $kuis->map(function ($item) use ($id) {
            $check = Hasilkuis::where('alumni_id', $id)->where('kuesioner_id', $item->id)->first();
            if ($check == null) {
                $item->jawaban = '';
            } else {
                $item->jawaban = $check->jawaban;
            }
            return $item;
        });

        return view('superadmin.hasilkuis.lihat', compact('kuis', 'data'));
    }
}
