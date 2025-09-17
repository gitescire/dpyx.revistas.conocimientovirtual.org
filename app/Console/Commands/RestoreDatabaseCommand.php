<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RestoreDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:restore {file}';

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
        shell_exec('mysql --host=192.168.101.211 --user=admin --port=3306 -p"58506484" dpyxrevistas_unison_mx < ' . storage_path('app/backups/'.$this->argument('file')));
        return 0;
    }
}
