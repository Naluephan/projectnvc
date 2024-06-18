<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateModelWithMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:model-with-migration {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model with a migration and move the migration to a subfolder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modelName = $this->argument('model');

        // Create model and migration
        Artisan::call('make:model', ['name' => $modelName, '-m' => true]);

        // Determine migration filename
        $modelClass = class_basename($modelName);
        $modelTable = strtolower(Str::plural(Str::snake($modelClass)));

        $files = File::files(database_path('migrations'));
        $migrationFile = null;

        foreach ($files as $file) {
            if (strpos($file->getFilename(), "create_{$modelTable}_table") !== false) {
                $migrationFile = $file;
                break;
            }
        }

        if ($migrationFile) {
            // Create subfolder
            $subfolder = dirname($migrationFile->getFilename(), 2);
            $subfolderPath = database_path("migrations\HRs");

            File::ensureDirectoryExists($subfolderPath);
            // Move migration file
            File::move($migrationFile->getPathname(), $subfolderPath .'\\'. $migrationFile->getFilename());

            $this->info("Model and migration created. Migration moved to {$subfolderPath}");
        } else {
            $this->error('Migration file not found');
        }

        return 0;
    }
}
