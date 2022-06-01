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
use MysqlScheman\MysqlScheman;

/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class SyncDbCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "sync:db {type}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sync database schema";

    /**
     * Schema file
     *
     * @var string
     */
    protected $schema = 'database/schema.xml';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $scheman = new MysqlScheman(
            env('DB_HOST'),
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE')
        );

        $type = $this->argument('type');
        if ($type == 'export') {
            $scheman->export($this->schema);
            $this->info("Exported successfully");
        } else if ($type == 'sync') {
            $scheman->sync2db($this->schema);
            $this->info("Synced successfully");
        } else {
            $this->error("Invalid Argument");
        }
    }
}
