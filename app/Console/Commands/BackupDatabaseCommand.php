<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:run';

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
        shell_exec('mysqldump --host=192.168.101.211 --user=admin --port=3306 -p"58506484" dpyxrevistas_mx > '.storage_path('app/backups/'.date('Y-m-d-h-m-s')).'.sql');
        return 0;
    }
}
