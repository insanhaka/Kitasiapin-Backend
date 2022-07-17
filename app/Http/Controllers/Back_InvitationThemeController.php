<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation_theme;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Back_InvitationThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Tema_Undangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Tema_Undangan.create');
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
        //
    }

    public function serverside()
    {
        $data = Invitation_theme::query();
        return Datatables::of($data)
            ->orderColumn('name', function ($query, $order) {
                $query->orderBy('name', 'asc');
            })
            ->addColumn('code', function ($data) {
                $code = '<td>'.$data->code.'</td>';
                return $code;
            })
            ->addColumn('thumbnail', function ($data) {
                if ($data->thumbnail == null) {
                    $icon = '<td> <img src="'.asset('assets/img/icon/no-image.png').'" class="img-fluid" alt="Responsive image" width="30"> </td>';
                }else {
                    $path = Storage::url('theme/'.$data->thumbnail);
                    $icon = '<td> <img src="'.$path.'" class="img-fluid" alt="Responsive image" width="30"> </td>';
                }
                return $icon;
            })
            ->addColumn('activation', function ($data) {
                if ($data->is_active == 0) {
                    $active = '<td> <a class="btn btn-secondary btn-sm" style="margin-right: 10px;" href="'.route('tema-undangan.activation', ['id'=>$data->id, 'data'=>'1']).'">OFF</a></td>';
                }else {
                    $active = '<td> <a class="btn btn-success btn-sm" style="margin-right: 20px;" href="'.route('tema-undangan.activation', ['id'=>$data->id, 'data'=>'0']).'">ON</a> </td>';
                }
                return $active;
            })
            ->addColumn('action', function ($data) {
                $action = '<td>
                                <a title="EDIT" style="margin-right: 20px;" href="' .route('tema-undangan.edit', ['tema_undangan' => $data->id]). '"><i class="fa fa-edit text-warning" style="font-size: 21px;"></i></a>
                                <a title="DELETE" style="margin-right: 10px;" href="' .route('tema-undangan.delete', ['id' => $data->id]). '"><i class="fa fa-trash text-danger" style="font-size: 21px;"></i></a>
                            </td>';
                return $action;
            })
            ->rawColumns(['name', 'code', 'thumbnail', 'activation', 'action'])
            ->make(true);
    }
}
