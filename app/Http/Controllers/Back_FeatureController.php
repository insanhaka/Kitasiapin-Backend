<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Yajra\DataTables\DataTables;

class Back_FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Fitur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Fitur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buat = Feature::create($request->all());

        if ($buat) {
            return redirect()->route('fitur.index')->with('success','Data Berhasil Dibuat');
        }else {
            return back()->with('error', 'Upps.. Error Nih')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old = Feature::findOrFail($id);
        return view('Backend.Fitur.edit', ['data'=>$old]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ubah = Feature::find($id)->update($request->all());

        if ($ubah) {
            return redirect()->route('fitur.index')->with('success','Data Berhasil Diubah');
        }else {
            return back()->with('error', 'Upps.. Error Nih')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Feature::find($id);
        $hapus = $data->delete();

        if ($hapus) {
            return redirect()->route('fitur.index')->with('success','Data Berhasil Dihapus');
        }else {
            return back()->with('error', 'Upps.. Error Nih');
        }
    }

    public function serverside()
    {
        $data = Feature::query();
        return Datatables::of($data)
            ->orderColumn('name', function ($query, $order) {
                $query->orderBy('name', 'asc');
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a title="EDIT" style="margin-right: 20px;" href="' .route('fitur.edit', ['fitur' => $data->id]). '"><i class="fa fa-edit text-warning" style="font-size: 21px;"></i></a>
                                <a title="DELETE" style="margin-right: 10px;" href="' .route('fitur.delete', ['id' => $data->id]). '"><i class="fa fa-trash text-danger" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
