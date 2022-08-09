<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(LinkSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(InstallSeeder::class);
    }
}
