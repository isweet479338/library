<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyUpdate;
use DB;

class DailyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   protected $signature = 'daily-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        
        $user = DB::table('rentlist')
                ->join('rent_models', 'rentlist.rent_user_id', '=', 'rent_models.id')
                ->where('rentlist.back_date', null)->get();
        
        foreach ($user as $key => $value) {

            Mail::to($value->email)->send(new DailyUpdate($value));
        }


        $this->info('Daily notification sent successfully.');
    }
}
