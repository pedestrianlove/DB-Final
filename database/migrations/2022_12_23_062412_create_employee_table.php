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
        Schema::create('Employee', function (Blueprint $table) {
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
            $table->string('Picture', 50);
            $table->softDeletes();
        });
        Schema::create('Nation', function (Blueprint $table) {
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
        Schema::create('Dependent', function (Blueprint $table) {
            $table->string('ID', 10);
            $table->string('Name', 14);
            $table->string('Employee_ID', 10);
            $table->string('Relationship', 6);
            $table->softDeletes();
            //$table->foreign('Employee_ID')
            //    ->references('ID')
            //    ->on('Employee')
            //    ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['ID', 'Employee_ID']);
        });
        Schema::create('Expat', function (Blueprint $table) {
            $table->string('Nation_Code', 6);
            $table->string('Employee_ID', 10);
            $table->string('Ambassador_ID', 10);
            $table->date('StartDate');
            $table->primary(['Nation_Code', 'Employee_ID']);
            $table->softDeletes();
        });

        // Add foreign Key part
        Schema::table('Expat', function (Blueprint $table) {
            $table->foreign('Nation_Code')
                ->references('Code')
                ->on('Nation')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Employee_ID')
                ->references('ID')
                ->on('Employee')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Ambassador_ID')
                ->references('ID')
                ->on('Employee')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table ('Dependent', function (Blueprint $table) {
            $table->foreign('Employee_ID')
                ->references('ID')
                ->on('Employee')
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
        Schema::dropIfExists('Employee');
        Schema::dropIfExists('Nation');
        Schema::dropIfExists('Dependent');
        Schema::dropIfExists('Expat');
    }
};
