<?php

namespace App\Jobs;

use App\Models\TrainingProviderStudent;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateCandidateID implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $candidate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($candidate_id)
    {
        $this->candidate = TrainingProviderStudent::findOrFail($candidate_id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reg_no = $this->candidate->registration->registration_no;
        $gender = $this->candidate->gender === 'male' ? 1 : 0;
        $date_of_birth = str_replace('-', '', (string)$this->candidate->date_of_birth);
        $program_code = 'p_code';
        $candidate_type = $this->candidate->candidate_type === 'regular' ? 'R' : 'P';

        if ($this->candidate->candidate_id === null) {
            $this->candidate->update([
                'candidate_id' => $reg_no . $gender . $date_of_birth . $program_code . $candidate_type
            ]);
        }
    }
}
