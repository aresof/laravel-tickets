<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateTables([
            'users',
            'password_resets',
            'tickets',
            'ticket_votes',
            'ticket_comments',
            'ticket_likes',
            'ticket_categories'
        ]);

        $this->call(UserSeeder::class);
        $this->call(TicketCategorySeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(TicketVoteSeeder::class);
        $this->call(TicketCommentSeeder::class);


        Model::reguard();
    }

    protected function truncateTables(array $tables)
    {
        $this->checkForeignKeys(false);

        //vaciar las tablas
        foreach($tables as $table){
            DB::table($table)->truncate();
        }

        $this->checkForeignKeys(true);
    }

    protected function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';

        DB::statement('SET FOREIGN_KEY_CHECKS = '.$check.';');
    }
}
