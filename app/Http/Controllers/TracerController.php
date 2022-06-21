<?php

namespace App\Http\Controllers;

use App\Models\Hasilkuis;
use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TracerController extends Controller
{
    public function index()
    {
        $data = Auth::user()->alumni;
        $kuis = Kuesioner::get();

        $kuis->map(function ($item) use ($data) {
            $check = Hasilkuis::where('alumni_id', $data->id)->where('kuesioner_id', $item->id)->first();
            if ($check == null) {
                $item->jawaban = '';
            } else {
                $item->jawaban = $check->jawaban;
            }
            return $item;
        });

        return view('alumni.tracer.index', compact('data', 'kuis'));
    }

    public function store(Request $req)
    {
        foreach ($req->pertanyaan as $key => $i) {
            $check = Hasilkuis::where('alumni_id', Auth::user()->alumni->id)->where('kuesioner_id', $i)->first();
            if ($check == null) {
                $n = new Hasilkuis;
                $n->alumni_id = Auth::user()->alumni->id;
                $n->kuesioner_id = $i;
                $n->jawaban = $req->jawaban[$key];
                $n->tanggal = $req->tanggal;
                $n->save();
            } else {
                $check->update([
                    'jawaban' => $req->jawaban[$key],
                ]);
            }
        }

        toastr()->success('Jawaban Disimpan');
        return back();
    }
}
