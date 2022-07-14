<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Package_has_feature;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class Back_PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Paket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'name.required' => 'Nama paket diisi ya..',
            'old_price.required' => 'Harga Awal Diisi dong..',
            'sell_price.required' => 'Harga Jual Diisi dong..'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'old_price' => 'required',
            'sell_price' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        } else {

            $package = new Package;
            $package->name          = $request->name;
            $package->old_price     = $request->old_price;
            $package->sell_price    = $request->sell_price;
            $package->best          = $request->best;
            $package->premium       = $request->premium;
            $package->is_active     = 1;

            $buat = $package->save();

            if ($buat) {
                return redirect()->route('paket.index')->with('success','Data Berhasil Dibuat');
            }else {
                return back()->with('error', 'Upps.. Error Nih')->withInput();
            }
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
        $get_paket = Package::find($id);
        $feature = Feature::all();
        return view('Backend.Paket.show', ['data'=>$get_paket, 'features'=>$feature]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old = Package::findOrFail($id);
        return view('Backend.Paket.edit', ['data'=>$old]);
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
        // dd($request->all());
        $ubah = Package::find($id)->update($request->all());

        if ($ubah) {
            return redirect()->route('paket.index')->with('success','Data Berhasil Dibuat');
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
        $data = Package::find($id);
        $hapus = $data->delete();

        if ($hapus) {
            return redirect()->route('paket.index')->with('success','Data Berhasil Dihapus');
        }else {
            return back()->with('error', 'Upps.. Error Nih');
        }
    }

    public function activation($id, $data)
    {
        $old = Package::find($id);
        $old->is_active = $data;
        $active = $old->save();

        if ($active) {
            return redirect()->route('paket.index')->with('success','Data Berhasil Diubah');
        }else {
            return redirect()->route('paket.index')->with('error', 'Upps, Error nih');
        }

    }

    public function fitur(Request $request, $id)
    {
        // dd($request->all());

        $get_paket = Package::find($id);

        $fitur_paket_delete = Package_has_feature::where('package_id', $id)->delete();

        foreach ($request->fitur as $fitur_id) {

            $pivot1 = Package_has_feature::create([
                'package_id' => $get_paket->id,
                'feature_id' => $fitur_id,
            ]);

        }

        return redirect()->route('paket.index')->with('success','Data Berhasil Dibuat');
    }

    public function serverside()
    {
        $data = Package::query();
        return Datatables::of($data)
            ->orderColumn('name', function ($query, $order) {
                $query->orderBy('name', 'asc');
            })
            ->addColumn('old_price', function ($data) {
                $old_price = '<td>' . $data->old_price . '</td>';
                return $old_price;
            })
            ->addColumn('sell_price', function ($data) {
                $sell_price = '<td>' . $data->sell_price . '</td>';
                return $sell_price;
            })
            ->addColumn('best', function ($data) {
                $best = '<td>' . $data->best . '</td>';
                return $best;
            })
            ->addColumn('premium', function ($data) {
                $premium = '<td>' . $data->premium . '</td>';
                return $premium;
            })
            ->addColumn('view', function ($data) {
                $view = '<td>
                            <a title="FEATURE" style="margin-right: 10px;" href="' .route('paket.view', ['id' => $data->id]). '"><i class="fa fa-list-alt text-info" style="font-size: 21px;"></i></a>
                        </td>';
                return $view;
            })
            ->addColumn('activation', function ($data) {
                if ($data->is_active == 0) {
                    $active = '<td> <a class="btn btn-secondary btn-sm" style="margin-right: 10px;" href="'.route('paket.activation', ['id'=>$data->id, 'data'=>'1']).'">OFF</a></td>';
                }else {
                    $active = '<td> <a class="btn btn-success btn-sm" style="margin-right: 20px;" href="'.route('paket.activation', ['id'=>$data->id, 'data'=>'0']).'">ON</a> </td>';
                }
                return $active;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a title="EDIT" style="margin-right: 20px;" href="' .route('paket.edit', ['paket' => $data->id]). '"><i class="fa fa-edit text-warning" style="font-size: 21px;"></i></a>
                                <a title="DELETE" style="margin-right: 10px;" href="' .route('paket.delete', ['id' => $data->id]). '"><i class="fa fa-trash text-danger" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'old_price', 'sell_price', 'best', 'premium', 'view',
            'activation', 'action'])
            ->make(true);
    }

}
