<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('affiliate_id')->nullable()->after('id');
            $table->string('affiliate_code')->nullable()->after('affiliate_id');
            $table->double('total_score', 20, 0)->default(0)->after('affiliate_code');
            $table->double('total_money', 20, 0)->default(0)->after('total_score');
            $table->double('total_payment', 20, 0)->default(0)->after('total_money');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'affiliate_id',
                'affiliate_code',
                'total_score',
                'total_money',
                'total_payment',
            ]);
        });
    }
}
