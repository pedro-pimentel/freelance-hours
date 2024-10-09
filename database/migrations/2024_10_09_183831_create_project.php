<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->dateTime('ends_at');
            $table->string('status')->default('open');
            $table->json('tech_stack');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
