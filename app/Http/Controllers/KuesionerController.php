<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KuesionerController extends Controller
{

    public function index()
    {
        $data = Kuesioner::paginate(10);
        return view('superadmin.kuesioner.index', compact('data'));
    }

    public function create()
    {
        return view('superadmin.kuesioner.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' =>  'unique:kuesioner',
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('kode kuesioner sudah ada');
            return back();
        }
        Kuesioner::create($request->all());

        toastr()->success('Sukses Di Simpan');
        return redirect('/superadmin/kuesioner');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Kuesioner::find($id);

        return view('superadmin.kuesioner.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' =>  'unique:kuesioner,pertanyaan,' . $id,
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('kuesioner sudah ada');
            return back();
        }

        $attr = $request->all();

        Kuesioner::find($id)->update($attr);

        toastr()->success('Sukses Di Update');
        return redirect('/superadmin/kuesioner');
    }

    public function destroy($id)
    {
        Kuesioner::find($id)->delete();
        toastr()->success('Sukses Di Hapus');
        return back();
    }
}
