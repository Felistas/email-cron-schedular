<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailSchedular;
use Illuminate\Support\Facades\Mail;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Twilio\Rest\Client;


class scheduleEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:emailShedular';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly emails to customers';


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
     * @return mixed
     */
    public function handle()
    {
        try {
            $emails = ['felistaswaceera@gmail.com', 'waceerangumi@gmail.com'];
            Mail::to($emails)->send(new EmailSchedular());
        }
        catch(\Exception $e){
            if ($e->getCode() == 400) {
                $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
                $message = $twilio->messages
                                ->create("+254716915775",
                                        array(
                                            "body" => "Unable to send email to recipient $emails[0]",
                                            "from" => "+17072719064"
                                        )
                                );
                dump($message);
            }
        }
    }
}
