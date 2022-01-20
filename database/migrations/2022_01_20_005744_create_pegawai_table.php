<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk')->unique()->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->date('tgl_gabung');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });

        //make trigger no_induk
        DB::unprepared("
            CREATE TRIGGER `no_induk`
            BEFORE INSERT ON `pegawai`
            FOR EACH ROW 
            BEGIN
            declare last_id integer;
                select id into last_id from pegawai order by id desc limit 1;
                IF (last_id IS null)
                THEN
                SET last_id = 0;
                END IF;
                SET NEW.no_induk = CONCAT('IP06', LPAD(last_id+1, 3, '0'));
            END
       ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
