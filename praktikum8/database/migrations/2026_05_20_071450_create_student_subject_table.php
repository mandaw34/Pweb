<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up()
{
Schema::create('student_subject', function (Blueprint $table) {
$table->id();
$table->foreignId('student_id')->constrained('students')->onDelete('cascade');
$table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
$table->timestamps();
// Mencegah duplikasi kombinasi student_id dan subject_id
$table->unique(['student_id', 'subject_id']);
});
}
public function down()
{
Schema::dropIfExists('student_subject');
}
};