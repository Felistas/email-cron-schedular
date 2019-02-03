<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailSchedular;
use Illuminate\Support\Facades\Mail;

class scheduleEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly emails to customers';

    private $h;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EmailSchedular $h)
    {
        parent::__construct();
        $this->h=$h;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Mail::to('felistaswaceera@gmail.com')->send(new EmailSchedular());
        dump("Success");
    }
}
