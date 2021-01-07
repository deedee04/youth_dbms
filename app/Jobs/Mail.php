<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\MailYouth;
use App\Models\YouthInfo;

class Mail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $data = $this->request;

        $users = YouthInfo::whereIn('gender', $data['gender'])
            ->whereIn('nationality', $data['country'])->selectRaw('email')->get();

        // dd(count($users));

        foreach ($users as $user) {
            \Mail::to($user->email)->send(new MailYouth($this->request));
        }
    }
}
