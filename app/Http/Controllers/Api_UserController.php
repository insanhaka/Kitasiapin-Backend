<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use stdClass;

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
}
