<?php
namespace App\Repositories;

use App\Models\Team;
use App\Models\TeamMember;

class TeamsRepository
{
    protected $team;
    protected $team_member;

    public function __construct(Team $team, TeamMember $team_member)
    {
        
        $this->team = $team;
        $this->team_member = $team_member;
    }

    public function getAll()
    {
        return $this->team->all();
    }

    public function getTeamById($id)
    {
        return $this->team->findOrFail($id);
    }

    public function create($id,$params)
    {

        $team = new $this->team($params);
        $team->event_id = $id;
        $team->user_id = auth()->user()->id;
        
        if (isset($params['logo'])) {
            $file = $params['logo'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $bannerFolderName = '/uploads/events/teams/';
            $logo = str_random(10) . '.' . $extension;
            $team->logo = $logo;
        }

        if ($team->save()) {
            if (isset($params['logo'])) {
                $destinationPath1 = public_path() . $bannerFolderName;
                $params['logo']->move($destinationPath1, $logo);
            }

            $participant = auth()->user();
            $message = "Thank you,  your registration to participate in " . $team->event->name . " event was successful.";

            \Mail::send('emails.registration_successful', ['participant' => $participant, 'message' => $message], function ($m) use ($participant) {
                $m->from(env('MAIL_FROM'), env('MAIL_NAME'));

                $m->to($participant->email, $participant->first_name . ' ' . $participant->last_name)->subject('Registration Successful!');
            });
            return $team;
        }

        return false;
    }

    public function update($params, $id)
    {
        $team = $this->team->findOrFail($id);

        if (isset($params['logo'])) {
            $file = $params['logo'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $bannerFolderName = '/uploads/events/teams/';
            $logo = str_random(10) . '.' . $extension;
            $team->logo = $logo;
        }
        unset($params['logo']);
        if ($team->update($params)) {
            if (isset($params['logo'])) {
                $destinationPath1 = public_path() . $bannerFolderName;
                $params['logo']->move($destinationPath1, $logo);
            }

            return $team;
        }

        return false;
    }

    public function delete($id)
    {
        return $this->team->destroy($id);
    }

    public function createTeamMember($id, $params)
    {
        $team_member = new $this->team_member($params);
        $team = $this->team->findOrFail($id);

        if (isset($params['photo'])) {
            $file = $params['photo'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $bannerFolderName = '/uploads/events/teams/';
            $photo = str_random(10) . '.' . $extension;
            $params['photo'] = $photo;
        }
        if ($team->members()->create($params)) {
            if (isset($params['photo'])) {
                $destinationPath1 = public_path() . $bannerFolderName;
                $file->move($destinationPath1, $photo);
            }
            return $team;
        }

        return false;
    }

    public function getTeamMemberById($id)
    {
        return $this->team_member->findOrFail($id);
    }

    public function editTeamMember($id, $params)
    {

        $team_member = $this->team_member->findOrFail($id);

        if ($team_member->update($params)) {
            return $team_member;
        }

        return false;
    }

    public function dropTeamMember($id)
    {
        
        return $this->team_member->destroy($id);
    }

}
