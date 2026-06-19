<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("companies", function (Blueprint $table) {
            $table->id();

            $table->foreignId("user_id")
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId("package_id")
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string("name");
            $table->text("address")->nullable();

            $table->string("phone")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();

            $table->string("website")->nullable();
            $table->text("description")->nullable();
            $table->string("logo")->nullable();

            $table->date("payment_due_date")->nullable();

            $table->boolean("is_approved")->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("companies");
    }
};
