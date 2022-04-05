<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddminPriceModePaiement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mode_paiement', function (Blueprint $table) {
            if(!Schema::hasColumn('mode_paiement', 'min_amount'))
                $table->float('min_amount')->default(0)->affter('frais_fixe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mode_paiement', function (Blueprint $table) {
            if(Schema::hasColumn('mode_paiement', 'min_amount'))
                $table->dropColumn('min_amount');
        });
    }
}
