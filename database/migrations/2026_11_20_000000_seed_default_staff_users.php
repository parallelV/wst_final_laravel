<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('users')->insert([
            [
                'username' => 'zyril',
                'full_name' => 'John Zyril Paco',
                'password' => bcrypt('zyrilpaco'),
                'created_at' => $now,
            ],
            [
                'username' => 'kyle',
                'full_name' => 'Kyle Sarangay',
                'password' => bcrypt('kylesarangay'),
                'created_at' => $now,
            ],
            [
                'username' => 'seth',
                'full_name' => 'Seth John Lloyd Biala',
                'password' => bcrypt('sethbiala'),
                'created_at' => $now,
            ],
            [
                'username' => 'johann',
                'full_name' => 'Johann Abion',
                'password' => bcrypt('johannabion'),
                'created_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('users')
            ->whereIn('username', ['zyril', 'kyle', 'seth', 'johann'])
            ->delete();
    }
};
