<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FetchData;

class FetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mengambil data dari API fastprint';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mengambil data...');
        $service = new FetchData();
        $total = $service->fetch();
        $this->info("Berhasil mengambil $total data.");
    }
}