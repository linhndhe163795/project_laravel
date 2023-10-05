<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\EmployeeRepository;
use App\Contracts\Repositories\PositionRepository;
use App\Contracts\Repositories\TeamRepository;
use App\Contracts\Repositories\TypeOfWorkRepository;
use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Request;
use App\Helpers\Constant;
use App\Helpers\FileHelper;


class EmployeeManagementController extends Controller
{
    protected $employeeRepository;
    protected $teamRepository;
    protected $positionRepository;
    protected $typeOfWorkRepository;
    public function __construct(
        EmployeeRepository $employeeRepository,
        TeamRepository $teamRepository,
        PositionRepository $positionRepository,
        TypeOfWorkRepository $typeOfWorkRepository

    ) {
        $this->employeeRepository = $employeeRepository;
        $this->teamRepository = $teamRepository;
        $this->positionRepository = $positionRepository;
        $this->typeOfWorkRepository = $typeOfWorkRepository;
    }

    public function home()
    {
        return view('clients.home');
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $data = $request->all();
            $teamName = $this->teamRepository->getTeamName();
            $listEmployee = $this->employeeRepository->searchEmployee($data);
            return view('clients.employee.search_employee', compact('listEmployee', 'teamName', 'request'));
        } else {
            $teamName = $this->teamRepository->getTeamName();
            return view('clients.employee.search_employee', compact('teamName'));
        }
    }
    public function create(Request $request)
    {
        $teamName = $this->teamRepository->getTeamName();
        $position = $this->positionRepository->all();
        $typeOfWork = $this->typeOfWorkRepository->all();
        return view('clients.employee.create_employee', compact('position', 'typeOfWork', 'teamName'));
    }
    public function createConfirm(ValidationRequest $validationRequest)
    {

        if ($validationRequest->has('save')) {
            return view('clients.employee.search', compact('message'));
        } else {
            $request = [
                'validationRequest' => $validationRequest,
                'avatar' => FileHelper::storeImage($validationRequest, 'public/images')
            ];
        
            return view('clients.employee.create_employee_confirm',compact('request'));
        }
    }
}
