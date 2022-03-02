<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pull_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->text('body');
            $table->string('marking')->default('start');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pull_requests');
    }
};
