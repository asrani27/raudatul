<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StakeholderController extends Controller
{
    public function index()
    {
        $data = Stakeholder::paginate(10);
        return view('superadmin.stakeholder.index', compact('data'));
    }

    public function create()
    {
        return view('superadmin.stakeholder.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>  'unique:stakeholder',
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('Email stakeholder sudah ada');
            return back();
        }
        Stakeholder::create($request->all());

        toastr()->success('Sukses Di Simpan');
        return redirect('/superadmin/stakeholder');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Stakeholder::find($id);

        return view('superadmin.stakeholder.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' =>  'unique:stakeholder,email,' . $id,
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('Email stakeholder sudah ada');
            return back();
        }

        $attr = $request->all();

        Stakeholder::find($id)->update($attr);

        toastr()->success('Sukses Di Update');
        return redirect('/superadmin/stakeholder');
    }

    public function destroy($id)
    {
        Stakeholder::find($id)->delete();
        toastr()->success('Sukses Di Hapus');
        return back();
    }

    public function akun($id)
    {
        $role = Role::where('name', 'stakeholder')->first();
        //Create User Peserta
        $stake = Stakeholder::find($id);
        $n = new User;
        $n->name = $stake->nama;
        $n->username = $stake->email;
        $n->password = bcrypt('123456');
        $n->save();

        $n->roles()->attach($role);

        $stake->update(['user_id' => $n->id]);

        toastr()->success('Akun sukses di buat, Password : 123456');
        return back();
    }

    public function pass($id)
    {
        $d = Stakeholder::find($id);
        $u = $d->user;
        $u->password = bcrypt('123456');
        $u->save();

        toastr()->success('Password Baru : 123456');
        return back();
    }
}
