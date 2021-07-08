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

     public $id;
    public function __construct($id)
    {
        $this->id = $id;
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
        $jobSeeker = JobSeeker::find($this->id);
        if($jobSeeker->status == 0){
            return $this->view('emails.jobseekerrejectedemail');
        }else{
            return $this->view('emails.jobseekeremail');
        }
        
    }
}
