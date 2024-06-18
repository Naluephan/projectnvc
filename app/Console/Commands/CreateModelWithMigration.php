<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateModelWithMigrationSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:model-with-migration-seeder {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model with migration and seeder, and move them to a subfolder';

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
            // Ask user to choose a subfolder for migration and seeder
            $subfolder = $this->choice('Select a subfolder for migration and seeder', ['RDs', 'HRs', 'CRs', 'Cs', 'ACs']);

            // Create subfolder paths
            $subfolderPath = database_path("migrations/{$subfolder}");
            $subfolderSeederPath = database_path("seeders/{$subfolder}");

            // Ensure the subfolders exist
            File::ensureDirectoryExists($subfolderPath);
            File::ensureDirectoryExists($subfolderSeederPath);

            // Move migration file
            File::move($migrationFile->getPathname(), "{$subfolderPath}/{$migrationFile->getFilename()}");

            // Inform user about the migration path
            $this->info("Model and migration created. Migration moved to {$subfolderPath}");

            // Create seeder
            $seederName = "{$modelClass}Seeder";
            Artisan::call('make:seeder', ['name' => $seederName]);

            // Move seeder file
            $seederFile = database_path("seeders/{$seederName}.php");
            File::move($seederFile, "{$subfolderSeederPath}/{$seederName}.php");

            // Inform user about the seeder creation and path
            $this->info("Seeder created. Seeder moved to {$subfolderSeederPath}");

            // Run the seeder
            Artisan::call('db:seed', ['--class' => $seederName]);

            // Inform user about the seeding process
            $this->info("Database seeded using {$seederName}");
        } else {
            $this->error('Migration file not found');
        }

        return 0;
    }
}
