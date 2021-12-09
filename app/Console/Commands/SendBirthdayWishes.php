<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\BirthDay;
use App\Models\Employee;
use App\Models\SentSms;
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
        $birthdays = Employee::whereMonth('date_of_birth', '=', Carbon::now()->format('m'))->whereDay('date_of_birth', '=', Carbon::now()->format('d'))->get();
        foreach($birthdays as $bd){
            $phone = $bd->mobile_number;
            $message ='Wish you a Happy Birthday ' . $bd->calling_name.'. May you get the best of everything in life';

            $response = Http::withHeaders([
                'Authorization' => 'LB_Key750 QkVSRU5ESU5BREVWQVBJMDNfQjBTOnhsczRPN1dmazBfQjlT',
            ])->get('http://smsm.lankabell.com:4040/Sms.svc/SecureSendSms?phoneNumber='.$phone.'&smsMessage='.$message);

            SentSms::create([
               'receiver' => $bd->full_name,
               'characters' => strlen($message),
               'epf' => $bd->epf,
               'company' => $bd->company,
               'branch' => $bd->branch,
               'response_id' => $response['ID'],
               'response_status' => $response['Status'],
               'response_data' => $response['Data']
            ]);

        }
    }
}
