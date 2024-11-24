<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CreateFullModelStructure extends Command
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
    protected $description = 'Create a model with migration, seeder, repository, interface, and controller, and move them to subfolders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modelName = $this->argument('model');
        $modelClass = class_basename($modelName);
        $modelTable = strtolower(Str::plural(Str::snake($modelClass)));

        // Ask user to choose a subfolder
        $subfolder = $this->choice('Select a subfolder', ['RDs', 'HRs', 'CRs', 'Cs', 'ACs']);

        // Create subfolder paths
        $subfolderModelPath = app_path("Models/{$subfolder}");
        $subfolderMigrationPath = database_path("migrations/{$subfolder}");
        $subfolderSeederPath = database_path("seeders/{$subfolder}");
        $subfolderControllerPath = app_path("Http/Controllers/APIs/{$subfolder}");
        $subfolderRepositoryPath = app_path("Repositories/Impl/{$subfolder}");
        $subfolderInterfacePath = app_path("Repositories/{$subfolder}");

        // Ensure the subfolders exist
        File::ensureDirectoryExists($subfolderModelPath);
        File::ensureDirectoryExists($subfolderMigrationPath);
        File::ensureDirectoryExists($subfolderSeederPath);
        File::ensureDirectoryExists($subfolderControllerPath);
        File::ensureDirectoryExists($subfolderRepositoryPath);
        File::ensureDirectoryExists($subfolderInterfacePath);

        // Create model and migration
        Artisan::call('make:model', ['name' => "{$subfolder}/{$modelName}", '-m' => true]);

        // Move the generated migration file
        $this->moveMigrationFile($modelTable, $subfolderMigrationPath);

        // Move the generated model file
        $this->moveModelFile($modelName, $subfolderModelPath);

        // Create and move seeder
        $this->createAndMoveSeeder($modelClass, $subfolderSeederPath);

        // Create and move controller
        $this->createAndMoveController($modelClass, $subfolderControllerPath);

        // Create and move repository and interface
        $this->createRepositoryAndInterface($modelClass, $subfolder,$subfolderRepositoryPath, $subfolderInterfacePath, Str::snake($modelClass));

        return 0;
    }

    protected function moveMigrationFile($modelTable, $subfolderMigrationPath)
    {
        $files = File::files(database_path('migrations'));
        $migrationFile = null;

        foreach ($files as $file) {
            if (strpos($file->getFilename(), "create_{$modelTable}_table") !== false) {
                $migrationFile = $file;
                break;
            }
        }

        if ($migrationFile) {
            File::move($migrationFile->getPathname(), "{$subfolderMigrationPath}/{$migrationFile->getFilename()}");
            $this->info("Migration moved to {$subfolderMigrationPath}");
        }
        //  else {
        //     $this->error('Migration file not found');
        // }
    }

    protected function moveModelFile($modelName, $subfolderModelPath)
    {
        $modelFile = app_path("Models/{$modelName}.php");
        if (File::exists($modelFile)) {
            File::move($modelFile, "{$subfolderModelPath}/{$modelName}.php");
            $this->info("Model moved to {$subfolderModelPath}");
        }
        // else {
        //     $this->error('Model file not found');
        // }
    }

    protected function createAndMoveSeeder($modelClass, $subfolderSeederPath)
    {
        $seederName = "{$modelClass}Seeder";
        Artisan::call('make:seeder', ['name' => $seederName]);

        $seederFile = database_path("seeders/{$seederName}.php");
        if (File::exists($seederFile)) {
            File::move($seederFile, "{$subfolderSeederPath}/{$seederName}.php");
            $this->info("Seeder moved to {$subfolderSeederPath}");
        }
        // else {
        //     $this->error('Seeder file not found');
        // }
    }

    protected function createAndMoveController($modelClass, $subfolderControllerPath)
    {
        $controllerName = "{$modelClass}Controller";
        Artisan::call('make:controller', ['name' => $controllerName]);

        $controllerFile = app_path("Http/Controllers/{$controllerName}.php");
        if (File::exists($controllerFile)) {
            File::move($controllerFile, "{$subfolderControllerPath}/{$controllerName}.php");
            $this->info("Controller moved to {$subfolderControllerPath}");
        }
        //  else {
        //     $this->error('Controller file not found');
        // }
    }

    protected function createRepositoryAndInterface($modelClass, $subfolder,$subfolderRepositoryPath, $subfolderInterfacePath, $model)
    {
        $repositoryName = "{$modelClass}Repository";
        $interfaceName = "{$modelClass}Interface";

        $this->createFile("{$subfolderRepositoryPath}/{$repositoryName}.php", $this->getRepositoryTemplate($modelClass, $repositoryName, $interfaceName, $subfolder, $model));
        $this->createFile("{$subfolderInterfacePath}/{$interfaceName}.php", $this->getInterfaceTemplate($interfaceName, $subfolder));

        $this->info("Repository and Interface created and moved to {$subfolderRepositoryPath} and {$subfolderInterfacePath}");
    }

    protected function createFile(string $path, string $content)
    {
        if (!File::exists($path)) {
            File::put($path, $content);
        } else {
            $this->error("File {$path} already exists!");
        }
    }

    protected function getRepositoryTemplate(string $modelClass, string $repositoryName, string $interfaceName, string $subfolder, string $model)
    {
        return <<<EOT
<?php

namespace App\\Repositories\\Impl;

use App\\Repositories\\{$interfaceName};
use App\\Models\\$subfolder\\{$modelClass};

class {$repositoryName} extends MasterRepository implements {$interfaceName}
{
    protected  \$model;

    public function __construct({$modelClass} \$model)
    {
        parent::__construct( \$model);
    }
}
EOT;
    }

    protected function getInterfaceTemplate(string $interfaceName, string $subfolder)
    {
        return <<<EOT
<?php

namespace App\\Repositories;

interface {$interfaceName} extends BaseInterface
{
    // Define your methods here
}
EOT;
    }
}
