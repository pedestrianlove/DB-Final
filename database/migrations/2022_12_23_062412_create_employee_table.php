<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('ID', 10)
                ->primary();
            $table->string('Name', 14);
            $table->string('Rank', 10);
            $table->decimal('Salary', 8,0);
            $table->string('Tel', 14);
            $table->enum('Sex', ['M', 'F']);
            $table->date('BirthDate');
            $table->date('AcceptedDate');
            $table->string('Address', 30);
            $table->string('Picture', 255)->nullable();
            $table->softDeletes();
        });
        Schema::create('nations', function (Blueprint $table) {
            $table->string('Code', 6)
                ->primary();
            $table->string('Name', 14);
            $table->string('Continent', 6);
            $table->string('Leader', 14);
            $table->string('FMinister', 14);
            $table->string('Contacts', 14);
            $table->decimal('Population', 14, 0);
            $table->decimal('Area', 14, 0);
            $table->string('Tel', 14);
            $table->enum('IsFriend', ['yes', 'no']);
            $table->softDeletes();
        });
        Schema::create('dependents', function (Blueprint $table) {
            $table->id('dependent_id');
            $table->string('ID', 10);
            $table->string('Name', 14);
            $table->string('Employee_ID', 10);
            $table->string('Relationship', 6);
            $table->softDeletes();
        });
        Schema::create('expats', function (Blueprint $table) {
            $table->id('expat_id');
            $table->string('Nation_Code', 6);
            $table->string('Employee_ID', 10);
            $table->string('Ambassador_ID', 10);
            $table->date('StartDate');
            $table->softDeletes();
        });

        // Add foreign Key part
        Schema::table('expats', function (Blueprint $table) {
            $table->foreign('Nation_Code')
                ->references('Code')
                ->on('nations')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Employee_ID')
                ->references('ID')
                ->on('employees')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Ambassador_ID')
                ->references('ID')
                ->on('employees')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table ('dependents', function (Blueprint $table) {
            $table->foreign('Employee_ID')
                ->references('ID')
                ->on('employees')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removing foreign key
        Schema::table('expats', function (Blueprint $table) {
            $table->dropForeign(['Nation_Code']);
            $table->dropForeign(['Employee_ID']);
            $table->dropForeign(['Ambassador_ID']);
        });
        Schema::table('dependents', function (Blueprint $table) {
            $table->dropForeign(['Employee_ID']);
        });


        // Removing all remaining keys
        Schema::dropIfExists('employees');
        Schema::dropIfExists('nations');
        Schema::dropIfExists('dependents');
        Schema::dropIfExists('expats');
    }
};
