<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartStucmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stucms:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '学生管理系统:一键生成数据库';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('开始一键生成数据库');
        \Artisan::call('migrate:fresh --seed');
        $this->info('数据库生成完毕');
    }
}
