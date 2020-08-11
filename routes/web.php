<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','PagesController@index')->name('index');

// Emplyee Route here.......... 
Route::get('/addemplyee','EmplyeeController@index')->name('addemplyee');
Route::post('/saveaddemplyee','EmplyeeController@store');
Route::get('/allemplyee','EmplyeeController@allemplyee')->name('allemplyee');
Route::get('/unactive/{emplyee_id}','EmplyeeController@unactive');
Route::get('/active/{emplyee_id}','EmplyeeController@active');
Route::get('/delete/{emplyee_id}','EmplyeeController@delete');
Route::get('/edit/{emplyee_id}','EmplyeeController@edit');
Route::post('/updateemplyee/{emplyee_id}','EmplyeeController@updateemplyee');
Route::get('/view/{emplyee_id}','EmplyeeController@view');
Route::get('/cancle','EmplyeeController@cancle');

//Customer route here
Route::get('/addcustomer','CustomerController@index')->name('addcustomer');
Route::post('/saveaddcustomer','CustomerController@savecustomer');
Route::get('/allcustomer','CustomerController@view_customer')->name('addcustomer');
Route::get('/uunactive/{customer_id}','CustomerController@uunactive');
Route::get('/aactive/{customer_id}','CustomerController@aactive');
Route::get('/ddelete/{customer_id}','CustomerController@ddelete');
Route::get('/eedit/{customer_id}','CustomerController@eedit');
Route::post('/updatecustomer/{customer_id}','CustomerController@updatecustomer');
Route::get('/vview/{customer_id}','CustomerController@vview');
Route::get('/ccancle','CustomerController@ccancle');

//Supplier route here ...........

Route::get('/addsupplier','SupplierController@index')->name('addsupplier');
Route::post('/saveaddsupplier','SupplierController@saveaddsupplier');
Route::get('/allsupplier','SupplierController@supplierstor')->name('allsupplier');
Route::get('/unactive_supplier/{supplier_id}','SupplierController@unactive_supplier');
Route::get('/active_supplier/{supplier_id}','SupplierController@active_supplier');
Route::get('/delete_supplier/{supplier_id}','SupplierController@delete_supplier');
Route::get('/view_supplier/{supplier_id}','SupplierController@view_supplier');
Route::get('/cancle_sup','SupplierController@m');
Route::get('/edit_supplier/{supplier_id}','SupplierController@edit_supplier');
Route::post('/update_supplier/{supplier_id}','SupplierController@update_supplier');

//Salary route here
Route::get('/addsalary','SalaryController@Add_Salary')->name('addsalary');
Route::post('/insert_advance_salary','SalaryController@insert_advance_salary');
Route::get('/all_advance_salary_show','SalaryController@advance_salary_show')->name('all_advance_salary_show');
Route::get('/paysalary','SalaryController@Add_paysalary')->name('paysalary');
Route::post('/add_paysalary','SalaryController@add_paysalary');
//Some work are panding 

// Category controller here
Route::get('/addcategory','CategoryController@index')->name('addcategory');
Route::post('/saveadd_category','CategoryController@add_category');
Route::get('/allcategory','CategoryController@show_category')->name('allcategory');
Route::get('/deletecategory/{category_id}','CategoryController@deletecategory');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');

//Product route here
Route::get('/add_product','ProductController@index')->name('addproduct');
Route::post('/saveaddproduct','ProductController@add_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
Route::get('/edit_product/{product_id}','ProductController@edit_product');
Route::post('/update_product/{product_id}','ProductController@updateproduct');
Route::get('/view_product/{product_id}','ProductController@viewproduct');
Route::get('/pcancle','ProductController@pcancle');
       
       //import and export route here by poductcontroller
       Route::get('/import_product','ProductController@importproduct')->name('import_product');
       Route::get('/export','ProductController@export')->name('export');
       Route::post('/import','ProductController@import')->name('import');

// add_expences route here

Route::get('/add_expences','ExpencesController@index')->name('addexpences');
Route::post('/saveaddexpences','ExpencesController@saveaddexpences');
Route::get('/all_expences','ExpencesController@show_expences')->name('allexpences');
Route::get('/deleteexpences','ExpencesController@dxp');
Route::get('/today_expences','ExpencesController@todayexpences');
Route::get('/edit_expences/{expences_id}', 'ExpencesController@edittoday');
Route::post('/updateexpences/{expences_id}','ExpencesController@updateexpences');
Route::get('/monthexpences','ExpencesController@monthly_ex_show');
Route::get('/year_expences','ExpencesController@yearly_ex_show');

       //montly route here
       Route::get('/January','ExpencesController@January');
       Route::get('/February','ExpencesController@February');
       Route::get('/March','ExpencesController@March');
       Route::get('/April','ExpencesController@April');
       Route::get('/May','ExpencesController@May');
       Route::get('/June','ExpencesController@June');
       Route::get('/July','ExpencesController@July');
       Route::get('/August','ExpencesController@August');
       Route::get('/September','ExpencesController@September');
       Route::get('/October','ExpencesController@October');
       Route::get('/November','ExpencesController@November');
       Route::get('/December','ExpencesController@December');

// take_attendance route here
Route::get('/take_attendance','AttendanceController@takeattendance')->name('takeattendance');
Route::post('/save_attendance','AttendanceController@saveattendance');
Route::get('/all_attendance','AttendanceController@allattendance')->name('allattendance');
Route::get('/edit_attendance/{edit_attandence}','AttendanceController@editattendance');
Route::post('/updateattendance','AttendanceController@Updateattendance'); //this route not properly work
Route::get('/view_attendance/{edit_attandence}','AttendanceController@viewattendance');


// Setting route here
Route::get('/add_Setting','SettingController@setting');
Route::post('/updatesetting/{setting_id}','SettingController@update_setting');

//Pos Route here.....

Route::get('/pos','PosController@index')->name('pos');
       //Order Route here
       Route::get('/panding_order','PosController@PandingOrder');
       Route::get('/view_order_status/{orderdetails_id}','PosController@vieworderstatus');
       Route::get('/order_approved/{orderdetails_id}','PosController@OrderApproved');
       Route::get('/success_order','PosController@SuccessOrder');
       Route::get('/delete_approved/{orderdetails_id}','PosController@DeleteApproved');
       

// Cart Route here
Route::post('/add_cart','CartController@index');
Route::post('/cart_update/{rowId}','CartController@CartUpdate'); //this update function not work 
Route::get('/cart_remove/{id}','CartController@Cartremove');
Route::post('/create_invoice','CartController@createinvoice');
Route::post('/final_invoice','CartController@PaymentInvoice');






