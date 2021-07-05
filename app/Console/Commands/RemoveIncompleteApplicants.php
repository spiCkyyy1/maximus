<?php

namespace App\Console\Commands;

use App\Mail\RemoveApplicants;
use App\Models\JobSeeker;
use App\Models\ReadinessAssessment;
use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RemoveIncompleteApplicants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:jobseekers';
    private $totalCompetencies = 11;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove job seekers who have got their application accepted but haven"t given the assessment test.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jobSeekers = JobSeeker::where('status', 1)->get();

        foreach ($jobSeekers as $jobSeeker) {

            if ($jobSeeker->answered_competencies != $this->totalCompetencies) {
                Mail::to($jobSeeker->email)->send(new RemoveApplicants());
                JobSeeker::find($jobSeeker->id)->delete();
                ReadinessAssessment::where('job_seeker_id', $jobSeeker->id)->delete();
                // Storage::deleteDirectory('public/'.$jobSeeker->id);
            }
        }
    }
}
