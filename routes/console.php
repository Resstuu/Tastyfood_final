<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:setup {--fresh : Drop all tables before running migrations}', function () {
    $connection = config('database.default');
    $config = config("database.connections.{$connection}");

    if ($connection === 'mysql') {
        $database = $config['database'] ?? null;
        $host = $config['host'] ?? '127.0.0.1';
        $port = $config['port'] ?? 3306;
        $username = $config['username'] ?? 'root';
        $password = $config['password'] ?? '';

        if ($database) {
            $this->info("Ensuring MySQL database [{$database}] exists...");
            $databaseName = str_replace('`', '``', $database);
            $pdo = new PDO("mysql:host={$host};port={$port}", $username, $password);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$databaseName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        }
    }

    if ($connection === 'sqlite') {
        $database = $config['database'] ?? null;

        if ($database && $database !== ':memory:') {
            File::ensureDirectoryExists(dirname($database));

            if (! File::exists($database)) {
                File::put($database, '');
            }
        }
    }

    $this->call($this->option('fresh') ? 'migrate:fresh' : 'migrate', [
        '--force' => true,
    ]);

    $this->call('db:seed', [
        '--force' => true,
    ]);

    $this->call('storage:link');

    $this->info('Application setup complete.');
})->purpose('Create the database, run migrations, seed admin, and link storage');
