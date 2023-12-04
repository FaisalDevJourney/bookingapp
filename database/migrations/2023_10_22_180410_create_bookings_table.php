<?php

use App\Models\course;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("course_id")->constrained()->cascadeOnDelete();
            $table->string("name");
            $table->dateTime("startdate");
            $table->dateTime("enddate");
            $table->enum("status",["Pending", "Cancelled","Finished"])->default("Pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }

   
};
