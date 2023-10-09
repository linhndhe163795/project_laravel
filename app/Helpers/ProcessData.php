<?php
namespace App\Helpers;

use Carbon\Carbon;
use App\Contracts\Repositories\PositionRepository;
use App\Contracts\Repositories\TeamRepository;
use App\Contracts\Repositories\TypeOfWorkRepository;
use App\Helpers\Constant;


class ProcessData{
    protected $teamRepository;
    protected $typeOfWorkRepository;
    protected $positionRepository;

    public function __construct(
        TeamRepository $teamRepository,
        TypeOfWorkRepository $typeOfWorkRepository,
        PositionRepository $positionRepository,
       
    ) {
        $this->teamRepository = $teamRepository;
        $this->typeOfWorkRepository = $typeOfWorkRepository;
        $this->positionRepository = $positionRepository;
    }

    public function processEmployeeData($data)
    {
        $team_id = $this->teamRepository->getTeamIdByName($data['team_id']);
        $typeOfWorkId = $this->typeOfWorkRepository->getTypeOfWorkIdbyName($data['type_of_work']);
        $positionId = $this->positionRepository->getPositionIdByName($data['position']);

        $data['avatar'] = $data['avatar_image'];
        unset($data['avatar_image']);

        $birthday = Carbon::createFromFormat('d/m/Y', $data['birthday']);
        $data['birthday'] = $birthday->format('Y-m-d');

        $data['team_id'] = $team_id;
        $data['position'] = $positionId;
        $data['type_of_work'] = $typeOfWorkId;
        $data['gender'] = ($data['gender'] === 'Male') ? Constant::MALE : Constant::FEMALE;
        $data['status'] = ($data['status'] === 'On Working') ? Constant::WORKING : Constant::RETIRED;

        return $data;
    }
}
