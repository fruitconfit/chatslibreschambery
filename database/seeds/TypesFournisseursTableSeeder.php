<?php

use Illuminate\Database\Seeder;

class TypesFournisseursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Vétérinaire']);
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Animalerie']);
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Communication']);
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Matières premières pour événements']);
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Remboursement']);
        DB::table('miaou_typesfournisseurs')->insert(['nom' => 'Autre']);
    }
}
