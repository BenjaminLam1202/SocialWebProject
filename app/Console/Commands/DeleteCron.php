<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       
            echo 'am starting' . PHP_EOL;
            DB::table('posts')->insert([
            [
             'user_id' => 1,
             'category_id'=> 1,
             'title' => "day la task thu nghiem",
             'des' => "day la task thu nghiem"
            ],             
            [
             'user_id' => 2,
             'category_id'=> 2,
             'title' => "day la tasdsfsdk thu nghiem",
             'des' => "day la task thu nghiem"
            ],  

            ]);
             echo 'done bye' . PHP_EOL;

    }
}
