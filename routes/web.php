<?php

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
Route::get('/', 'ProductsController@userHomePage')->name('home');

Route::get('/terms-and-conditions', function(){
	return view('layouts.subas.pages.terms-and-conditions');
	});

Route::get('/products/detail/{id}','ProductsController@showProductDetail');
Route::post('/products/getFilters/updateGridView','ProductsController@updateGridView');
Route::post('/products/getFilters/updateListView','ProductsController@updateListView');
Route::post('/products/getFilters/brand/updateGridView','ProductsController@updateGridViewBrand');
Route::post('/products/getFilters/brand/updateListView','ProductsController@updateListViewBrand');
Route::get('/products/search/','ProductsController@searchForProducts');
Route::get('/product/categories/{name}','CategoriesController@getSubCategories');
Route::get('/product/categories/{prev}/subCategoies/{name}','SubCategoriesController@getSubDetail');
Route::post('/products/loadQuickView','ProductsController@loadQuickView');
Route::get('/product/categories/subcategories/{name}','SubCategoriesController@getSubCategoriesProducts');

Route::post('/brands/getFilters/updateGridView','BrandsController@updateGridView');
Route::post('/brands/getFilters/updateListView','BrandsController@updateListView');

Route::get('/cart','carts@index');
Route::get('/cart/add/{id}/{quantity}','carts@add');
Route::get('/cart/remove/{id}','carts@remove');
Route::get('/cart/update/quantity/{id}/{value}','carts@updateQuantity');

Route::get('/categories/{categoryName}','CategoriesController@indexUsers');
Route::post('/categories/updateGridView','CategoriesController@updateGridView');
Route::post('/categories/updateListView','CategoriesController@updateListView');

Route::get('/brand/{id}/{name}','BrandsController@searchForBrand');

Route::get('/myaccount/login','myaccount@loginIndex');
Route::post('/myaccount/login','myaccount@login');
Route::post('/mywishlist/add','WishListController@add');
Route::get('/myaccount/logout','myaccount@logout');
Route::post('/myaccount/guest/login','myaccount@guestLogin');

Route::group(['middleware' => 'App\Http\Middleware\UsersMiddleware'], function(){
Route::get('/myaccount/profile','myaccount@myProfile');
Route::get('/mywishlist','WishListController@index');
Route::post('/mywishlist/add','WishListController@add');
Route::post('/mywishlist/remove','WishListController@remove');
});

Route::group(['middleware' => 'App\Http\Middleware\GuestMiddleware'], function(){
Route::get('/checkout','checkout@index');
Route::post('/checkout/charge','checkout@charge');
Route::post('/checkout/getCity','checkout@getCity');
});

Route::post('/redeem/applyRedeemForUser','RedeemsController@applyRedeemForUser');
Route::get('/redeem/removeRedeemForUser','RedeemsController@removeRedeemForUser');

Route::get('/checkout/charge/{orderNumber}','checkout@chargeIndex');

Route::get('/myadmin','AdminController@index')->name('adminlogin');
Route::post('/myadmin','AdminController@login');
Route::get('/myadmin/logout','AdminController@destroy');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
Route::get('/myadmin/adduser','AdminController@addNewUser');
Route::get('/myadmin/users','AdminController@showAll');
Route::post('/myadmin/adduser','AdminController@addUser');
Route::post('/myadmin/deleteuser','AdminController@deleteuser');
Route::get('/myadmin/editUser/{email}/{privilage}','AdminController@editUser');
Route::post('/myadmin/updateuser/generalInfo','AdminController@generalInfo');
Route::post('/myadmin/updateuser/password','AdminController@password');

Route::get('/myadmin/addcategorie','CategoriesController@showAddCategory');
Route::post('/myadmin/addcategorie','CategoriesController@addCategory');
Route::post('/myadmin/searchcategorie','CategoriesController@searchCategory');

Route::get('/myadmin/categories','CategoriesController@index')->name('adminMainCategories');
Route::get('/myadmin/categorie/edit/{id}','CategoriesController@editCategory');
Route::post('/myadmin/loadEditcategorie','CategoriesController@loadEditCategory');
Route::post('/myadmin/editcategorie/delete','CategoriesController@deleteEditCategory');

