<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\OurMemberController as member;
use App\Http\Controllers\MembershipTypeController as memberType;

use App\Http\Controllers\Accounts\MasterAccountController as master;
use App\Http\Controllers\Accounts\SubHeadController as sub_head;
use App\Http\Controllers\Accounts\ChildOneController as child_one;
use App\Http\Controllers\Accounts\ChildTwoController as child_two;
use App\Http\Controllers\Accounts\NavigationHeadViewController as navigate;
use App\Http\Controllers\Accounts\IncomeStatementController as statement;
/*CRM*/
use App\Http\Controllers\CRM\MemberFeeCategoryController as fees_category;
use App\Http\Controllers\CRM\MemberInvoiceController as member_invoice;
use App\Http\Controllers\MembershipPendingController as mPending;

use App\Http\Controllers\Vouchers\VoucherController as vouchers;
use App\Http\Controllers\Vouchers\CreditVoucherController as credit;
use App\Http\Controllers\Vouchers\DebitVoucherController as debit;
use App\Http\Controllers\Vouchers\JournalVoucherController as journal;
use App\Http\Controllers\Vouchers\MemberVoucherController as memvervoucher;
use App\Http\Controllers\Vouchers\OnlinePaymentController as onlinepayment;

/* Middleware */
use App\Http\Middleware\isAdmin;

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

Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);
        Route::resource('member',member::class,['as'=>'admin']);
        Route::get('/customer-view', [member::class, 'customerView'])->name('admin.customerView');
        Route::get('/customer-edit{id}', [member::class, 'editView'])->name('admin.customerEditView');
        Route::resource('memberType',memberType::class,['as'=>'admin']);

        //Accounts
        Route::resource('master',master::class,['as'=>'admin']);
        Route::resource('sub_head',sub_head::class,['as'=>'admin']);
        Route::resource('child_one',child_one::class,['as'=>'admin']);
        Route::resource('child_two',child_two::class,['as'=>'admin']);
        Route::resource('navigate',navigate::class,['as'=>'admin']);
        
        Route::get('onlinepayment',[onlinepayment::class,'index'])->name('admin.onlinepayment');
        Route::get('onlinepayment/accepted',[onlinepayment::class,'accepted'])->name('admin.onlinepayment.accepted');
        Route::get('onlinepayment/update_status/{id}/{status}',[onlinepayment::class,'update_status'])->name('admin.onlinepayment.update_status');
        
        Route::resource('fees_category',fees_category::class,['as'=>'admin']);
        Route::resource('member-invoice',member_invoice::class,['as'=>'admin']);
        Route::get('/get-member', [member_invoice::class, 'getMember'])->name('admin.getMember');
        Route::resource('mPending',mPending::class,['as'=>'admin']);
        Route::get('/get-member-fee', [mPending::class, 'get_member_fee'])->name('admin.getMemberFee');
        Route::get('/get-member-pay', [mPending::class, 'get_members'])->name('admin.get_member_pay');

        Route::get('incomeStatement',[statement::class,'index'])->name('admin.incomeStatement');
        Route::get('incomeStatement_details',[statement::class,'details'])->name('admin.incomeStatement.details');

        //Voucher
        Route::resource('credit_voucher',credit::class,['as'=>'admin']);
        Route::resource('debit_voucher',debit::class,['as'=>'admin']);
        Route::resource('journal_voucher',journal::class,['as'=>'admin']);
        Route::resource('member_voucher',memvervoucher::class);
        Route::get('get_head', [vouchers::class, 'get_head'])->name('get_head');

    });
});


