<?php

namespace App\Console\Commands;

use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckOldAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check_old_daddress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if address was created before 1 hour or not';

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
        foreach (Address::all() as $address) {
            if (Carbon::parse($address['created_at'])->diffInMinutes(Carbon::now()) >= 60) {
                $address['isOld'] = true;
                $address->save();
            }
        }
    }
}
