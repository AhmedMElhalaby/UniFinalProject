<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('identity_number')->unique();
            $table->string('std_number')->unique();
            $table->string('password');
            $table->date('birthday');
            $table->enum('gender',['male','female']);
            $table->enum('scientific_grade',['bachelor','master','phd']);
            $table->string('address')->nullable();
            $table->string('avatar')->default('default-avatar.png');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