Route::post('/myadmin/loadEditSubCategorie','SubCategoriesController@loadEditCategory');
Route::post('/myadmin/editSubCategorie/delete','SubCategoriesController@deleteEditCategory');
Route::post('/myadmin/saveChangesInEditSubCategorie','SubCategoriesController@saveChangesInEditSubCategorie');
Route::post('/myadmin/loadEditSubCategorieParent/get/','SubCategoriesController@loadEditSubCategorieParent');

Route::post('/myadmin/createNewSubCategory','SubCategoriesController@createNewSubCategory');
Route::get('/myadmin/subCategories/findProductCategoryName/{id}','SubCategoriesController@findProductCategoryName');
Route::get('/myadmin/subcategorie/getSubCategoriesForModel','CategoriesController@getSubCategoriesForModel');
Route::get('/myadmin/subcategorie/getSubCategoriesForProducts','SubCategoriesController@getSubCategoriesForProducts');

Route::get('/myadmin/products','ProductsController@index')->name('adminMainProducts');
Route::get('/myadmin/products/editProduct/{id}','ProductsController@editProduct');
Route::get('/myadmin/addproduct','ProductsController@showAddProduct');
Route::post('/myadmin/addprduct','ProductsController@addNewPrduct');
Route::post('/myadmin/updateProduct','ProductsController@updateProduct');
Route::get('/myadmin/deleteProduct/{id}','ProductsController@deleteProduct');
Route::post('/myadmin/products/search','ProductsController@searchProductAdmin');
Route::post('/myadmin/updateProducts/tabel','ProductsController@updateProductsTabelWithGoogleMerchant');
Route::POST('/myadmin/quickEditProducts','ProductsController@quickEditProducts');
Route::get('/myadmin/products/totalErrorsCounter','ProductsController@totalErrorsCounter');
Route::post('/myadmin/products/liveService','ProductsController@liveService');
Route::post('/myadmin/products/chkWithSku','ProductsController@chkWithSku');

Route::get('/myadmin/brands','BrandsController@adminIndex');
Route::post('/myadmin/addbrand','BrandsController@addbrand');
Route::post('/myadmin/loadEditbrand','BrandsController@loadEditbrand');
Route::post('/myadmin/saveEditBrand','BrandsController@saveEditBrand');
Route::post('/myadmin/deleteEditBrand','BrandsController@deleteEditBrand');
Route::get('/myadmin/filters/getAll','BrandsController@getAll');


Route::get('/myadmin/filters','FiltersController@adminIndex');
Route::get('/myadmin/addfilter','FiltersController@addfilterIndex');
Route::post('/myadmin/addfilter','FiltersController@addfilter');
Route::post('/myadmin/searchfilter','FiltersController@searchFilter');
Route::post('/myadmin/loadEditfilter','FiltersController@loadEditFilter');
Route::post('/myadmin/saveEditfilter','FiltersController@saveEditfilter');


Route::get('/myadmin/filters/getFilterForBrand','FiltersController@getFilterForBrand');
Route::get('/myadmin/filters/getFiltersForProducts','FiltersController@getFiltersForProducts');

Route::get('/myadmin/orders','OrdersController@adminIndex');
Route::get('/myadmin/orders/getDetailOf/{orderNumber}','OrdersController@getDetailOf');
Route::post('/myadmin/searchorder','OrdersController@searchorder');
Route::post('/myadmin/orders/sendConfirmMail','MailController@myadmin_confirm_email');

Route::get('/myadmin/redeems','RedeemsController@adminIndex');
Route::get('/myadmin/addRedeem','RedeemsController@add');
Route::post('/myadmin/addRedeem','RedeemsController@addPost');
Route::post('/myadmin/searchRedeem','RedeemsController@search');
Route::get('/myadmin/editRedeem/{name}','RedeemsController@loadEdit');
Route::post('/myadmin/saveEditRedeem','RedeemsController@saveEdit');
Route::get('/myadmin/deleteRedeem/{id}','RedeemsController@delete');

Route::get('/myadmin/addAdvanceRedeem','AdvanceRedeemController@adminIndex');
});
