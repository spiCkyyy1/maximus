<?php

namespace App\Http\Controllers;

use App\Mail\EmployerEmail;
use App\Mail\JobSeekerEmail;
use App\Models\Cities;
use App\Models\Employer;
use App\Models\JobSeeker;
use App\Models\ReadinessAssessment;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;


class FrontendController extends Controller
{
    public function landing(){

        return Inertia::render('Welcome', [
            'cities' => Cities::all(),
            'regions' => Region::all()
        ]);
    }

    public function termsCondition(){
        return Inertia::render('TermsOfService');
    }

    public function privacyPolicy(){
        return Inertia::render('PrivacyPolicy');
    }

    public function jobSeeker(){
        return Inertia::render('EligibilityForm',[
            'cities' => Cities::all(),
            'regions' => Region::all()
        ]);
    }

    public function employerForm(Request $request){

        $messages = [
            'name.required' => 'Please enter your name',
            'companyName.required' => 'Please enter your company name',
            'email.required' => 'Please enter your email address',
            'mobileNumber.required' => 'Please enter your mobile number',
            'employmentSector.required' => 'Please enter your employment sector',
            'hqLocation.required' => 'Please enter head quater location',
            'city.required' => 'Please enter your city',
            'region.required' => 'Please select any region',
            'expectedVacancies.required' => 'Please enter expected vacancies',
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
            'region' => 'required',
            'expectedVacancies' => 'required|numeric'
        ], $messages);

        Employer::create([
            'name' => $request->name,
            'company_name' => $request->companyName,
            'email' => $request->email,
            'number' => $request->mobileNumber,
            'employment_sector' => $request->employmentSector,
            'hq_location' => $request->hqLocation,
            'region' => $request->region,
            'city' => $request->city,
            'expected_vacancies' => $request->expectedVacancies
        ]);

        // Mail::to($request->email)->send(new EmployerEmail());

