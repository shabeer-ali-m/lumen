<?php
/**
 *
 * PHP version >= 7.0
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class ImportDbCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "import:db";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Import data to db";

    /**
     * Schema file
     *
     * @var string
     */
    protected $file = 'database/users.sql';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::unprepared(file_get_contents($this->file));
        $this->info("Data imported successfully");
    }
}
