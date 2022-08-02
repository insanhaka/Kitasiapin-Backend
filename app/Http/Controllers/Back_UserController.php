<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\User;

class Back_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = User::find($id);
        $hapus = $data->delete();

        if ($hapus) {
            return redirect()->route('pengguna.index')->with('success','Data Berhasil Dihapus');
        }else {
            return redirect()->route('pengguna.index')->with('error', 'Upps, Error nih');
        }
    }

    public function activation($id, $data)
    {
        $old = User::find($id);
        $old->is_active = $data;
        $active = $old->save();

        if ($active) {
            return redirect()->route('pengguna.index')->with('success','Data Berhasil Diubah');
        }else {
            return redirect()->route('pengguna.index')->with('error', 'Upps, Error nih');
        }

    }

    public function serverside()
    {
        $data = User::where('role_id', 3)->get();
        return DataTables::of($data)

        // ->orderColumn('name', function ($query, $order) {
        //     $query->orderBy('name', 'asc');
        // })
        ->addColumn('name', function ($data) {
            $name = '<td>'.$data->name.'</td>';
            return $name;
        })
        ->addColumn('email', function ($data) {
            $email = '<td>'.$data->email.'</td>';
            return $email;
        })
        ->addColumn('registered', function ($data) {
            $registered = '<td>'.$data->created_at->diffForHumans().'</td>';
            return $registered;
        })
        ->addColumn('activation', function ($data) {
            if ($data->is_active == 0) {
                $active = '<td> <a class="btn btn-secondary btn-sm" style="margin-right: 10px;" href="'.route('pengguna.activation', ['id'=>$data->id, 'data'=>'1']).'">OFF</a></td>';
            }else {
                $active = '<td> <a class="btn btn-success btn-sm" style="margin-right: 20px;" href="'.route('pengguna.activation', ['id'=>$data->id, 'data'=>'0']).'">ON</a> </td>';
            }
            return $active;
        })
        ->addColumn('action', function ($data) {
            $action = '<td>
                            <a style="margin-right: 10px;" href="'.route('pengguna.delete', ['id' => $data->id]).'"><i class="fa fa-trash text-danger" style="font-size: 21px;"></i></a>
                        </td>';
            return $action;
        })
        ->rawColumns(['name', 'email', 'registered', 'activation', 'action'])
        ->make(true);
    }
}
