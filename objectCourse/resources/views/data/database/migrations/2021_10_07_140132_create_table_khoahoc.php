<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKhoahoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_khoahoc', function (Blueprint $table) {
            $table->id();
			$table->string('TenKhoa');
			$table->integer('Gia');
			$table->string('urlAnh');
			$table->boolean('TrangThai')->default(true);
			$table->integer('danhmuc_id')->unsigned();   
			$table->integer('donhang_id')->unsigned();
			
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_khoahoc');
    }
}