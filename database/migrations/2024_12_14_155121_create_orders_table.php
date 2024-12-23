<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() { 
        Schema::create('orders', function (Blueprint $table) { 
                $table->uuid('id')->primary(); 
                $table->unsignedBigInteger('user_id'); // Khóa ngoại liên kết với bảng users 
                $table->unsignedBigInteger('product_id'); // Khóa ngoại liên kết với bảng productproduct
                $table->double('total_price'); 
                $table->string('status')->default('Chờ'); 
                $table->timestamps(); // Thiết lập khóa ngoại 
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); 
            }); 
        } /** * Reverse the migrations. * * @return void */ 
        public function down() { 
            Schema::dropIfExists('orders'); 
        }
};
