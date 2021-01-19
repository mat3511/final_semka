<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index() {
        $fans = Fan::orderBy('id', 'DESC')->get();
        return view('fans', compact('fans'));
    }

    public function add(Request $request) {
        $fan = new Fan();
        $fan->first_name = $request->first_name;
        $fan->last_name = $request->last_name;
        $fan->nick_name = $request->nick_name;
        $fan->save();
        return response()->json($fan);
    }

    public function delete($id) {
        $fans = Fan::find($id);
        $fans->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }
}
