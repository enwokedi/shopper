<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MotorcycleController;
use App\Models\Motorcycle;
use App\Models\User;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentsController;
use App\Models\Payment;
use Carbon\Carbon;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily updates including payment data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return (new MotorcycleController)->nextRentalPayment();
        // return (new MailController)->rentalDueMail($client->email, $client->first_name);

        // $next_payment_date = $motorcycle->next_payment_date;
        // $motorcycle->next_payment_date = $next_payment_date->addDays(7);

        // $motorcycle->save();

        // return Command::SUCCESS;
    }
}