        return redirect()->back()->with('success', 'Thank you for registering your interest with MAXIMUS Gulf. A member of the team will contact you.');
    }

    public function savePersonalInformation(Request $request){

        $messages = [
            'firstName.required' => 'Please enter your first name',
            'surName.required' => 'Please enter your sur name',
            'mobile.required' => 'Please enter your mobile number',
            'email.required' => 'Please enter your email',
            'email.unique' => 'We already have your details',
            'city.required' => 'Please select any city',
            'region.required' => 'Please select any region',
            'nin.required' => 'Please enter nin',
            'dob.required' => 'Please select your date of birth',
            'nin.min' => 'Please enter 10 digits of nin',
            'nin.max' => 'Please enter 10 digits of nin',
            'title.required' => 'Please select title',
            'martialStatus.required' => 'Please select your martial status',
            'employment.required' => 'Please select any option',
            'jobTraining.required' => 'Please select any option',
            'socialBeneficiary.required' => 'Please select any option',
            'educationMajor.required_unless' => 'Please select any option',
            'educationField.required_unless' => 'Please select any option',
            'qualification.required' => 'Please select your qualification',
            'agreed.accepted' => 'Please accept the terms & conditions'
        ];

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'firstName' => 'required',
            'surName' => 'required',
            'martialStatus' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:job_seekers,email',
            'city' => 'required',
            'region' => 'required',
            'nin' => 'required|min:10|max:10',
            'dob' => 'required',
            'qualification' => 'required',
            'educationMajor' => 'required_unless:qualification,school',
            'educationField' => 'required_unless:qualification,school',
            'employment' => 'required',
            'socialBeneficiary' => 'required',
            'jobTraining' => 'required',
            'agreed' => 'accepted'
        ], $messages);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $jobSeekerId = JobSeeker::create([
            'title' => $request->title,
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->surName,
            'martial_status' => $request->martialStatus,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'city' => $request->city,
            'region' => $request->region,
            'nin' => $request->nin,
            'dob' => $request->dob,
            'qualification' => $request->qualification,
            'education_major' => ($request->qualification != 'school') ? $request->educationMajor : null,
            'education_field' => ($request->qualification != 'school') ? $request->educationField : null,
            'full_time_employment' => $request->employment,
            'social_benficiary' => $request->socialBeneficiary,
            'on_job_training' => $request->jobTraining
        ])->id;

        return response()->json(['success' => $jobSeekerId]);

    }

    public function saveGender(Request $request){

        $messages = [
            'gender.required' => 'Please select your gender'
        ];

        $validator = Validator::make($request->all(),[
            'gender' => 'required'
        ], $messages);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->gender = $request->gender;
        $jobSeeker->save();
        return response()->json(['success' => 'Gender Saved']);

    }

    public function applicationRejected(Request $request){

        $jobSeeker = JobSeeker::find($request->id);

        $jobSeeker->status = 0;

        $jobSeeker->save();

        return response()->json(['success' => 'Application Rejected.']);
    }

    // public function saveQualification(Request $request){
    //     $messages = [
    //         'qualification.required' => 'Please select your qualification'
    //     ];

    //     $validator = Validator::make($request->all(),[
    //         'qualification' => 'required'
    //     ], $messages);

    //     if($validator->fails()){
    //         return response()->json(['errors' => $validator->errors()]);
    //     }
    //     $jobSeeker = JobSeeker::find($request->id);
    //     $jobSeeker->qualification = $request->qualification;
    //     $jobSeeker->save();
    //     return response()->json(['success' => 'Qualification Saved']);
    // }
    // public function saveEmployment(Request $request){
    //     $messages = [
    //         'employment.required' => 'Please select any option'
    //     ];

    //     $validator = Validator::make($request->all(),[
    //         'employment' => 'required'
    //     ], $messages);

    //     if($validator->fails()){
    //         return response()->json(['errors' => $validator->errors()]);
    //     }
    //     $jobSeeker = JobSeeker::find($request->id);
    //     $jobSeeker->full_time_employment = $request->employment;
    //     $jobSeeker->save();
    //     return response()->json(['success' => 'Employment Saved']);
    // }
    // public function saveJobTraining(Request $request){
    //     $messages = [
    //         'jobTraining.required' => 'Please select any option'
    //     ];

    //     $validator = Validator::make($request->all(),[
    //         'jobTraining' => 'required'
    //     ], $messages);

    //     if($validator->fails()){
    //         return response()->json(['errors' => $validator->errors()]);
    //     }
    //     $jobSeeker = JobSeeker::find($request->id);
    //     $jobSeeker->on_job_training = $request->jobTraining;
    //     $jobSeeker->save();
    //     return response()->json(['success' => 'Job Training Saved']);
    // }
    // public function saveSocial(Request $request){
    //     $messages = [
    //         'socialBeneficiary.required' => 'Please select any option'
    //     ];

    //     $validator = Validator::make($request->all(),[
    //         'socialBeneficiary' => 'required'
    //     ], $messages);
    //     if($validator->fails()){
    //         return response()->json(['errors' => $validator->errors()]);
    //     }
    //     $jobSeeker = JobSeeker::find($request->id);
    //     $jobSeeker->social_benficiary = $request->socialBeneficiary;
    //     $jobSeeker->save();
    //     return response()->json(['success' => 'Social Beneficiary Saved']);
    // }

    public function saveEducationField(Request $request){
        $messages = [
            'role.required' => 'Please select any option',
            'sector.required' => 'Please select any option'
        ];

        $validator = Validator::make($request->all(),[
            'role' => 'required',
            'sector' => 'required'
        ], $messages);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->role = $request->role;
        $jobSeeker->sector = $request->sector;

        $jobSeeker->save();
        return response()->json(['success' => 'Education Fields Saved']);
    }

    public function saveUnemployment(Request $request){
        $messages = [
            'beenUnemployed.required' => 'Please select any option'
        ];

        $validator = Validator::make($request->all(),[
            'beenUnemployed' => 'required'
        ], $messages);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $jobSeeker = JobSeeker::find($request->id);
        $jobSeeker->unemployed = $request->beenUnemployed;
        $jobSeeker->status = 1;
        $jobSeeker->save();
        // Mail::to($request->email)->send(new JobSeekerEmail($request->id));
        return response()->json(['success' => 'Unemployment Status Saved']);
    }

    public function assessmentTest($id){
        app()->setLocale('en');
        return Inertia::render('AssessmentTest', ['jobSeekerId' => $id]);
    }

    public function saveReadiness(Request $request){

        if($request->has('jobSeekerId')){
            ReadinessAssessment::where('job_seeker_id', $request->jobSeekerId)
            ->where('competencies', 'readiness')->delete();
        }

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => (($data['weightedScore'] != "") ? $data['weightedScore'] : null),
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Readiness Assessment Submitted.']);

    }

    public function saveEvaluation(Request $request){

        if($request->has('jobSeekerId')){
            ReadinessAssessment::where('job_seeker_id', $request->jobSeekerId)
            ->where('competencies', 'evaluation')->delete();
        }

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => (($data['weightedScore'] != "") ? $data['weightedScore'] : null),
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Self Evaluation Assessment Submitted.']);

    }

    public function saveCompetencies(Request $request){

        if($request->has('jobSeekerId')){
            ReadinessAssessment::where('job_seeker_id', $request->jobSeekerId)
            ->whereNotIn('competencies', ['readiness', 'evaluation'])->delete();
        }

        foreach($request->readinessAssessment as $data){
            ReadinessAssessment::create([
                'job_seeker_id' => $request->jobSeekerId,
                'question' => $data['question'],
                'answer' => $data['answer'],
                'weighted_score' => (($data['weightedScore'] != "") ? $data['weightedScore'] : null),
                'competencies' => $data['competency']
            ]);
        }

        return response()->json(['success' => 'Competencies Submitted.']);

    }

    public function uploadDocuments(Request $request){

        $messages = [
            'cv.required' => 'Please select file for CV',
            'degreeCertificate.required' => 'Please select file for Degree Certificate',
            'gosiEvidence.required' => 'Please select file for GOSI Evidence',
        ];

        $validator = Validator::make($request->all(),[
            'cv' => 'required|file|mimetypes:application/pdf|max:500000',
            'degreeCertificate' => 'required|file|mimetypes:application/pdf|max:500000',
            'gosiEvidence' => 'required|file|mimetypes:application/pdf|max:500000'

        ], $messages);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
            // if (Storage::exists('resume/' . $image)) {
            //     Storage::delete('resume/' . $image);
            // }
        if ($request->hasFile('cv')) {
            //save job seeker cv
            $jobSeeker = JobSeeker::find($request->id);
            $cvImageName = $jobSeeker->id . '-' . $request->file('cv')->getClientOriginalName();
            $cvFileName = $request->file('cv')->getClientOriginalName();

            $jobSeeker->cv = $cvFileName;
            $jobSeeker->save();

            $path = $request->file('cv')->storeAs(
                'public/'.$jobSeeker->id, $cvImageName
            );
        }
        if ($request->hasFile('degreeCertificate')) {
            //save job seeker degreeCertificate
            $jobSeeker = JobSeeker::find($request->id);
            $degreeCertificateImageName = $jobSeeker->id . '-' . $request->file('degreeCertificate')->getClientOriginalName();
            $degreeCertificateFileName = $request->file('degreeCertificate')->getClientOriginalName();

            $jobSeeker->degree_certificate = $degreeCertificateFileName;
            $jobSeeker->save();

            $path = $request->file('degreeCertificate')->storeAs(
                'public/'.$jobSeeker->id, $degreeCertificateImageName
            );
        }
        if ($request->hasFile('gosiEvidence')) {
            //save job seeker gosiEvidence
            $jobSeeker = JobSeeker::find($request->id);
            $gosiEvidenceImageName = $jobSeeker->id . '-' . $request->file('gosiEvidence')->getClientOriginalName();
            $gosiEvidenceFileName = $request->file('gosiEvidence')->getClientOriginalName();

            $jobSeeker->gosi_evidence = $gosiEvidenceFileName;
            $jobSeeker->save();

            $path = $request->file('gosiEvidence')->storeAs(
                'public/'.$jobSeeker->id, $gosiEvidenceImageName
            );
        }

        return response()->json(['success' => 'Files Uploaded Successfully.']);
    }
}
