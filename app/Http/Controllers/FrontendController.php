<?php

namespace App\Http\Controllers;

use App\Mail\EmployerEmail;
use App\Mail\JobSeekerEmail;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\ReadinessAssessment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;


class FrontendController extends Controller
{
    public function landing(){
        return Inertia::render('Welcome');
    }

    public function jobSeeker(){
        return Inertia::render('EligibilityForm');
    }

    public function employerForm(Request $request){

        $messages = [
            'email.unique' => 'We already have your details, our team member will contact you soon.'
        ];
        $request->validate([
            'name' => 'required',
            'companyName' => 'required',
            'email' => 'required|email|unique:employers,email',
            'mobileNumber' => 'required|unique:employers,number',
            'employmentSector' => 'required',
            'hqLocation' => 'required',
            'city' => 'required',
            'expectedVacancies' => 'required|numeric'
        ], $messages);

        Employer::create([
            'name' => $request->name,
            'company_name' => $request->companyName,
            'email' => $request->email,
            'number' => $request->mobileNumber,
            'employment_sector' => $request->employmentSector,
            'hq_location' => $request->hqLocation,
            'city' => $request->city,
            'expected_vacancies' => $request->expectedVacancies
        ]);

        Mail::to($request->email)->send(new EmployerEmail());

        return redirect()->back()->with('success', 'Thank you for registering your interest with MAXIMUS Gulf. A member of the team will contact you.');
    }

    public function savePersonalInformation(Request $request){


        $validator = Validator::make($request->all(),[
            'firstName' => 'required',
            'surName' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:job_seekers,email',
            'city' => 'required',
            'region' => 'required',
            'nin' => 'required',
            'dob' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $jobSeekerId = JobSeeker::create([
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->surName,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'city' => $request->city,
            'region' => $request->region,
            'nin' => $request->nin,
            'dob' => $request->dob,
        ])->id;

        return response()->json(['success' => $jobSeekerId]);

    }

    public function saveGender(Request $request){

        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->gender = $request->gender;
        $jobSeeker->save();
        return response()->json(['success' => 'Gender Saved']);

    }

    public function saveQualification(Request $request){
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->qualification = $request->qualification;
        $jobSeeker->save();
        return response()->json(['success' => 'Qualification Saved']);
    }
    public function saveEmployment(Request $request){
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->full_time_employment = $request->employment;
        $jobSeeker->save();
        return response()->json(['success' => 'Employment Saved']);
    }
    public function saveJobTraining(Request $request){
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->on_job_training = $request->jobTraining;
        $jobSeeker->save();
        return response()->json(['success' => 'Job Training Saved']);
    }

    public function saveSocial(Request $request){
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->social_benficiary = $request->socialBeneficiary;
        $jobSeeker->save();
        return response()->json(['success' => 'Social Beneficiary Saved']);
    }

    public function saveUnemployment(Request $request){
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->unemployed = $request->beenUnemployed;
        $jobSeeker->save();
        Mail::to($request->email)->send(new JobSeekerEmail($request->id));
        return response()->json(['success' => 'Unemployment Status Saved']);
    }

    public function assessmentTest($id){
        return Inertia::render('AssessmentTest', ['jobSeekerId' => $id]);
    }

    public function saveReadiness(Request $request){

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => $data['weightedScore'],
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Readiness Assessment Submitted.']);

    }

    public function saveEvaluation(Request $request){

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => $data['weightedScore'],
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Self Evaluation Assessment Submitted.']);

    }

    public function saveCompetencies(Request $request){

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => $data['weightedScore'],
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Competencies Submitted.']);

    }
}
