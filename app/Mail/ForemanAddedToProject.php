<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForemanAddedToProject extends Mailable
{
    use Queueable, SerializesModels;

    public $project;
    public $foreman;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project,$foreman)
    {
        $this->project = $project;
        $this->foreman = $foreman;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.foreman_added_to_project')
                    ->with([
                        'foremanName' => $this->foreman->name,
                        'projectName' => $this->project->name,
                        'projectAddress' => $this->project->address,
                    ]);
    }
}
