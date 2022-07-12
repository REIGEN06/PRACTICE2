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

	public function exportSubsoilUser(Request $request)
    {
        $result = DB::table('subsoil_user')->get();
        return $this->sendResponse($result->toArray(), 'users');
    }

	public function searchUser(Request $request, $search)
    {
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
