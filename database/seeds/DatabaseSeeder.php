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
                $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(RoleMenuTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ScoresTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SystemMenuTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(UserHasPermissionsTableSeeder::class);
        $this->call(UserHasRolesTableSeeder::class);
    }
            $ext = $seeder->getExtension();
            $model = "Database\Seeders\\".rtrim($filename, ".{$ext}");

            $this->call($model);
        }
    }
}
