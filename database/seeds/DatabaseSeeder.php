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
        // $this->call(UsersTableSeeder::class);
        //Roles od users for ACL
        DB::table('roles')->insert(['name' => 'User','description' => 'This is default User role']);
        DB::table('roles')->insert(['name' => 'Admin','description' => 'This is Admin User role']);

        //Default Report for users 
        DB::table('reports')->insert(['category'=>'Financial','name' => 'Balance Sheet','url' => 'balance-sheet']);
        DB::table('reports')->insert(['category'=>'Financial','name' => 'Tax Report','url' => 'tax-report']);
        DB::table('reports')->insert(['category'=>'Financial','name' => 'Cash Flow','url' => 'cash-summary']);
        DB::table('reports')->insert(['category'=>'Sales','name' => 'P & L ','url' => 'profit-loss']);

        
        DB::table('currencies')->insert(['name'=>'Rupee','currency_symbol'=>'₹','formal_currency_name' => 'INR','symbol_decimal_portion' => '2']);

        //Users dummy entry
        //factory(App\User::class,10)->create();
    }
}
