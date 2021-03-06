<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient_Model;
use App\Models\History_Model;

class Testing extends Controller
{
    public function index()
    {
        $patient = Patient_Model::all();
        $testing = 'active';
        return view('Testing', compact('patient', 'testing'));
    }

    public function saved()
    {
        $saved = History_Model::all();
        $stored_data = 'active';
        return view('Saved', compact('saved', 'stored_data'));
    }

    public function store(Request $request)
    {
        try {

            $create_training = [
                'l_core' => $request->l_core,
                'l_surf' => $request->l_surf,
                'l_o2' => $request->l_o2,
                'l_bp' => $request->l_bp,
                'surf_stbl' => $request->surf_stbl,
                'core_stbl' => $request->core_stbl,
                'bp_stbl' => $request->bp_stbl,
                'comfort' => $request->comfort,
                'result_a' => $request->resultA,
                'result_s' => $request->resultS,
                'result' => $request->result,
            ];

            History_Model::create($create_training);
        } catch (Exception $e) {

            return $e;
        }

        return 'success';
    }

    public function destroy($id)
    {
        try {
            History_Model::find($id)->delete();
        } catch (Exception $e) {
            return $e;
        }

        return 'success';
    }
}
