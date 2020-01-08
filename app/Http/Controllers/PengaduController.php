<?php

namespace App\Http\Controllers;

use App\Pengadu;
use Illuminate\Http\Request;
use App\Transformers\PengaduTransformer;
use Auth;
use Illuminate\Support\Facades\DB;

class PengaduController extends Controller
{
    protected $guard = 'api';
    //fungsi untuk menambahkan user kedatabase
    public function register(Request $request, Pengadu $pengadu)
    {
        $this->validate($request,[
            'nim' => 'required|unique:pengadu',
            'password' => 'required',
        ]);


        $pengadu = $pengadu->create([
            'nim'       => $request->nim,
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'prodi'     => $request->prodi,
            'hp'        => $request->tlp,
            'profile'   => $request->profile,
            'status'    => 'Tidak Aktif',

        ]);

        $response = fractal()
            ->item($pengadu)
            ->transformWith(new PengaduTransformer)
            ->toArray();

        return response()->json($response, 201);
    }

    public function login(Request $request, Pengadu $pengadu)
    {

        if (Auth::guard('api')
            ->attempt([
                'nim' => $request->nim,
                'password' => $request->password,
                'status' => 'Aktif'
            ])) {

         $pengadu = $pengadu->find(Auth::guard('api')->user()->id);

            return $response = fractal()
                ->item($pengadu)
                ->transformWith(new PengaduTransformer)
                ->toArray();
        }
        else if (Auth::guard('api')
            ->attempt([
                'nim' => $request->nim,
                'password' => $request->password,
            ])) {
            return response()->json(['eror' => 'Menunggu Aktifasi Dari Admin'], 401);
        }else{
            return response()->json(['eror' => 'Your Credential Wrong'], 401);
        }
    }

    public function pengadu(Pengadu $pengadu)
    {
        $pengadu = $pengadu->all();

        return fractal()
            ->collection($pengadu)
            ->transformWith(new PengaduTransformer)
            ->toArray();
    }

    public function profileById(Pengadu $pengadu, $id)
    {
        $pengadu = $pengadu->find($id);
       
        return fractal()
            ->item($pengadu)
            ->transformWith(new PengaduTransformer)
            ->includePengaduan()
            ->toArray();
    }

    //web
    public function index(Request $request)
    {
        $pengadu = DB::table('pengadu')->orderBy('status', 'DESC')->paginate(5);

        return view('pengadu.index', compact('pengadu'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function registerpengadu(Request $request)
    {
        return view('pengadu.register');
    }

    public function store(Request $request, Pengadu $pengadu)
    {
        $this->validate($request,[
            'nim' => 'required|unique:pengadu',
            'password' => 'required',
            'nama'  => 'required',
            'password' => 'required'
        ]);
        $pengadu->create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'prodi' => $request->prodi,
        ]);

        return redirect('pengadu')->with('success', 'Data berhasi di tambahkan');
    }

    public function edit($id)
    {
        $data = DB::table('pengadu')
            ->where('id', '=', $id)
            ->get();
        return view('pengadu.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = \App\Pengadu::find($id);
//        $data->update($request->all());
        $data->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
//            'password' => bcrypt($request->password),
            'prodi' => $request->prodi,
        ]);

        return redirect('/pengadu');
    }

    public function aktifasi(Request $request, $id)
    {
        $data = Pengadu::find($id);
        $data->update([
            'status' => $request->status,
        ]);

        return redirect('/pengadu');
    }

    public function search(Request $request)
    {
        $i = 0;
        $search = $request->get('search');
        $pengadu = DB::table('pengadu')->where('nim', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('pengadu.index', ['pengadu' => $pengadu, 'i' => $i]);
    }

}
