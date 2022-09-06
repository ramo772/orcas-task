<?php

namespace App\Jobs;

use App\Http\Controllers\UserController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class FetshApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $apis = DB::select('select * from apis');
        foreach ($apis as $api) {
            $users = Http::get($api->link)->json();
            $schema = DB::select("select * from `schemas` where `id` = $api->schema_id limit 1");
            UserController::fetch_user($users, $schema);
        }
    }
}
