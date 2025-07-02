<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital status')->nullable();
            $table->string('taste')->nullable();
            $table->string('newspapers')->nullable();
            $table->string('car')->nullable();
            $table->string('movie&music')->nullable();
            $table->string('sites')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('attitudes')->nullable();
            $table->string('job')->nullable();
                  });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['age','gender','marital status','taste','newspapers','car','movie&music','sites','hobbies','attitudes','job']);
        });
    }
};
