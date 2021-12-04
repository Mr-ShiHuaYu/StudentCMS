<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = \File::files(__DIR__);
        foreach ($seeders as $seeder) {
            $filename = $seeder->getFilename();
            if ($filename == "DatabaseSeeder.php") {
                continue;
            }
            $ext = $seeder->getExtension();
            $model = "Database\Seeders\\".rtrim($filename, ".{$ext}");

            $this->call($model);
        }
    }
}
