<?php

namespace App\Jobs;

use App\Models\Branch;
use App\Models\Student;
use App\Services\NewSchoolYearService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NewSchoolYearJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Student $student;

    protected Branch $branch;

    protected $type;

    public function __construct(Student $student = null, Branch $branch = null, $type)
    {
        $this->student = $student;
        $this->branch = $branch;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        app(NewSchoolYearService::class)->handle($this->student, $this->branch, $this->type);
    }
}
