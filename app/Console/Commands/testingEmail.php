<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Mail\trialMail;
use Mail;

class testingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saya mencoba cronjobnya Laravel';

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
       $template = 'mail.mailForgot';
         Mail::to('gaming2.ameliac@gmail.com')->send(new trialMail($template));
         $this->info('testing;email command run success');
    }
}
