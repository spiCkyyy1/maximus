<?php

namespace App\Mail;

use App\Models\JobSeeker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobSeekerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $jobSeeker;
    public function __construct(JobSeeker $jobSeeker)
    {
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // ->from('OJTREG@maximusgulf.com')
        // ->subject('Maximus Gulf')
        if($this->jobSeeker->status == 0){
            return $this->view('emails.jobseekerrejectedemail');
        }else{
            return $this->view('emails.jobseekeremail');
        }
        
    }
}
