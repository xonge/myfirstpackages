<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
////    Redirect::route()
//});
Route::get('fenxiao', 'Xonge\Fenxiao\FenXiaoController@index');

Route::get('/', 'GoController@go');

Route::group(['prefix' => 'api' , 'namespace' => 'Api'] , function(){
	Route::get('/product' , 'ProductController@getGoodsList');
	Route::post('/product/add' , 'ProductController@addProduct');
//	Route::resource('/product' , 'ProductController');
    Route::get('/product/info/{id}' , 'ProductController@show');
    Route::get('/company/list' , 'CompanyController@index');
    Route::get('/company/info/{id}' , 'CompanyController@show');
    Route::get('/article/list' , 'ArticleController@index');

    //用户登录接口
    Route::resource('/login', 'LoginController');
    //用户退出接口
    Route::get('/logout', 'LoginController@logout');
    //用户注册
    Route::resource('/register', 'RegisterController');
//    hhh
//价格趋势
    Route::resource('/price', 'PriceController');
//关于我们
    Route::resource('/guanyu', 'GuanyuController');

//文章接口
    Route::resource('/article', 'ArticleController');

    Route::get('/qa/{id}', 'QaController@show');
//提问接口
    Route::get('/qa', 'QaController@myqa');
    Route::post('/qa', 'QaController@store');
    Route::resource('/answers', 'QaController@answers');
//公司列表接口
    Route::resource('/company', 'CompanyController');
//    公司产品列表
    Route::get('/companyproducts', 'CompanyController@products');
//    获得我的公司信息
    Route::get('/getmycompany', 'CompanyController@getCompanyByUser');
//    修改我的公司信息
    Route::post('/updatemycompany', 'CompanyController@updateMyCompany');

//询价接口
    Route::resource('/inquiry', 'InquiryController');
//我的操作
//我发布的产品
    Route::get('/myproduct', 'ProductController@myProduct');
//我发布的询价
    Route::get('/myinquiry', 'InquiryController@myInquiry');
//我的资讯列表
    Route::get('/myarticle', 'ArticleController@myArticle');
//    我的账户信息
//    Route::get('/myinfo', 'UserController');
    //图片上传
    Route::post('/upload_img', 'UploadController@imgUpload');
    Route::post('/myimages', 'UploadController@upload');
    Route::post('/updateimages', 'UploadController@updateImages');
    Route::get('/myimages', 'UploadController@getMyImages');
    Route::get('/imagecategory', 'UploadController@getAllCategory');
    Route::post('/imagecategory', 'UploadController@addCategory');
    Route::post('/deletemyimages', 'UploadController@deleteImage');

    //数据展示
    Route::resource('category.zhanshi', 'CategoryZhanshiController');
    Route::get('allcategorys', 'CategoryZhanshiController@allcategorys');
    Route::get('alllocations', 'CategoryZhanshiController@alllocations');
    Route::get('allxtimes', 'CategoryZhanshiController@allxtimes');
//    验证是否拥有访问数据展示的权限
    Route::get('isauth', 'CategoryZhanshiController@isAuth');
//    修改密码
    Route::post('changepwd', 'RegisterController@changepwd');
    Route::get('wxshare/{id}', 'ArticleController@wxshare');
});


Route::resource('photo', 'PhotoController');
Route::resource('product', 'ProductController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::get('profile', ['middleware' => 'auth', function() {
//    // Only authenticated users may enter...
//}]);

//Route::get('profile', [
//    'middleware' => 'auth',
//    'uses' => 'ProfileController@index'
//]);

Route::resource('profile', 'ProfileController');
Route::resource('login', 'LoginController');
Route::get('logout', 'LoginController@logout');
Route::resource('register', 'RegisterController');

//信息管理
Route::resource('infomanager', 'InfomationManagerController');
Route::resource('article', 'ArticleController');

//图片上传
Route::post('upload_img','UploadController@imgUpload');



Route::get('search', 'MemberController@search');

//后台
Route::group(['prefix' => 'admin' , 'namespace' => 'Admin', 'middleware' => 'shit'] , function() {
    //后台文章列表
    Route::resource('articlelist', 'ArticleListController');
    Route::resource('category.article', 'CategoryArticleController');
    Route::get('articlesearch', 'CategoryArticleController@search');
    //文章搜索
    Route::get('/article/search/{title}', 'CategoryArticleController@search');

    //交易管理
    Route::resource('category.transaction', 'CategoryTransactionController');
    //询价管理
    Route::resource('category.orders', 'CategoryOrdersController');
    //展示数据
    Route::resource('category.zhanshi', 'CategoryZhanshiController');
    //关于我们
    Route::resource('guanyu', 'GuanyuController');
    Route::resource('demand', 'DemandController');
//    专家诊断
    Route::resource('status.qa', 'StatusQaController');
    Route::get('qasearch', 'StatusQaController@search');

    //权限管理
    Route::get('/usermanager', 'GroupController@usermanager');
    Route::get('/groupmanager', 'GroupController@groupmanager');
    //权限组管理
    Route::resource('/group', 'GroupController');
    //管理员管理
    Route::resource('/user', 'UserController');
    //会员管理
    Route::resource('member', 'MemberController');
    Route::get('tongji', 'MemberController@tongji');
    Route::get('membersearch', 'MemberController@search');
    Route::post('memberpass', 'MemberController@pass');
    Route::get('transactiontongji', 'CategoryTransactionController@tongji');
    Route::get('transactionjiagetongji', 'CategoryTransactionController@jiagetongji');
    Route::get('transactionjiaoyitongji', 'CategoryTransactionController@jiaoyitongji');
    Route::resource('wxshare', 'WxShareController');
});

Route::get('/error', 'PublicController@storeError');
Route::resource('/av', 'AvController');
Route::post('/testlogin', 'AvController@testLogin');
//    用户审核
//Route::post('/admin/memberpass', 'MemberController@pass');
