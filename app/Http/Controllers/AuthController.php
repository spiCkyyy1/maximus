<?php

namespace App\Http\Controllers;

use App\Exports\EmployersExport;
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

    public function dashboardData(Request $request){

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
            'jobSeekersCount' => $jobSeekersCount,
            'jobSeekersWithAssessmentCount' => $jobSeekersWithAssessmentCount,
            'selectedJobSeekers' => $selectedJobSeekers,
            'rejectedJobSeekers' => $rejectedJobSeekers,
        ]);
    }

    public function getPaginatedData(Request $request){

        $jobSeekers = new JobSeeker();

        if($request->tab == 'selectedCandidates'){
            $jobSeekers = $jobSeekers->where('status', 1);
        }

        if($request->tab == 'rejectedCandidates'){
            $jobSeekers = $jobSeekers->where('status', 0);
        }

        if($request->filter['gender'] != ''){
            $jobSeekers = $jobSeekers->where('gender', $request->filter['gender']);
        }

        if($request->filter['qualification'] != ''){
            $jobSeekers = $jobSeekers->where('qualification', $request->filter['qualification']);
        }


        if($request->filter['fullTimeEmployment'] != ''){
            $jobSeekers = $jobSeekers->where('full_time_employment', $request->filter['fullTimeEmployment']);
        }

        if($request->filter['JobTraining'] != ''){
            $jobSeekers = $jobSeekers->where('on_job_training', $request->filter['JobTraining']);
        }

        if($request->filter['socialBeneficiary'] != ''){
            $jobSeekers = $jobSeekers->where('social_benficiary', $request->filter['socialBeneficiary']);
        }

        if($request->filter['unEmployed'] != ''){
            $jobSeekers = $jobSeekers->where('unemployed', $request->filter['unEmployed']);
        }

        if($request->filter['review'] != ''){
            $jobSeekers = $jobSeekers->where('reviewed', $request->filter['review']);
        }

        $jobSeekers = $jobSeekers->with('readinessAssessment');
        $jobSeekers = $jobSeekers->orderBy('id', 'DESC');


        return response()->json(['success' => $jobSeekers->paginate($request->filter['limit'])]);
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
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('status', 1)->paginate(10)]);
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
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('status', 0)->paginate(10)]);
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
        return response()->json(['success' => JobSeeker::with('readinessAssessment')->where('reviewed', 1)->paginate(10)]);
    }

    public function employers(){

        return Inertia('Admin/Employers');
    }

    public function getEmployers(){
        return response()->json(['success' => Employer::paginate(10)]);
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
        return Excel::download(new JobSeekersExport('all'), 'job-seekers.xlsx');
    }

    public function downloadSelectedExcel(){
        return Excel::download(new JobSeekersExport('selected'), 'Selected-candidates.xlsx');
    }

    public function downloadRejectedExcel(){
        return Excel::download(new JobSeekersExport('rejected'), 'rejected-candidates.xlsx');
    }
    public function downloadReviewedExcel(){
        return Excel::download(new JobSeekersExport('reviewed'), 'reviewed-candidates.xlsx');
    }

    public function downloadEmployersExcel(){
        return Excel::download(new EmployersExport(), 'employers.xlsx');
    }
}
