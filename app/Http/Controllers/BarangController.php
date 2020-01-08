<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Transformers\BarangTransformer;


class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = DB::table('barang')->orderBy('barang', 'ASC')->paginate(5);

        return view('barang.index', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'barang' => 'required|unique:barang',
        ]);
        Barang::create($request->all());

        return redirect('/barang')->with('success', 'Data berhasi di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {


        $barang = Barang::find($request->id);
        $barang->update($request->all());

        return redirect('/barang')->with('success', 'Data berhasi di edit');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('/barang')->with('success', 'Data berhasil di hapus');
    }

    public function search(Request $request)
    {
        $i = 0;
        $search = $request->get('search');
        $barang = DB::table('barang')->where('barang', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('barang.index', ['barang' => $barang, 'i' => $i]);
    }

    //controller API
    public function barang(Barang $barang)
    {
        $barang = $barang->orderBy('barang', 'ASC')->get();
        $response = fractal()
            ->collection($barang)
            ->transformWith(new BarangTransformer)
            ->toArray();
        //echo json_encode($response);
        return response()->json($response, 201);
    }
}
