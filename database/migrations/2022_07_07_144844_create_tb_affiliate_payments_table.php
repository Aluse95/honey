<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAffiliatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_affiliate_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->double('money', 20, 2)->nullable();
            $table->text('description')->nullable();
            $table->json('json_params')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('tb_affiliate_payments');
    }
}
