<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DBExportController extends Controller
{
    public function exportLicenceCondition(Request $request)
    {
        $result = DB::table('licence_condition')->get();
        return $this->sendResponse($result->toArray(), 'licences');
    }

	public function exportChild(Request $request, $id, $message)
    {
        if ($message = 'licences')
        {
            if ($id = '1')//Аннулированная (Истечение срока)
            {
                $subsoil_user_id = DB::table('licence')
                ->distinct('subsoil_user_id')
                ->where('licence_condition_id', '1');

                $result = DB::table('subsoil_user')
                ->whereIn('id', $subsoil_user_id);

                return $this->sendResponse($result->toArray(), 'users');
            }
        }
        
    }

	public function exportLicence(Request $request)
    {
        $result = DB::table('licence')->get();
        return $this->sendResponse($result->toArray(), 'licence');
    }

	public function searchUser()
    {
        dump('nn');
        $result = DB::table('subsoil_user')
		->where('name', 'like', '%$search%')
		->get();
        return $this->sendResponse($result->toArray(), 'users');
    }

	public function sendResponse($result, $message) {
		$response = [
			'success' => true,
			'data'    => $result,
			'message' => $message,
		];

		return response()->json($response, 200);
	}
}
