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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->integer('years_of_stay')->nullable();
            $table->string('purpose')->nullable();
            $table->string('precinct_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('contact_person_emergency')->nullable();
            $table->string('contact_number_emergency')->nullable();
            $table->string('relationship')->nullable();
            $table->string('name_of_parents_guardian')->nullable();
            $table->string('address_parents_guardian')->nullable();
            $table->string('contact_number_parents')->nullable();
            $table->string('name_of_student')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('total_gross_receipts_business', 15, 2)->nullable();
            $table->decimal('total_earnings_salaries_prof', 15, 2)->nullable();
            $table->decimal('total_income_real_property', 15, 2)->nullable();
            $table->string('valid_id_1')->nullable();
            $table->string('valid_id_2')->nullable();
            $table->enum('request_type', ['Cedula', 'Barangay ID', 'Barangay Clearance', 'Certificate of Indigency']);
            $table->enum('status', ['Pending', 'For-Review', 'Approved', 'Rejected', 'Cancelled'])->default('Pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();

            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
