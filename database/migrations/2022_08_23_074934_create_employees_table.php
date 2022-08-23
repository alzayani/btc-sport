<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manager_id')->unsigned()->nullable();               //Job Information
            $table->bigInteger('department_id')->unsigned()->nullable();            //Job Information
            $table->string('full_name')->nullable();                                //Employee Details
            $table->string('gender')->nullable();                      //Employee Details
            $table->string('phone_number')->nullable();          //Employee Details
            $table->string('marital_status')->nullable();              //Employee Details
            $table->string('email')->nullable();
            $table->string('emp_serial')->nullable();                           //Employee Details
            $table->date('dob')->nullable();                                        //Employee Details
            $table->string('nationality')->nullable();                              //Employee Details
            $table->longText('address')->nullable();                                //Employee Details
            $table->string('cpr_no')->nullable();             //Employee Details
            $table->date('cpr_no_expiry')->nullable();                              //Employee Details
            $table->string('passport_no')->nullable();                    //Employee Details
            $table->date('passport_expiry')->nullable();                            //Employee Details

            $table->string('driving_license')->nullable();    //Other Information
            $table->date('driving_license_expiry')->nullable();                     //Other Information
            $table->string('eme_name')->nullable();                                 //Other Information
            $table->string('eme_no')->nullable();                          //Other Information
            $table->string('eme_relationship')->nullable();                         //Other Information
            $table->string('working_as')->nullable();                               //Job Information
            $table->string('designation')->nullable();                              //Job Information
            $table->date('join_date')->nullable();                                  //Job Information
            $table->date('end_date')->nullable();                                   //Job Information
            $table->string('leave_days')->nullable();                      //Job Information
            $table->string('sick_leave_days')->nullable();                 //Job Information
            $table->string('working_hours')->nullable();                   //Job Information
            $table->string('tot_days_off')->nullable();                    //Job Information

            $table->string('salary_type')->nullable();                              //Salary
            $table->string('basic_salary')->nullable();                             //Salary

            //Salary
            $table->string('health_insurance')->nullable();                //Salary
            $table->string('insurance_no')->nullable();                             //Salary
            $table->string('insurance_category')->nullable();                       //Salary
            $table->string('total_deduction')->nullable();                          //Salary
            $table->string('tot_salary_allowance')->nullable();                     //Salary
            $table->string('net_salary')->nullable();                               //Salary
            $table->string('total_paid')->nullable();                               //Salary
            $table->string('monthly_target')->nullable();                           //Salary


            // Docs photos
            $table->string('personal_photo')->nullable();                           //Documents


            $table->string('emp_gosi')->nullable();                                //Salary
            $table->string('comp_gosi')->nullable();                               //Salary
            $table->string('bank_name')->nullable();                                //Salary
            $table->string('acc_no')->nullable();                                  //Salary
            $table->string('iban')->nullable();                                     //Salary
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manager_id')->references('id')->on('employees');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
