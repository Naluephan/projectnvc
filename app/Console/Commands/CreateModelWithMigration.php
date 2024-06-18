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
    protected $signature = 'make:all {model}';

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

        // Ask user to choose a subfolder for model, migration and seeder
        $subfolder = $this->choice('Select a subfolder for model, migration and seeder', ['RDs', 'HRs', 'CRs', 'Cs', 'ACs']);

        // Create subfolder paths
        $subfolderModelPath = app_path("Models/{$subfolder}");
        $subfolderMigrationPath = database_path("migrations/{$subfolder}");
        $subfolderSeederPath = database_path("seeders/{$subfolder}");

        // Ensure the subfolders exist
        File::ensureDirectoryExists($subfolderModelPath);
        File::ensureDirectoryExists($subfolderMigrationPath);
        File::ensureDirectoryExists($subfolderSeederPath);

        // Create model and migration
        Artisan::call('make:model', ['name' => "{$subfolder}/{$modelName}", '-m' => true]);

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
            // Move migration file
            File::move($migrationFile->getPathname(), "{$subfolderMigrationPath}/{$migrationFile->getFilename()}");
            $this->info("Model and migration created. Migration moved to {$subfolderMigrationPath}");
        }
        //  else {
        //     $this->error('Migration file not found');
        // }

        // Move model file
        $modelFile = app_path("Models/{$modelName}.php");
        if (File::exists($modelFile)) {
            File::move($modelFile, "{$subfolderModelPath}/{$modelName}.php");
            $this->info("Model created. Model moved to {$subfolderModelPath}");
        }
        //  else {
        //     $this->error('Model file not found');
        // }

        // Create seeder
        $seederName = "{$modelClass}Seeder";
        Artisan::call('make:seeder', ['name' => $seederName]);

        // Move seeder file
        $seederFile = database_path("seeders/{$seederName}.php");
        if (File::exists($seederFile)) {
            File::move($seederFile, "{$subfolderSeederPath}/{$seederName}.php");
            $this->info("Seeder created. Seeder moved to {$subfolderSeederPath}");

            // // Run the seeder
            // Artisan::call('db:seed', ['--class' => "{$subfolder}\\{$seederName}"]);
            // $this->info("Database seeded using {$seederName}");
        }
        // else {
        //     $this->error('Seeder file not found');
        // }

        return 0;
    }
}
