<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoBayPaiement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiements', function (Blueprint $table) {
            if(!Schema::hasColumn('paiements', 'auto_bay'))
                $table->boolean('auto_bay')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            if(Schema::hasColumn('mode_paiement', 'auto_bay'))
                $table->dropColumn('auto_bay');
        });
    }
}
