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
use App\Helpers\ProcessData;
use App\Helpers\ProcessData\processEmployeeData;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Mail;

// use App\Helpers\ProcessData;

class EmployeeManagementController extends Controller
{
    protected $employeeRepository;
    protected $teamRepository;
    protected $positionRepository;
    protected $typeOfWorkRepository;
    protected $processData;
    public function __construct(
        EmployeeRepository $employeeRepository,
        TeamRepository $teamRepository,
        PositionRepository $positionRepository,
        TypeOfWorkRepository $typeOfWorkRepository,
        ProcessData $processData

    ) {
        $this->employeeRepository = $employeeRepository;
        $this->teamRepository = $teamRepository;
        $this->positionRepository = $positionRepository;
        $this->typeOfWorkRepository = $typeOfWorkRepository;
        $this->processData = $processData;
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
            $data = $validationRequest->all();
            $processedData = $this->processData->processEmployeeData($data);
            $teamName = $this->teamRepository->getTeamName();
            $this->employeeRepository->create($processedData);

            $emails = $processedData['email'];
            Mail::to($emails)->send(new \App\Mail\SendMail(
                [
                    'emails' => $emails
                ],
                [
                    'first_name' => $processedData['first_name'],
                    'last_name' => $processedData['last_name']
                ]
            ));
            $message = Constant::MESSAGE_CREATE_EMPLOYEE;
            return view('clients.employee.search_employee', compact('message', 'teamName'));
        } else {
            $currentDateTime = date('Y-m-d H:i:s');
            $request = [
                'team_name' => $this->teamRepository->find($validationRequest->input('team_name')),
                'type_of_work' => $this->typeOfWorkRepository->find($validationRequest->input('type_of_work')),
                'positions' => $this->positionRepository->find($validationRequest->input('position')),
                'request' => $validationRequest,
                'avatar' => FileHelper::storeImage($validationRequest, 'public/images')
            ];
            return view('clients.employee.create_employee_confirm', compact('request', 'currentDateTime'));
        }
    }
    public function edit($id)
    {
        $teamName = $this->teamRepository->getTeamName();
        $position = $this->positionRepository->all();
        $typeOfWork = $this->typeOfWorkRepository->all();
        $employeeDetails = $this->employeeRepository->getEmployeeById($id);
        return view('clients.employee.edit_employee', compact('position', 'typeOfWork', 'teamName', 'employeeDetails'));
    }
    public function editConfirm(ValidationRequest $validationRequest)
    {
        $teamName = $this->teamRepository->getTeamName();
        if ($validationRequest->has('save')) {
            $id = $validationRequest->input('id');
            $data = $validationRequest->all();
            // dd($data);
            $processedData = $this->processData->processEmployeeData($data);
            // dd($processedData);
            $this->employeeRepository->update($id, $processedData);
            $message = Constant::MESSAGE_UPDATE_EMPLOYEE;
            return view('clients.employee.search_employee', compact('message', 'teamName'));
        } else {
            $currentDateTime = date('Y-m-d H:i:s');
            $request = [
                'team_name' => $this->teamRepository->find($validationRequest->input('team_name')),
                'type_of_work' => $this->typeOfWorkRepository->find($validationRequest->input('type_of_work')),
                'positions' => $this->positionRepository->find($validationRequest->input('position')),
                'request' => $validationRequest,
                'avatar' => FileHelper::storeImage($validationRequest, 'public/images')
            ];
            // dd($request);
            return view('clients.employee.edit_employee_confirm', compact('request', 'currentDateTime'));
        }
    }
}
