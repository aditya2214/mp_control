<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Produk::class, function (Faker $faker) {
    return [
        //
        'kode_produk' => $faker->word,
        'nama_produk' => $faker->word,
        'harga_produk' => $faker->randomElement(["50000","20000","20500","35000","5000000","10000","60000","80000","90000","100000"]),
        'stock_produk' => $faker->randomElement([1,2,3,5,6,8,15,12,54,15,5,56,62,22,12,64,45,78,54]),
        'tempat_produk' => function(){
            return \App\Tempat::all()->random();
        }, 
        'kategori_produk' => function(){
            return \App\Kategori::all()->random();
        }, 
        'gambar_produk' => $faker->word,
    ];
});
