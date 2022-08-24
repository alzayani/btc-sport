/******/ (function(modules) { // webpackBootstrap
    /******/ 	// The module cache
    /******/ 	var installedModules = {};
    /******/
    /******/ 	// The require function
    /******/ 	function __webpack_require__(moduleId) {
        /******/
        /******/ 		// Check if module is in cache
        /******/ 		if(installedModules[moduleId]) {
            /******/ 			return installedModules[moduleId].exports;
            /******/ 		}
        /******/ 		// Create a new module (and put it into the cache)
        /******/ 		var module = installedModules[moduleId] = {
            /******/ 			i: moduleId,
            /******/ 			l: false,
            /******/ 			exports: {}
            /******/ 		};
        /******/
        /******/ 		// Execute the module function
        /******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ 		// Flag the module as loaded
        /******/ 		module.l = true;
        /******/
        /******/ 		// Return the exports of the module
        /******/ 		return module.exports;
        /******/ 	}
    /******/
    /******/
    /******/ 	// expose the modules object (__webpack_modules__)
    /******/ 	__webpack_require__.m = modules;
    /******/
    /******/ 	// expose the module cache
    /******/ 	__webpack_require__.c = installedModules;
    /******/
    /******/ 	// define getter function for harmony exports
    /******/ 	__webpack_require__.d = function(exports, name, getter) {
        /******/ 		if(!__webpack_require__.o(exports, name)) {
            /******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
            /******/ 		}
        /******/ 	};
    /******/
    /******/ 	// define __esModule on exports
    /******/ 	__webpack_require__.r = function(exports) {
        /******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
            /******/ 		}
        /******/ 		Object.defineProperty(exports, '__esModule', { value: true });
        /******/ 	};
    /******/
    /******/ 	// create a fake namespace object
    /******/ 	// mode & 1: value is a module id, require it
    /******/ 	// mode & 2: merge all properties of value into the ns
    /******/ 	// mode & 4: return value when already ns object
    /******/ 	// mode & 8|1: behave like require
    /******/ 	__webpack_require__.t = function(value, mode) {
        /******/ 		if(mode & 1) value = __webpack_require__(value);
        /******/ 		if(mode & 8) return value;
        /******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/ 		var ns = Object.create(null);
        /******/ 		__webpack_require__.r(ns);
        /******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
        /******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
        /******/ 		return ns;
        /******/ 	};
    /******/
    /******/ 	// getDefaultExport function for compatibility with non-harmony modules
    /******/ 	__webpack_require__.n = function(module) {
        /******/ 		var getter = module && module.__esModule ?
            /******/ 			function getDefault() { return module['default']; } :
            /******/ 			function getModuleExports() { return module; };
        /******/ 		__webpack_require__.d(getter, 'a', getter);
        /******/ 		return getter;
        /******/ 	};
    /******/
    /******/ 	// Object.prototype.hasOwnProperty.call
    /******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
    /******/
    /******/ 	// __webpack_public_path__
    /******/ 	__webpack_require__.p = "/";
    /******/
    /******/
    /******/ 	// Load entry module and return exports
    /******/ 	return __webpack_require__(__webpack_require__.s = 3);
    /******/ })
    /************************************************************************/
    /******/ ({

        /***/ "./resources/js/Pages/Employees/Employee.js":
        /*!**************************************************!*\
          !*** ./resources/js/Pages/Employees/Employee.js ***!
          \**************************************************/
        /*! no static exports found */
        /***/ (function(module, exports) {

            jQuery(document).ready(function () {
                $("#create_user").click(function () {
                    if ($("#create_user").is(":checked") == true) {
                        // alert('You can rock now...');
                        $("#users_div").show();
                        $("#create_user").val("Yes");
                    }
                    else{
                        // alert('You can rock now...');
                        $("#users_div").hide();
                        $("#create_user").val("No");

                    }
                }); // Find total Allowances

                TotalAllowance();
                NetSal();
                $("#basic_salary, #housing_allowance, #transportation_allowance, #phone_allowance, #social_allowance, #other_allowance ").on("input", function () {
                    SetEmpGOSI();
                    TotalAllowance();
                    NetSal();
                    TotalPaid(); // TotalPaidBH();
                }); // Employee GOSI

                SetEmpGOSI();
                NetSal();
                $("#emp_gosi").on("input", function () {
                    SetEmpGOSI();
                    NetSal();
                    TotalPaid(); // TotalPaidBH();
                }); // Find Total Paid

                TotalPaid();
                $("#comp_gosi").on("keyup keydown change input", function () {
                    TotalPaid(); // TotalPaidBH();
                }); // Find Total Paid for Bahrani

                $("#emp_lmar_month").on("keyup keydown change input", function () {
                    TotalPaidBH();
                });
                $(".clockpicker").clockpicker({
                    "default": "now",
                    placement: "top",
                    align: "left"
                }); // $('[name="create_user"]').change(function()
                // {
                //   if ($(this).is(':checked')) {
                //      // Do something...
                //      alert('You can rock now...');
                //   };
                // });
            }); // 3 decimal places

            $("#basic_salary, #housing_allowance, #transportation_allowance, #phone_allowance, #social_allowance, #other_allowance").blur(function () {
                this.value = parseFloat(this.value).toFixed(3);
            }); // Find total Allowance Function

            function TotalAllowance() {
                var basic_salary = parseFloat($("#basic_salary").val());
                var hosing_allow = parseFloat($("#housing_allowance").val());
                var trans_allow = parseFloat($("#transportation_allowance").val());
                var phone_allowance = parseFloat($("#phone_allowance").val());
                var social_allow = parseFloat($("#social_allowance").val());
                var other_allow = parseFloat($("#other_allowance").val());
                var total = basic_salary + hosing_allow + trans_allow + phone_allowance + social_allow + other_allow;

                if (!isNaN(total)) {
                    $("#tot_salary_allowance").val(total.toFixed(3));
                } else {
                    var alt = 0;
                    $("#tot_salary_allowance").val(alt.toFixed(3));
                }
            } // Set Emp GOSI


            function SetEmpGOSI() {
                var empGOSI = parseFloat($("#emp_gosi").val());
                var emp_basic_sal = parseFloat($("#basic_salary").val());
                empGOSI = emp_basic_sal * empGOSI / 100;

                if (!isNaN(empGOSI)) {
                    $("#total_deduction").val(empGOSI.toFixed(3));
                } else {
                    var alt = 0;
                    $("#total_deduction").val(alt.toFixed(3));
                }
            } // Set Emp Net Salary


            function NetSal() {
                var netSal = parseFloat($("#tot_salary_allowance").val()) - parseFloat($("#total_deduction").val());
                console.log(parseFloat($("#tot_salary_allowance").val()), parseFloat($("#total_deduction").val()));

                if (!isNaN(netSal)) {
                    $("#net_salary").val(netSal.toFixed(3));
                } else {
                    var alt = 0;
                    $("#net_salary").val(alt.toFixed(3));
                }
            } // Set Total Paid


            function TotalPaid() {
                var totalPaid = parseFloat($("#comp_gosi").val()) * 0.01 * parseFloat($("#basic_salary").val()) + parseFloat($("#basic_salary").val());

                if (!isNaN(totalPaid)) {
                    $("#total_paid").val(totalPaid.toFixed(3));
                } else {
                    var alt = 0;
                    $("#total_paid").val(alt.toFixed(3));
                }
            } // Set Total Paid for Bahrani


            function TotalPaidBH() {
                var totalPaidBH = parseFloat($("#emp_company_gosi").val()) * 0.01 * parseFloat($("#basic_salary").val()) + parseFloat($("#basic_salary").val()) + parseFloat($("#emp_lmar_month").val());

                if (!isNaN(totalPaidBH)) {
                    $("#emp_total_paid").val(totalPaidBH.toFixed(3));
                } else {
                    var alt = 0;
                    $("#emp_total_paid").val(alt.toFixed(3));
                }
            }

            /***/ }),

        /***/ 3:
        /*!********************************************************!*\
          !*** multi ./resources/js/Pages/Employees/Employee.js ***!
          \********************************************************/
        /*! no static exports found */
        /***/ (function(module, exports, __webpack_require__) {

            module.exports = __webpack_require__(/*! C:\xampp\htdocs\swerp\resources\js\Pages\Employees\Employee.js */"./resources/js/Pages/Employees/Employee.js");


            /***/ })

        /******/ });
