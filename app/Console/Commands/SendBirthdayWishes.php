<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\BirthDay;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendBirthdayWishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:wishes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Birth Day Wishes to Staff';

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
        $birthdays = BirthDay::whereMonth('birth_day', '=', Carbon::now()->format('m'))->whereDay('birth_day', '=', Carbon::now()->format('d'))->get();
        foreach($birthdays as $bd){
            $phone = $bd->phone;
            $message = 'Hello '. $bd->name.'. Wish you a Very Happy Birth Day!';

            $response = Http::withHeaders([
                'Authorization' => 'LB_Key750 QkVSRU5ESU5BREVWQVBJMDNfQjBTOnhsczRPN1dmazBfQjlT',
            ])->get('http://smsm.lankabell.com:4040/Sms.svc/SecureSendSms?phoneNumber='.$phone.'&smsMessage='.$message);

        }
    }
}
