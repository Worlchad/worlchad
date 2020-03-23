<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use PDF;
use App\Http\Requests\TeamRegistrationRequest;
class TeamController extends Controller
{

    protected $team_repository;

    public function __construct(TeamsRepository $team_repository)
    {
        $this->middleware("auth");
        $this->team_repository = $team_repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($team_id)
    {
        $team = Team::findOrFail($team_id);

        return view('team', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        $team = $this->team_repository->create($id,$request->all());

        return redirect()->route('events.sport.members', $team->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        // return view('sports',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team_id)
    {
        $team = $this->team_repository->update($request->all(), $team_id);

        return redirect()->route('events.sport.members', $team->id);

    }

    public function registerTeamMember(TeamRegistrationRequest $request, $id)
    {
        $team = $this->team_repository->createTeamMember($id, $request->all());
        if ($team) {
            return redirect()->route('events.sport.members', $team->id);
        }

        return redirect()->back()->with('error', 'Failed registering member');
    }

    public function editTeamMember(Request $request, $id)
    {
        $team_member = $this->team_repository->editTeamMember($id, $request->all());
        if ($team_member) {
            return redirect()->route('events.sport.members', $team_member->team->id);
        }

        return redirect()->back()->with('error', 'Failed registering member');
    }

    public function dropTeamMember($team_id,$id)
    {
        
        if ($this->team_repository->dropTeamMember($id)) {
            return redirect()->back()->with('message', 'Success dropping member');
        }
        
        return redirect()->back()->with('error', 'Failed dropping member');

    }

    public function printTeamMember($team_id, $id)
    {
        $team_member = $this->team_repository->getTeamMemberById($id);

        // return view ('pdf_team_member', compact('team_member'));
        $data['team_member'] = $team_member;
        //todo create pdf_view for team card
        $pdf = PDF::loadView('pdf_team_member', $data);  
        return $pdf->download('medium.pdf');
    }
    public function printTeamMembers($team_id)
    {
        
        $team = $this->team_repository->getTeamById($team_id);

        
        $data['team'] = $team;
        //todo create pdf_view for team card
        $pdf = PDF::loadView('pdf_team_members', $data);  
        return $pdf->download('medium.pdf');
    }

}
