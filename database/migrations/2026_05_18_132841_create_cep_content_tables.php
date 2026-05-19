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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->enum('category', [
                'Coordenadores',
                'Membros',
                'Representantes de Participante de Pesquisa',
                'Secretaria',
            ]);
            $table->string('role');
            $table->string('name');
            $table->string('education');
            $table->string('qualification');
            $table->string('notes')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('normative_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('normative_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('normative_section_id')->constrained()->cascadeOnDelete();
            $table->text('title');
            $table->string('file_path');
            $table->string('original_filename');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('document_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('document_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_section_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->string('file_path')->nullable();
            $table->string('original_filename')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('meeting_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('submission_deadline');
            $table->string('meeting_date');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_hours', function (Blueprint $table) {
            $table->id();
            $table->string('weekday');
            $table->string('hours');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('training_topics', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('training_materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('file_path')->nullable();
            $table->string('original_filename')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('file_path')->nullable();
            $table->string('original_filename')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('tutorial_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('thumbnail_path')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('tutorial_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('guidance_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('warning')->nullable();
            $table->text('important')->nullable();
            $table->text('observation')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('guidance_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guidance_section_id')->constrained()->cascadeOnDelete();
            $table->text('text');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('guidance_examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guidance_section_id')->constrained()->cascadeOnDelete();
            $table->text('text');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('address');
            $table->string('city_state_zip');
            $table->string('phone');
            $table->string('email');
            $table->string('service_hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
        Schema::dropIfExists('guidance_examples');
        Schema::dropIfExists('guidance_points');
        Schema::dropIfExists('guidance_sections');
        Schema::dropIfExists('tutorial_faqs');
        Schema::dropIfExists('tutorial_videos');
        Schema::dropIfExists('tutorials');
        Schema::dropIfExists('training_materials');
        Schema::dropIfExists('training_topics');
        Schema::dropIfExists('service_hours');
        Schema::dropIfExists('meeting_schedules');
        Schema::dropIfExists('document_items');
        Schema::dropIfExists('document_sections');
        Schema::dropIfExists('normative_items');
        Schema::dropIfExists('normative_sections');
        Schema::dropIfExists('members');
    }
};
