<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Transformers\RuanganTransformer;

class RuanganController extends Controller
{
    public function index(Request $request)
    {

        $ruangan = DB::table('ruangan')->orderBy('ruangan', 'ASC')->paginate(5);
        return view('ruangan.index', compact('ruangan'))->with('i', (request()->input('page', 1) -1) *5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ruangan' => 'required|unique:ruangan',
        ]);
        Ruangan::create($request->all());
        return redirect('ruangan')->with('success', 'Data berhasi di tambahkan');
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
        $ruangan = Ruangan::find($request->id);
        $ruangan->update($request->all());

        return redirect('ruangan')->with('success', 'Data berhasi di update');
    }

    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->delete();

        return redirect('ruangan')->with('success', 'Data berhasil di delete');
    }

    public function search(Request $request)
    {
        $i = 0;
        $search = $request->get('search');
        $ruangan = DB::table('ruangan')->where('ruangan', 'LIKE', '%'.$search.'%')->paginate(5);
        return view('ruangan.index', ['ruangan' => $ruangan, 'i' => $i]);
    }

    //controller untuk API
    public function ruangan(Ruangan $ruangan)
    {
        $ruangan = $ruangan->orderBy('ruangan', 'ASC')->get();

        $response = fractal()
            ->collection($ruangan)
            ->transformWith(new RuanganTransformer)
            ->toArray();

        //echo json_encode($response);
        return response()->json($response, 201);
    }
}
