<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workflow_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('file');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workflow_uploads');
    }
};
