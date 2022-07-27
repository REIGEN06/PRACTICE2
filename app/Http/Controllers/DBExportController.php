<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DBExportController extends Controller
{
    public function exportLicenceCondition(Request $request)
    {
        $result = DB::table('licence_condition')
        ->orderBy('id', 'asc')
        ->get();
        return $this->sendResponse($result->toArray(), 'licence_conditions');
    }

	public function exportChild(Request $request)
    {
        if ($request->message == 'licence_conditions')
        {
            $subsoil_user_id_array = DB::table('licence')//Количество записей
            ->select('subsoil_user_id')
            ->distinct('subsoil_user_id')
            ->where('licence_condition_id', $request->id)
            ->get();

            for ( $i=0; $i < count($subsoil_user_id_array);$i++)
            {
                $subsoil_user_id_array_unit = DB::table('licence')
                ->select('subsoil_user_id')
                ->distinct('subsoil_user_id')
                ->where('licence_condition_id', $request->id)
                ->get()[$i]->subsoil_user_id; 

                $array[]=$subsoil_user_id_array_unit;
            }
            $result = DB::table('subsoil_user')
            ->whereIn('id', $array)
            ->get();

            for ( $i=0; $i < count($result);$i++)
            {
                $result[$i]->condition = $request->id;
            }
            
            return $this->sendResponse($result->toArray(), 'users');
        }
        
        if ($request->message == 'users')
        {
            
            $licence_id_array = DB::table('licence')//Количество записей
            ->where('subsoil_user_id', $request->id)
            ->where('licence_condition_id', $request->condition)
            ->get();
            
            for ( $i=0; $i < count($licence_id_array);$i++)
            {
                $licence = DB::table('licence')
                ->where('subsoil_user_id', $request->id)
                ->where('licence_condition_id', $request->condition)
                ->get()[$i]; 

                $licence->licence_number = $licence->series . $licence->number . $licence->view;
                
                $licence_area_name = DB::table('licence_area')
                ->where('id', $licence->licence_area_id)
                ->get()[0]->name; 

                $licence->name = $licence_area_name . ' ' . '(' . $licence->licence_number . ')';
                
                $licence_array[] = $licence;
            }
            
            $result = $licence_array;
            
            return $this->sendResponse($result, 'licence');
        }
        if ($request->message == 'licence')
        {
            $licence = DB::table('licence')
            ->where('id', $request->id)
            ->get()[0];
            
            $licence_area = DB::table('licence_area')
            ->select('name')
            ->where('id', $licence->licence_area_id)
            ->get()[0];
            
            $licence_status = DB::table('licence_status')
            ->select('status')
            ->where('id', $licence->licence_status_id)
            ->get()[0];

            $type_of_main_mineral = DB::table('type_of_main_mineral')
            ->select('name')
            ->where('id', $licence->type_of_main_mineral_id)
            ->get()[0];

            $user = DB::table('subsoil_user')
            ->where('id', $licence->subsoil_user_id)
            ->get()[0];

            $condition = DB::table('licence_condition')
            ->where('id', $licence->licence_condition_id)
            ->get()[0];

            $licence->condition = $condition->condition;

            $licence->licence_number = $licence->series . $licence->number . $licence->view;

            $licence->initial_time = $licence->date_of_receiving;

            if ($licence->previous_licence_id != null){
                $prev_licence = $this->addPreviousLicence($licence);
                $licence->prev_licences[]=$prev_licence;
                $licence->initial_time=$prev_licence->date_of_receiving;
                while ($prev_licence->previous_licence_id != null)
                {
                    $prev_licence = $this->addPreviousLicence($prev_licence);
                    $licence->prev_licences[]=$prev_licence;
                    $licence->initial_time=$prev_licence->date_of_receiving;
                }
            }
            
            $result = $licence;

            $result->licence_area = $licence_area->name;

            $result->licence_status = $licence_status->status;

            $result->type_of_main_mineral = $type_of_main_mineral->name;
            
            $result->name = $user->name;
            
            return $this->sendResponse($result, 'licence_card');
        }
    }
    public function addPreviousLicence($licence)
    {
        $prev_licence = DB::table('licence')
        ->where('id', $licence->previous_licence_id)
        ->get()[0];

        $user = DB::table('subsoil_user')
        ->where('id', $prev_licence->subsoil_user_id)
        ->get()[0];

        $condition = DB::table('licence_condition')
        ->where('id', $prev_licence->licence_condition_id)
        ->get()[0];

        $prev_licence->name = $user->name;

        $prev_licence->condition = $condition->condition;

        $prev_licence->licence_number = $prev_licence->series . $prev_licence->number . $prev_licence->view;

        return $prev_licence;
    }
	public function searchUser(Request $request)
    {//проверка на существование лицензии
        $licence = DB::table('licence')
        ->where(DB::raw('concat (series, number, view)'), $request->name)
        ->get();
        
        if (isset($licence[0]) == false){
            $result = null;
            return $this->sendResponse($result, 'notSearched');
        };

        $licence = DB::table('licence')
        ->where(DB::raw('concat (series, number, view)'), $request->name)
        ->get()[0];

        $licence_area = DB::table('licence_area')
        ->select('name')
        ->where('id', $licence->licence_area_id)
        ->get()[0];
        
        $licence_status = DB::table('licence_status')
        ->select('status')
        ->where('id', $licence->licence_status_id)
        ->get()[0];

        $type_of_main_mineral = DB::table('type_of_main_mineral')
        ->select('name')
        ->where('id', $licence->type_of_main_mineral_id)
        ->get()[0];

        $user = DB::table('subsoil_user')
        ->where('id', $licence->subsoil_user_id)
        ->get()[0];

        $condition = DB::table('licence_condition')
        ->where('id', $licence->licence_condition_id)
        ->get()[0];

        $licence->condition = $condition->condition;

        $licence->licence_number = $licence->series . $licence->number . $licence->view;

        $licence->initial_time = $licence->date_of_receiving;

        if ($licence->previous_licence_id != null){
            $prev_licence = $this->addPreviousLicence($licence);
            $licence->prev_licences[]=$prev_licence;
            $licence->initial_time=$prev_licence->date_of_receiving;
            while ($prev_licence->previous_licence_id != null)
            {
                $prev_licence = $this->addPreviousLicence($prev_licence);
                $licence->prev_licences[]=$prev_licence;
                $licence->initial_time=$prev_licence->date_of_receiving;
            }
        }
        
        $result = $licence;

        $result->licence_area = $licence_area->name;

        $result->licence_status = $licence_status->status;

        $result->type_of_main_mineral = $type_of_main_mineral->name;
        
        $result->name = $user->name;
        
        return $this->sendResponse($result, 'searched');
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
