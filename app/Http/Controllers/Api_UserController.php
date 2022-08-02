<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use stdClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class Api_UserController extends Controller
{
    public function getuser($id)
    {
        $get_user  = User::where('id', $id)->get();

        $data = array();
        foreach ($get_user as $u) {
            $item                           = new stdClass();
            $item->id                       = $u->id;
            $item->name                     = $u->name;
            $item->email                    = $u->email;

            array_push($data, $item);
        }

        return response()->json([
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function updateuser(Request $request)
    {
        $messages = [
            'password.required' => 'Password harap diisi',
            'password.min' => 'Password diisi minimal 8 karakter ya',
            'image.mimes' => 'Format file harus JPEG/PNG/JPG..',
        ];

        $validator = Validator::make( $request->all(), [
            'password' => 'required|min:8',
            // 'image' => 'mimes:jpeg,png,jpg',
        ], $messages );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'data' => $validator->errors()->first()
            ]);
        }else {

            $data = User::find($request->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $file = $request->file('image');

            if($file == null){
                $simpan = $data->save();
                if ($simpan) {
                    return response()->json([
                        'message' => 'success',
                        'data' => 'Data berhasil di perbarui'
                    ]);
                }else {
                    return response()->json([
                        'message' => 'error',
                        'data' => 'Opps.. Ada masalah pada pemrosesan data',
                    ]);
                }
            }else{
                $nama_file = time()."_".$file->getClientOriginalName();
                // Proses file diupload ke storage
                $path = Storage::putFileAs('public/profile-picture', $file, $nama_file);
                $data->photo = $nama_file;

                $simpan = $data->save();
                if ($simpan) {
                    return response()->json([
                        'message' => 'success',
                        'data' => 'Data berhasil di perbarui'
                    ]);
                }else {
                    return response()->json([
                        'message' => 'error',
                        'data' => 'Opps.. Ada masalah pada pemrosesan data',
                    ]);
                }
            }
        }

    }
}
