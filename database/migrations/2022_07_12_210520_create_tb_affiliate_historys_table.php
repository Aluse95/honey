<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAffiliateHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_affiliate_historys', function (Blueprint $table) {
            $table->id();
            $table->string('is_type')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->double('order_total_money', 20, 2)->default(0);
            $table->double('affiliate_percent', 20, 2)->default(0);
            $table->double('affiliate_point', 20, 2)->nullable();
            $table->double('affiliate_money', 20, 2)->nullable();
            $table->text('description')->nullable();
            $table->json('json_params')->nullable();
            $table->string('status')->default('pending');
            $table->foreignId('admin_created_id')->nullable()->constrained('admins');
            $table->foreignId('admin_updated_id')->nullable()->constrained('admins');
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
        Schema::dropIfExists('tb_affiliate_historys');
    }
}
