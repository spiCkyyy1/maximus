<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Models\JobSeeker;
use App\Models\ReadinessAssessment;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('setLocale')->group(function () {
    Route::get('/', [FrontendController::class, 'landing'])->name('landing');

    Route::get('/terms-conditions', [FrontendController::class, 'termsCondition'])->name('termsCondition');

    Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacyPolicy');

    Route::get('/eligibility-form', [FrontendController::class, 'jobSeeker'])->name('jobSeeker');

});

Route::post('/employer-form', [FrontendController::class, 'employerForm'])->name('employerForm');

Route::post('/application-rejected', [FrontendController::class, 'applicationRejected'])->name('applicationRejected');

Route::post('/save-personal-information', [FrontendController::class, 'savePersonalInformation'])->name('savePersonalInformation');

Route::post('/save-gender', [FrontendController::class, 'saveGender'])->name('saveGender');

Route::post('/save-qualification', [FrontendController::class, 'saveQualification'])->name('saveQualification');

Route::post('/save-employment', [FrontendController::class, 'saveEmployment'])->name('saveEmployment');

Route::post('/save-jobTraining', [FrontendController::class, 'saveJobTraining'])->name('saveJobTraining');

Route::post('/save-social', [FrontendController::class, 'saveSocial'])->name('saveSocial');

Route::post('/save-education-field', [FrontendController::class, 'saveEducationField'])->name('saveEducationField');

Route::post('/save-unemployment', [FrontendController::class, 'saveUnemployment'])->name('saveUnemployment');

Route::post('/upload-files', [FrontendController::class, 'uploadDocuments'])->name('uploadDocuments');

Route::get('/assessment-test/{id}', [FrontendController::class, 'assessmentTest'])->name('assessmentTest');

Route::post('/save-readiness', [FrontendController::class, 'saveReadiness'])->name('saveReadiness');

Route::post('/save-evaluation', [FrontendController::class, 'saveEvaluation'])->name('saveEvaluation');

Route::post('/save-competencies', [FrontendController::class, 'saveCompetencies'])->name('saveCompetencies');



Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');

Route::middleware('auth')->group(function () {

    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::post('/admin/get-paginated-data', [AuthController::class, 'getPaginatedData'])->name('getPaginatedData');

    Route::post('/filter-candidates', [AuthController::class, 'dashboardData'])->name('dashboardData');

    Route::post('/admin/get/questions', [AuthController::class, 'getAssessmentQuestions'])->name('getAssessmentQuestions');

    Route::get('/admin/all-candidates', [AuthController::class, 'allCandidates'])->name('allCandidates');

    Route::post('/admin/get-selected-candidates', [AuthController::class, 'getSelectedCandidates'])->name('getSelectedCandidates');

    Route::get('/admin/selected-candidates', [AuthController::class, 'selectedCandidates'])->name('selectedCandidates');

    Route::get('/admin/rejected-candidates', [AuthController::class, 'rejectedCandidates'])->name('rejectedCandidates');

    Route::post('/admin/get-rejected-candidates', [AuthController::class, 'getRejectedCandidates'])->name('getRejectedCandidates');

    Route::get('/admin/reviewed-candidates', [AuthController::class, 'reviewedCandidates'])->name('reviewedCandidates');

    Route::post('/admin/get-reviewed-candidates', [AuthController::class, 'getReviewedCandidates'])->name('getReviewedCandidates');

    Route::get('/admin/employers', [AuthController::class, 'employers'])->name('employers');

    Route::post('/admin/get-employers', [AuthController::class, 'getEmployers'])->name('getEmployers');

    Route::get('/admin/review/jobseeker/{id}/{review}', [AuthController::class, 'reviewJobSeeker'])->name('reviewJobSeeker');

    Route::get('/admin/status/jobseeker/{id}/{status}', [AuthController::class, 'changeStatus'])->name('changeStatus');

    Route::get('/admin/download/excel', [AuthController::class, 'downloadExcel'])->name('downloadExcel');

    Route::get('/admin/download/selected', [AuthController::class, 'downloadSelectedExcel'])->name('downloadSelectedExcel');

    Route::get('/admin/download/rejected', [AuthController::class, 'downloadRejectedExcel'])->name('downloadRejectedExcel');

    Route::get('/admin/download/reviewed', [AuthController::class, 'downloadReviewedExcel'])->name('downloadReviewedExcel');

    Route::get('/admin/download/employers', [AuthController::class, 'downloadEmployersExcel'])->name('downloadEmployersExcel');

});

Route::get('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/admin/login', [AuthController::class, 'verifyLogin'])->name('verifyLogin');

Route::get('/admin/register', [AuthController::class, 'register'])->name('register');

Route::get('/admin/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

Route::get('/test', function(){
    // return view('emails.jobseekeremail', ['id' => 1]);
    // Mail::to('spickyyy@gmail.com')->send(new JobSeekerEmail());

    return 'done';
});

// Route::inertia('/eligibility-form', 'EligibilityForm')->name('jobSeeker');
// return Inertia::render('Welcome', [
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
// ]);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
