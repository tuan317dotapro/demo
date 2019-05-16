<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Rooms;
use App\Models\Rankings;
use App\Models\Salaries;
use App\Models\Projects;
use App\Http\Requests\SaveStaffInfo;

class StaffController extends Controller
{
	public function index(Request $request, Staff $staff, Rooms $room, Rankings $ranking, Projects $project, Salaries $sal)
	{
		$keyword = trim($request->q);

		$data = [];
		$data['mess'] = $request->session()->get('addSt');
		// $data['rooms'] = $room->getAllDataRooms();
		// $data['rankings'] = $ranking->getAllDataRankings();
		$data['projects'] = $project->getAllDataProjects();

		$lstSt = $staff->getAllDataStaff($keyword);
		$arrSt = ($lstSt) ? $lstSt->toArray() : [];
		$data['lstSt'] = $arrSt['data'];
		$data['link'] = $lstSt;

		foreach ($data['lstSt'] as $key => $item) {
			// $data['lstSt'][$key]['rooms_id'] = json_decode($item['rooms_id'],true);
			// $data['lstSt'][$key]['rankings_id'] = json_decode($item['rankings_id'],true);
			$data['lstSt'][$key]['projects_id'] = json_decode($item['projects_id'],true);
		}


		// foreach ($data['lstSt'] as $key => $item) {
  //           foreach ($data['rooms'] as $k => $val) {
  //               if (in_array($val['id'],$item['rooms_id'])) {
  //                   $data['lstSt'][$key]['rooms_id']['name_room'][] = $val['room_name'];
  //               }
  //           }   
  //       }

		// foreach ($data['lstSt'] as $key => $item) {
		// 	foreach ($data['rankings'] as $k => $val) {
		// 		if (in_array($val['id'], $item['rankings_id'])) {
		// 			$data['lstSt'][$key]['rankings_id']['name_ranking'][] = $val('ranking_name');
		// 		}
		// 	}
		// }

		foreach ($data['lstSt'] as $key => $item) {
			foreach ($data['projects'] as $k => $val) {
				if (in_array($val['id'], $item['projects_id'])) {
					$data['lstSt'][$key]['projects_id']['name_project'][] = $val('project_name');
				}
			}
		}
		dd($data['lstSt']);
		return view('admin.staff.index',$data);
	}

	public function addStaff(Request $request, Rooms $room, Rankings $ranking, Projects $project)
	{
		$data = [];
		$data['rooms'] = $room->getAllDataRooms();
		$data['rankings'] = $ranking->getAllDataRankings();
		$data['projects'] = $project->getAllDataProjects();
		$data['mess'] = $request->session()->get('addSt');

		return view('admin.staff.add_view', $data);
	}

	public function handleAddStaff(SaveStaffInfo $request, Staff $staff)
	{
		// lấy dữ liệu từ form 
		$nameStaff = $request->nameStaff;
		$rooms = $request->room;
		$rankings = $request->ranking;
		$projects = $request->project;
		$birth = $request->birth;
		$gender = $request->gender;
		$address = $request->address;
		$phone = $request->phone;
		$email = $request->email;
		
		$dataInsert = [
			'name_staff' => $nameStaff,
			'rooms_id' => json_encode($rooms),
			'rankings_id' =>json_encode($rankings),
			'projects_id' =>json_encode($projects),
			'birth' => $birth,
			'gender' => $gender,
			'address' => $address,
			'email' => $email,
			'phone' => $phone,
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => null
		];
		if ($staff->addDataStaff($dataInsert)) {
			$request->session()->flash('addSt','success');
			// dd($dataInsert);
			return redirect()->route('admin.addStaff');
		} else {
			$request->session()->flash('addSt','fail');
			return redirect()->route('admin.addStaff');
		}
	}

	public function editStaff($id, Request $request, Staff $staff, Rooms $room, Rankings $ranking, Projects $project)
	{
		$id = is_numeric($id) ? $id : 0;
		$infoSt = $staff->getInfoDataStaffById($id);
		if ($infoSt) {
			$data['rooms'] = $room->getAllDataRooms();
			$data['rankings'] = $ranking->getAllDataRankings();
			$data['project'] = $project->getAllDataProjects();
			$data['info'] = $infoSt;

			$data['infoRoom'] = json_decode($infoSt['rooms_id'],true);
			$data['infoRanking'] = json_decode($infoSt['rankings_id'],true);
			$data['infoProject'] = json_decode($infoSt['projects_id'],true);
			return view('admin.staff.edit_view',$data);
		} else {
			abort(404);
		}
	}
	public function handleEditStaff(SaveStaffInfo $request, Staff $staff)
	{
		$id = $request->id;
		$infoSt = $staff->getInfoDataStaffById($id);

		if ($infoSt) {
			$nameStaff = $request->nameStaff;
			$rooms = $request->room;
			$rankings = $request->ranking;
			$projects = $request->project;
			$birth = $request->birth;
			$gender = $request->gender;
			$address = $request->address;
			$phone = $request->phone;
			$email = $request->email;

			$dataUpdate = [
				'name_staff' => $nameStaff,
				'rooms_id' => json_encode($rooms),
				'rankings_id' =>json_encode($rankings),
				'projects_id' =>json_encode($projects),
				'birth' => $birth,
				'gender' => $gender,
				'address' => $address,
				'email' => $email,
				'phone' => $phone,
				'status' => 1,
				'created_at' => date('Y-m-d H:i:s'),
			];

			$up = $staff->updateDataStaffById($dataUpdate, $id);
			if ($up) {
				$request->session()->flash('editSt'.'Update Success');
				return redirect()->route('admin.staff');
			} else {
				$request->session()->flash('editSt'.'Can not update');
				return redirect()->route('admin.editStaff');
			}
		} else {
			abort(404);
		}
	}

	public function deleteStaff(Request $request, Staff $staff)
    {
        if ($request->ajax()) {
            // đúng là ajax gửi lên thì mới xử lý
            $id = $request->id;
            $del = $staff->deleteStaffById($id);
            if ($del) {
                echo "OK";
            } else {
                echo "FAIL";
            }
        }
    }
}
