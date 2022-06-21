<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Soal;
use App\Models\Waktu;
use App\Models\Alumni;
use App\Models\Projur;
use GuzzleHttp\Client;
use App\Models\Jawaban;
use App\Models\Peserta;
use App\Models\Kategori;
use App\Models\BenarSalah;
use App\Models\Hasilnilai;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function datapeserta()
    {
        return Peserta::get();
    }

    public function superadmin()
    {
        return view('superadmin.home');
    }

    public function alumni()
    {
        return view('alumni.home');
    }

    public function stakeholder()
    {
        $data = Auth::user()->stakeholder;
        return view('stakeholder.home', compact('data'));
    }
    public function gantipass()
    {
        return view('superadmin.gantipass.index');
    }

    public function resetpass(Request $req)
    {
        if ($req->password1 == $req->password2) {
            $u = Auth::user();
            $u->password = bcrypt($req->password1);
            $u->save();

            Auth::logout();
            toastr()->success('Berhasil Di Ubah, Login Dengan Password Baru');
            return redirect('/');
        } else {
            toastr()->error('Password Tidak Sama');
            return back();
        }
    }

    public function soal($id)
    {
        return Soal::where('jurusan_id', $id)->get();
    }

    public function laporan()
    {
        $st = Stakeholder::get();
        return view('superadmin.laporan.index', compact('st'));
    }

    public function pdf_stakeholder()
    {

        $data = Stakeholder::get();

        $path = 'theme/logo.png';
        $datalogo = file_get_contents($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($datalogo);



        $path1 = 'theme/logo.png';
        $datalogo1 = file_get_contents($path1);
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $smk = 'data:image/' . $type1 . ';base64,' . base64_encode($datalogo1);

        $pdf = PDF::loadView('superadmin.laporan.pdf_stakeholder', compact('data', 'logo', 'smk'))->setPaper('legal');
        return $pdf->stream();
    }

    public function pdf_alumni()
    {

        $data = Alumni::get();

        $path = 'theme/logo.png';
        $datalogo = file_get_contents($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($datalogo);



        $path1 = 'theme/logo.png';
        $datalogo1 = file_get_contents($path1);
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $smk = 'data:image/' . $type1 . ';base64,' . base64_encode($datalogo1);

        $pdf = PDF::loadView('superadmin.laporan.pdf_alumni', compact('data', 'logo', 'smk'))->setPaper('legal');
        return $pdf->stream();
    }


    public function pdf_kuis()
    {

        $data = Alumni::get();

        $path = 'theme/logo.png';
        $datalogo = file_get_contents($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($datalogo);

        $path1 = 'theme/logo.png';
        $datalogo1 = file_get_contents($path1);
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $smk = 'data:image/' . $type1 . ';base64,' . base64_encode($datalogo1);

        $pdf = PDF::loadView('superadmin.laporan.pdf_hasilkuis', compact('data', 'logo', 'smk'))->setPaper('legal');
        return $pdf->stream();
    }

    public function pdf_penilaian(Request $req)
    {
        $st = Stakeholder::find($req->stakeholder_id);
        $data = Hasilnilai::where('stakeholder_id', $req->stakeholder_id)->get();

        $path = 'theme/logo.png';
        $datalogo = file_get_contents($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($datalogo);

        $path1 = 'theme/logo.png';
        $datalogo1 = file_get_contents($path1);
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $smk = 'data:image/' . $type1 . ';base64,' . base64_encode($datalogo1);

        $pdf = PDF::loadView('superadmin.laporan.pdf_hasilnilai', compact('data', 'logo', 'smk', 'st'))->setPaper('legal');
        return $pdf->stream();
    }

    public function peserta()
    {
        $peserta    = Auth::user()->peserta;

        $jmlsoal    = $this->soal($peserta->jurusan_id)->count();

        $jam        = Carbon::now()->format('H:i');
        $waktu      = Waktu::first()->durasi;

        $listSoal   = $this->soal($peserta->jurusan_id)->map(function ($item) use ($peserta) {
            $check = Jawaban::where('peserta_id', $peserta->id)->where('soal_id', $item->id)->first();
            if ($check == null) {
                $item->dijawab = false;
            } else {
                $item->dijawab = $check->jawaban;
            }
            return $item;
        });

        $jmlbelumjawab = $listSoal->where('dijawab', false)->count();

        //hitung skor Benar
        $skor = Jawaban::where('peserta_id', $peserta->id)
            ->get()->map(function ($item2) {
                if ($item2->jawaban == $item2->soal->kunci) {
                    $item2->benar = 'Y';
                } else {
                    $item2->benar = 'T';
                }
                return $item2;
            })->where('benar', 'Y')->count();

        //check selesai ujian
        if ($peserta->selesai_ujian == 1) {
            return view('peserta.selesai', compact('jmlsoal', 'jam', 'waktu', 'peserta', 'jmlbelumjawab', 'skor'));
        } else {

            $mulai     = Waktu::first()->tanggal_mulai;
            $selesai   = Waktu::first()->tanggal_selesai;
            $check     = Carbon::now()->between($mulai, $selesai);
            $now       = Carbon::now();

            if ($now <= Carbon::parse(Waktu::first()->tanggal_mulai)) {
                return view('peserta.start', compact('jmlsoal', 'jam', 'waktu', 'peserta', 'jmlbelumjawab', 'mulai', 'selesai'));
            } elseif ($now > Waktu::first()->tanggal_selesai) {
                return view('peserta.selesai', compact('jmlsoal', 'jam', 'waktu', 'peserta', 'jmlbelumjawab', 'skor'));
            } else {
                $soalPertama = Soal::where('jurusan_id', $peserta->jurusan_id)->first();
                if ($soalPertama == null) {
                    Auth::logout();
                    toastr()->error('TIDAK ADA SOAL UTK JURUSAN INI, DI LOGOUT OTOMATIS');
                    return redirect('/');
                } else {
                    $nomorSoal = $soalPertama->id;
                }
                return redirect('/peserta/ujian/soal/' . $nomorSoal);
            }
        }
    }

    public function testapi()
    {
        $token = null;
        $data = [];
        return view('testapi', compact('token', 'data'));
    }

    public function gettoken(Request $req)
    {
        $client = new Client(['base_uri' => 'http://cat.asrandev.com/api/']);
        $response = $client->request('POST', 'login', [
            'form_params' => [
                'username' => $req->username,
                'password' => $req->password,
            ]
        ]);
        $resp = json_decode($response->getBody()->getContents());

        $token = $resp->api_token;
        $req->flash();
        $data = [];
        return view('testapi', compact('token', 'data'));
    }

    public function getnilai(Request $req)
    {
        $token = $req->token;
        $client = new Client(['base_uri' => 'http://cat.asrandev.com/api/']);
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        //get Profile
        $profile = $client->request('GET', 'profile', [
            'headers' => $headers
        ]);
        $resp_profile = json_decode($profile->getBody()->getContents())->data;

        //get kunci
        $kunci = $client->request('GET', 'kunci', [
            'headers' => $headers
        ]);
        $resp_kunci = json_decode($kunci->getBody()->getContents())->data;

        //get jawabanku
        $jawaban = $client->request('GET', 'jawabanku', [
            'headers' => $headers
        ]);
        $resp_jawaban = json_decode($jawaban->getBody()->getContents())->data;

        $data = collect($resp_kunci)->map(function ($item) use ($resp_jawaban) {
            if (collect($resp_jawaban)->where('soal_id', $item->id)->first() == null) {
                $item->jawabanku = null;
            } else {
                $item->jawabanku = collect($resp_jawaban)->where('soal_id', $item->id)->first()->jawaban;
            }
            return $item;
        });

        return view('testapi', compact('token', 'data'));
    }
}
