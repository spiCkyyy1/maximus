<?php

namespace App\Http\Controllers;

use App\Exports\JobSeekersExport;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Redirect;

class AuthController extends Controller
{
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

    public function dashboard(Request $request){

        $jobSeekers = new JobSeeker();

        if($request->has('gender') && $request->gender != ''){
            $jobSeekers = $jobSeekers->where('gender', $request->gender);
        }

        $selectedCandidates = JobSeeker::where('status', 1)->get();
        $rejectedCandidates = JobSeeker::where('status', 0)->get();
        $jobSeekersCount = JobSeeker::count();
        $jobSeekersWithAssessmentCount = JobSeeker::with('readinessAssessment')->count();
        $selectedJobSeekers = JobSeeker::where('status', 1)->count();
        $rejectedJobSeekers = JobSeeker::where('status', 0)->count();

        return Inertia::render('Admin/Dashboard', [
            'jobSeekers' => $jobSeekers->with('readinessAssessment')->get(),
            'jobSeekersCount' => $jobSeekersCount,
            'jobSeekersWithAssessmentCount' => $jobSeekersWithAssessmentCount,
            'selectedJobSeekers' => $selectedJobSeekers,
            'rejectedJobSeekers' => $rejectedJobSeekers,
            'selectedCandidates' => $selectedCandidates,
            'rejectedCandidates' => $rejectedCandidates
        ]);
    }

    public function filterCandidates(Request $request){
        $jobSeekers = new JobSeeker();

        if($request->has('gender') && $request->gender != ''){
            $jobSeekers = $jobSeekers->where('gender', $request->gender);
        }

        // return response()->json(['jobSeekers' => $jobSeekers->with('readinessAssessment')->get()]);

        $selectedCandidates = JobSeeker::where('status', 1)->get();
        $rejectedCandidates = JobSeeker::where('status', 0)->get();
        $jobSeekersCount = JobSeeker::count();
        $jobSeekersWithAssessmentCount = JobSeeker::with('readinessAssessment')->count();
        $selectedJobSeekers = JobSeeker::where('status', 1)->count();
        $rejectedJobSeekers = JobSeeker::where('status', 0)->count();

        return Inertia::render('Admin/Dashboard', [
            'jobSeekers' => $jobSeekers->with('readinessAssessment')->get(),
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
            'jobSeekers' => JobSeeker::get()
        ]);
    }

    public function selectedCandidates(){
        return Inertia('Admin/Candidates',[
            'jobSeekers' => JobSeeker::where('status', 1)->get()
        ]);
    }

    public function rejectedCandidates(){
        return Inertia('Admin/Candidates',[
            'jobSeekers' => JobSeeker::where('status', 0)->get()
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
