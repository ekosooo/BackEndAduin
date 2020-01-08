<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Transformers\PengaduTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Transformers\PengaduanTransformer;
use App\Status;

class PengaduanController extends Controller
{
    //controller web
    public function index(Pengaduan $pengaduan)
    {
        $getrole = auth()->user()->role_id;
        $pengaduan = DB::table('pengaduan')
            ->join('pengadu', 'pengaduan.pengadu_id', '=', 'pengadu.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->join('role_status', 'status.id', '=', 'role_status.status_id')
            ->where('role_id', '=', $getrole)
            ->orderBy('pengaduan.created_at', 'DESC')
            ->paginate(5);

        return view('pengaduan.index', compact('pengaduan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit($pengaduan_id)
    {
        $data = DB::table('pengaduan')
        ->join('pengadu', 'pengaduan.pengadu_id', '=', 'pengadu.id')
        ->join('status', 'pengaduan.status_id', '=', 'status.id')
        ->where('pengaduan_id', '=', $pengaduan_id)
        ->get();

        $getrole = auth()->user()->role_id;
        $data1 = DB::table('status')
            ->join('role_status', 'status.id', '=', 'role_status.status_id')
            ->where('role_id', '=', $getrole)
            ->get();

        return view('pengaduan.show', compact('data', 'data1'));
    }

    public function update(Request $request, $pengaduan_id)
    {
        $data = \App\Pengaduan::find($pengaduan_id);
        $data->update($request->all());

        return redirect('/pengaduan');
    }

    public function search(Request $request)
    {
        $i = 0;
        $search = $request->get('search');
        $data = DB::table('pengaduan')
            ->join('pengadu', 'pengaduan.pengadu_id', '=', 'pengadu.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('barang', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('pengaduan.index', ['pengaduan' => $data, 'i' => $i]);
    }

    //controller API
    public function post(Request $request, Pengaduan $pengaduan)
    {
       if($request->gambar){

           $data = array();
           $time = time();
           $entry = base64_decode($request->gambar);
           $img = imagecreatefromstring($entry);

           $directory = public_path('images/' .$time.".jpg");
           imagejpeg($img, $directory);
           imagedestroy($img);
       }

        $pengaduan = $pengaduan->create([
            'pengadu_id'        => $request->pengadu_id,
            'ruangan'           => $request->ruangan,
            'barang'            => $request->barang,
            'keterangan'        => $request->keterangan,
            'gambar'            => $time.".jpg",
            // 'gambar'            => $request->gambar,
            'status_id'         => $request->status_id,
            'tindakan'          => $request->tindakan,
        ]);

        $response = fractal()
            ->item($pengaduan)
            ->transformWith(new PengaduanTransformer)
            ->toArray();

        return response()->json($response, 201);
    }

}
