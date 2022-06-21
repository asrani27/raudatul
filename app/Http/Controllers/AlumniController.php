<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function index()
    {
        $data = Alumni::paginate(10);
        return view('superadmin.alumni.index', compact('data'));
    }

    public function create()
    {
        $jurusan = Jurusan::get();
        return view('superadmin.alumni.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' =>  'unique:alumni',
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('NIM alumni sudah ada');
            return back();
        }
        Alumni::create($request->all());

        toastr()->success('Sukses Di Simpan');
        return redirect('/superadmin/alumni');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Alumni::find($id);

        $jurusan = Jurusan::get();
        return view('superadmin.alumni.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nim' =>  'unique:alumni,nim,' . $id,
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('NIM alumni sudah ada');
            return back();
        }

        $attr = $request->all();

        Alumni::find($id)->update($attr);

        toastr()->success('Sukses Di Update');
        return redirect('/superadmin/alumni');
    }

    public function destroy($id)
    {
        Alumni::find($id)->delete();
        toastr()->success('Sukses Di Hapus');
        return back();
    }

    public function akun($id)
    {
        $role = Role::where('name', 'alumni')->first();
        //Create User Peserta
        $alumni = Alumni::find($id);
        $n = new User;
        $n->name = $alumni->nama;
        $n->username = $alumni->nim;
        $n->password = bcrypt('123456');
        $n->save();

        $n->roles()->attach($role);

        $alumni->update(['user_id' => $n->id]);

        toastr()->success('Akun sukses di buat, Password : 123456');
        return back();
    }

    public function pass($id)
    {
        $d = Alumni::find($id);
        $u = $d->user;
        $u->password = bcrypt('123456');
        $u->save();

        toastr()->success('Password Baru : 123456');
        return back();
    }
}
