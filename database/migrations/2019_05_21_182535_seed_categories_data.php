<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '私人日记',
                'description' => '感受生活，感悟生活',
            ],
            [
                'name'        => '技术作品',
                'description' => '分享创造，分享发现',
            ],
            [
                'name'        => '心情随笔',
                'description' => '发现生活，分享生活',
            ],
            [
                'name'        => '留言板',
                'description' => '互帮互助,与人为乐',
            ],
            [
                'name'        => '关于我',
                'description' => '追求自律，偏爱自由',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
