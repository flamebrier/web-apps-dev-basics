<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client")->constrained("clients")->onDelete('cascade');
            $table->date("date");
            $table->time("time")->nullable();
            $table->string("service", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function(Blueprint $table) {
            $table->dropForeign('visits_client_foreign');
        });
        Schema::dropIfExists('visits');
    }
}
