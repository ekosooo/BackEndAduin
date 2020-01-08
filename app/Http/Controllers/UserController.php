<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{


    public function index(User $admin)
    {
        $admin = DB::table('user')
            ->join('role', 'user.role_id', '=', 'role.role_id')
            ->orderBy('role.role_id', 'ASC')
            ->paginate(5);

        return view('admin.index', compact('admin'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, User $admin)
    {
        $this->validate($request,[
            'nip' => 'required|unique:user',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $admin->create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'jabatan' => $request->jabatan,
            'role_id' => $request->role_id,
        ]);
        

        return redirect('admin')->with('success', 'Data berhasi di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id, Role $role)
    {
        $data = DB::table('user')
            ->join('role', 'user.role_id', '=', 'role.role_id')
            ->where('user.user_id', '=', $id)
            ->get();
        $combo = $role->all();
//        dd($data);
        return view('admin.edit', compact('data', 'combo'));
    }

    public function update(Request $request, $id)
    {
        $data = \App\User::find($id);
        $data->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
//            'password' => bcrypt($request->password),
            'jabatan' => $request->jabatan,
            'role_id' => $request->role_id,
        ]);
        return redirect('/admin');
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect('admin')->with('success', 'Data Delete');
    }

    public function registeradmin(Role $role)
    {
        $combo = $role->all();
        return view('admin.register', compact('combo'));
    }
}
