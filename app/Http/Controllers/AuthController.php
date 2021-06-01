<?php

namespace App\Http\Controllers;

use App\Exports\JobSeekersExport;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\ReadinessAssessment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Redirect;

class AuthController extends Controller
{

    private $totalCompetencies = 14;
    public function login(){
        return Inertia::render('Admin/Login');
    }

    public function register(){
        return Inertia::render('Admin/Register');
    }

    public function forgotPassword(){
        return Inertia::render('Admin/ForgotPassword');
    }

    public function verifyLogin(Request $request){

        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return Redirect::route('dashboard');

        }


        return Inertia::render('Admin/Login', [
            'invalid_credentials' => 'You have entered invalid credentials ',
        ]);
    }

    public function logout() {

        Session::flush();

        Auth::logout();

        return Redirect::route('login');

    }

    public function dashboard(){
        return Inertia('Admin/Dashboard');
    }

    public function filterCandidates(Request $request){
        $jobSeekers = new JobSeeker();

        if($request->has('gender') && $request->gender != ''){
            $jobSeekers = $jobSeekers->where('gender', $request->gender);
        }

        if($request->has('qualification') && $request->qualification != ''){
            $jobSeekers = $jobSeekers->where('qualification', $request->qualification);
        }


        if($request->has('fullTimeEmployment') && $request->fullTimeEmployment != ''){
            $jobSeekers = $jobSeekers->where('full_time_employment', $request->fullTimeEmployment);
        }

        if($request->has('JobTraining') && $request->JobTraining != ''){
            $jobSeekers = $jobSeekers->where('on_job_training', $request->JobTraining);
        }

        if($request->has('socialBeneficiary') && $request->socialBeneficiary != ''){
            $jobSeekers = $jobSeekers->where('social_benficiary', $request->socialBeneficiary);
        }

        if($request->has('unEmployed') && $request->unEmployed != ''){
            $jobSeekers = $jobSeekers->where('unemployed', $request->unEmployed);
        }

        if($request->has('review') && $request->review != ''){
            $jobSeekers = $jobSeekers->where('reviewed', $request->review);
        }

        $jobSeekers = $jobSeekers->with('readinessAssessment');
        $jobSeekers = $jobSeekers->orderBy('id', 'DESC');
        if($request->has('limit') && $request->limit != ''){
            $jobSeekers = $jobSeekers->limit($request->limit);
        }

        $selectedCandidates = JobSeeker::where('status', 1)->get();
        $rejectedCandidates = JobSeeker::where('status', 0)->get();
        $jobSeekersCount = JobSeeker::count();
        $selectedJobSeekers = JobSeeker::where('status', 1)->count();
        $rejectedJobSeekers = JobSeeker::where('status', 0)->count();

        $jobSeekersWithAssessmentCount = 0;

        foreach(JobSeeker::all() as $jobSeeker){
            if($jobSeeker->answered_competencies == $this->totalCompetencies){
                $jobSeekersWithAssessmentCount++;
            }
        }

        return response()->json([
            'success' => true,
            'jobSeekers' => $jobSeekers->get(),
            'jobSeekersCount' => $jobSeekersCount,
            'jobSeekersWithAssessmentCount' => $jobSeekersWithAssessmentCount,
            'selectedJobSeekers' => $selectedJobSeekers,
            'rejectedJobSeekers' => $rejectedJobSeekers,
            'selectedCandidates' => $selectedCandidates,
            'rejectedCandidates' => $rejectedCandidates
        ]);
    }

    public function allCandidates(){
        return Inertia('Admin/Candidates',[
            'all' => true,
            'selected' => false,
            'rejected' => false,
            'reviewed' => false
        ]);
    }

    public function selectedCandidates(){
        return Inertia('Admin/Candidates',[
            'all' => false,
            'selected' => true,
            'rejected' => false,
            'reviewed' => false
        ]);
    }

    public function getSelectedCandidates(){
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('status', 1)->get()]);
    }

    public function rejectedCandidates(){
        return Inertia('Admin/Candidates',[
            'all' => false,
            'selected' => false,
            'rejected' => true,
            'reviewed' => false
        ]);
    }

    public function getRejectedCandidates(){
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('status', 0)->get()]);
    }

    public function reviewedCandidates(){
        return Inertia('Admin/Candidates',[
            'all' => false,
            'selected' => false,
            'rejected' => false,
            'reviewed' => true
        ]);
    }

    public function getReviewedCandidates(){
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('reviewed', 1)->get()]);
    }

    public function employers(){

        return Inertia('Admin/Employers', [
            'employers' => Employer::all()
        ]);
    }

    public function reviewJobSeeker($id, $review){
        $jobSeeker = JobSeeker::find($id);
        $jobSeeker->reviewed = $review;
        $jobSeeker->save();
        return redirect()->back();
    }

    public function changeStatus($id, $status){
        $jobSeeker = JobSeeker::find($id);
        $jobSeeker->status = $status;
        $jobSeeker->save();
        return redirect()->back();
    }

    public function downloadExcel(){
        return Excel::download(new JobSeekersExport(), 'job-seekers.xlsx');
    }
}
