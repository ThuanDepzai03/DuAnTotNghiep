<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomerTable
{
    public static function name(): string
    {
        return Schema::hasTable('nguoidung') ? 'nguoidung' : 'users';
    }

    public static function hasColumn(string $column): bool
    {
        $table = self::name();

        return Schema::hasTable($table) && Schema::hasColumn($table, $column);
    }

    public static function query()
    {
        return DB::table(self::name());
    }
}
