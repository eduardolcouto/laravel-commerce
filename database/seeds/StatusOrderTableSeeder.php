<?php

use Illuminate\Database\Seeder;

class StatusOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_orders')->truncate();
        \CodeCommerce\StatusOrder::create(['name'=>'Aguardando Pagamento']);
        \CodeCommerce\StatusOrder::create(['name'=>'Em Transporte']);
        \CodeCommerce\StatusOrder::create(['name'=>'Entregue']);
        \CodeCommerce\StatusOrder::create(['name'=>'Cancelado']);
    }
}
