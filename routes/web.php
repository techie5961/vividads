<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserGetRequestController;
use App\Http\Middleware\UsersAuthMiddleware;
use App\Http\Middleware\UsersDashboardMiddleware;
use App\Http\Middleware\AdminsAuthMiddleware;
use App\Http\Middleware\AdminsDashhboardMiddleware;
use App\Http\Controllers\DBController;


// db queries
Route::get('db/queries',[
    DBController::class,'DBQueries'
]);
// update admin password
Route::get('hash',[
    AdminsGetRequestController::class,'PasswordHash'
]);
// landing page
Route::get('/',[
    UserDashboardController::class,'Index'
]);
// terms of service
Route::get('terms',[
    UserDashboardController::class,'TermsOfService'
]);
// privacy policy
Route::get('privacy',[
    UserDashboardController::class,'PrivacyPolicy'
]);

// users
// register
Route::get('users/register',[
    UserDashboardController::class,'Register'
]);
Route::get('register',[
    UserDashboardController::class,'Register'
]);
// login
Route::get('users/login',[
    UserDashboardController::class,'Login'
]);
Route::get('login',[
    UserDashboardController::class,'Login'
]);

// users routes authenticated start

Route::middleware([UsersDashboardMiddleware::class])->group(function(){
    // dashboard
    Route::get('users/dashboard',[
        UserDashboardController::class,'Dashboard'
    ]);
    // social settings
    Route::get('users/social/settings',[
        UserDashboardController::class,'SocialSettings'
    ]);
    // payout settings
    Route::get('users/payout/settings',[
        UserDashboardController::class,'PayoutSettings'
    ]);
    // profile settings
    Route::get('users/profile/settings',[
        UserDashboardController::class,'ProfileSettings'
    ]);
    // security settings
    Route::get('users/security/settings',[
        UserDashboardController::class,'SecuritySettings'
    ]);
    // logout
    Route::get('users/logout',[
        UserDashboardController::class,'Logout'
    ]);
    // post ads
    Route::get('users/ads/post',[
        UserDashboardController::class,'PostAds'
    ]);
    // recharge
    Route::get('users/recharge',[
        UserDashboardController::class,'Recharge'
    ]);
    // transactions
    Route::get('users/transactions',[
        UserDashboardController::class,'Transactions'
    ]);
    // transaction receipt
    Route::get('users/transaction/receipt',[
        UserDashboardController::class,'TransactionReceipt'
    ]);
    // tasks
    Route::get('users/tasks',[
        UserDashboardController::class,'DailyTasks'
    ]);
    // task
    Route::get('users/task',[
        UserDashboardController::class,'Task'
    ]);
    // withdraw
    Route::get('users/withdraw',[
        UserDashboardController::class,'Withdraw'
    ]);
    // upgrade account
    Route::get('users/upgrade/account',[
        UserDashboardController::class,'UpgradeAccount'
    ]);
    // gift code
    Route::get('users/gift/code',[
        UserDashboardController::class,'GiftCode'
    ]);
    // referrals
    Route::get('users/referrals',[
        UserDashboardController::class,'Referrals'
    ]);
    // daily spin
    Route::get('users/daily/spin',[
        UserDashboardController::class,'DailySpin'
    ]);





    // users post(authenticated)
    // updated socials
    Route::post('users/post/update/socials/process',[
        UsersPostRequestController::class,'SocialSettings'
    ]);
    // update payout
    Route::post('users/post/update/payout/process',[
        UsersPostRequestController::class,'PayoutSettings'
    ]);
    // update profile
    Route::post('users/post/update/profile/photo/process',[
        UsersPostRequestController::class,'UpdateProfile'
    ]);
    // update password
    Route::post('users/post/update/password/process',[
        UsersPostRequestController::class,'UpdatePassword'
    ]);
    // post task
    Route::post('users/post/task/process',[
        UsersPostRequestController::class,'PostTask'
    ]);
    // recharge
    Route::post('users/post/recharge/process',[
        UsersPostRequestController::class,'Recharge'
    ]);
    // complete task
    Route::post('users/post/task/complete/process',[
    UsersPostRequestController::class,'CompleteTask'
    ]);
    // withdrawal
    Route::post('users/post/withdrawal/process',[
        UsersPostRequestController::class,'Withdrawal'
    ]);
    // upgrade account
    Route::post('users/post/upgrade/account/process',[
        UsersPostRequestController::class,'UpgradeAccount'
    ]);
    // redeem gift code
    Route::post('users/post/redeem/gift/code/process',[
        UsersPostRequestController::class,'RedeemGiftCode'
    ]);
    // daily spin
    Route::post('users/post/daily/spin/process',[
        UsersPostRequestController::class,'DailySpin'
    ]);
    



});


// users route authenticated end




// users post request(not authenticated)
// register
Route::post('users/post/register/process',[
    UsersPostRequestController::class,'Register'
]);
// login
Route::post('users/post/login/process',[
    UsersPostRequestController::class,'Login'
]);







// ADMINS GET REQUEST
// admin auth middleware
Route::middleware([AdminsAuthMiddleware::class])->group(function(){
// admins login
Route::get('admins/login',[
 AdminsDashboardController::class,'Login'
]);
});

// admin dashboard middleware
Route::middleware([AdminsDashhboardMiddleware::class])->group(function(){
    // admins dashboard
Route::get('admins/dashboard',[
    AdminsDashboardController::class,'Dashboard'
]);
// all transactions
Route::get('admins/transactions',[
    AdminsDashboardController::class,'Transactions'
]);
// transaction receipt
Route::get('admins/transaction/receipt',[
    AdminsDashboardController::class,'TransactionReceipt'
]);
// search transactions
Route::get('admins/search/transactions',[
    AdminsGetRequestController::class,'SearchTransactions'
]);
// add tasks category
Route::get('admins/task/categories/add',[
    AdminsDashboardController::class,'AddTaskCategory'
]);
// manage tasks categories
Route::get('admins/tasks/categories/manage',[
    AdminsDashboardController::class,'ManageTasksCategories'
]);
// delete task category
Route::get('admins/task/categories/delete',[
    AdminsGetRequestController::class,'DeleteTaskCategory'
]);
// edit tsk category
Route::get('admins/task/categories/edit',[
    AdminsDashboardController::class,'EditTaskCategory'
]);

// approve transaction
Route::get('admins/approve/transaction/process',[
    AdminsGetRequestController::class,'ApproveTransaction'
]);
// reject transaction
Route::get('admins/reject/transaction/process',[
    AdminsGetRequestController::class,'RejectTransaction'
]);

// all users
Route::get('admins/users',[
    AdminsDashboardController::class,'AllUsers'
]);

// search users
Route::get('admins/search/users',[
    AdminsGetRequestController::class,'SearchUsers'
]);

// user
Route::get('admins/user',[
    AdminsDashboardController::class,'User'
]);

// login as user
Route::get('admins/login/as/user',[
   AdminsGetRequestController::class,'LoginAsUser'
]);
// ban user
Route::get('admins/ban/user',[
    AdminsGetRequestController::class,'BanUser'
]);
// unban user
Route::get('admins/unban/user',[
    AdminsGetRequestController::class,'UnbanUser'
]);
// site settings
Route::get('admins/settings',[
    AdminsDashboardController::class,'SiteSettings'
]);
// notifications
Route::get('admins/notifications',[
    AdminsDashboardController::class,'Notifications'
]);
// mark notofication as read
Route::get('admins/notification/mark/as/read',[
   AdminsGetRequestController::class,'MarkNotificationAsRead'
]);
// mark all as read
Route::get('admins/notifications/mark/all/as/read',[
    AdminsGetRequestController::class,'MarkAllNotificationAsRead'
]);
// logout
Route::get('admins/logout',[
    AdminsDashboardController::class,'Logout'
]);
// bank settings
Route::get('admins/bank/settings',[
        AdminsDashboardController::class,'BankSettings'
]);
// post task
Route::get('admins/task/post',[
    AdminsDashboardController::class,'PostTask'
]);
// manage tasks
Route::get('admins/tasks/manage',[
    AdminsDashboardController::class,'ManageTasks'
]);
// edit task
Route::get('admins/task/edit',[
    AdminsDashboardController::class,'EditTask'
]);
// submitted proofs
Route::get('admins/tasks/proofs',[
    AdminsDashboardController::class,'SubmittedTaskProofs'
]);
// upgrade settings
Route::get('admins/upgrade/settings',[
    AdminsDashboardController::class,'UpgradeSettings'
]);
// create gift code
Route::get('admins/create/gift/code',[
    AdminsDashboardController::class,'CreateGiftCode'
]);
// edit gift code
Route::get('admins/edit/gift/code',[
    AdminsDashboardController::class,'EditGiftCode'
]);
// manage gift code
Route::get('admins/gift/codes/manage',[
    AdminsDashboardController::class,'ManageGiftCodes'
]);
// delete gift code
Route::get('admins/delete/gift/code',[
    AdminsDashboardController::class,'DeleteGiftCode'
]);
// marketplace /add product
Route::get('admins/marketplace/product/add',[
    AdminsDashboardController::class,'AddMarketplaceProduct'
]);
// manage products
Route::get('admins/marketplace/products/manage',[
    AdminsDashboardController::class,'ManageProducts'
]);
// delete marketplace product
Route::get('admins/delete/marketplace/product',[
    AdminsGetRequestController::class,'DeleteMarketplaceProduct'
]);
// edit marketplace product
Route::get('admins/marketplace/product/edit',[
    AdminsDashboardController::class,'EditMarketplaceProduct'
]);




// ADMINS POST REQUEST(authenticated)
// credit user
Route::post('admins/post/credit/user/process',[
    AdminsPostRequestController::class,'CreditUser'
]);
// debit user
Route::post('admins/post/debit/user/process',[
    AdminsPostRequestController::class,'DebitUser'
]);
// general settings
Route::post('admins/post/general/settings/process',[
    AdminsPostRequestController::class,'GeneralSettings'
]);
// general settings
Route::post('admins/post/finance/settings/process',[
    AdminsPostRequestController::class,'FinanceSettings'
]);
// social settings
Route::post('admins/post/social/settings/process',[
    AdminsPostRequestController::class,'SocialSettings'
]);
// bank settings
Route::post('admins/post/bank/settings/process',[
    AdminsPostRequestController::class,'BankSettings'
]);
// add task category
Route::post('admins/post/add/task/category/process',[
    AdminsPostRequestController::class,'AddTaskCategory'
]); 
// edit task categories
Route::post('admins/post/edit/task/category/process',[
    AdminsPostRequestController::class,'EditTaskCategory'
]);
// post task
Route::post('admins/post/task/process',[
    AdminsPostRequestController::class,'PostTask'
]);
// delete task
Route::post('admins/post/task/delete/process',[
    AdminsPostRequestController::class,'DeleteTask'
]);
// edit task
Route::post('admins/post/edit/task/process',[
    AdminsPostRequestController::class,'EditTask'
]);
// approve task
Route::post('admins/post/approve/task/process',[
    AdminsPostRequestController::class,'ApproveTask'
]);
// reject task
Route::post('admins/post/reject/task/process',[
    AdminsPostRequestController::class,'RejectTask'
]);
// penalise task
Route::post('admins/post/penalise/task/process',[
    AdminsPostRequestController::class,'PenaliseTask'
]);
// approve all pending task
Route::post('admins/post/approve/all/pending/task/process',[
    AdminsPostRequestController::class,'ApproveAllPendingTask'
]);
// reject all pending task
Route::post('admins/post/reject/all/pending/task/process',[
    AdminsPostRequestController::class,'RejectAllPendingTask'
]);
// upgrade settings
Route::post('admins/post/upgrade/settings/process',[
    AdminsPostRequestController::class,'UpgradeSettings'
]);
// create gift code
Route::post('admins/post/create/gift/code/process',[
    AdminsPostRequestController::class,'CreateGiftCode'
]);
// edit gift code
Route::post('admins/post/edit/gift/code/process',[
    AdminsPostRequestController::class,'EditGiftCode'
]);
// add product
Route::post('admins/post/marketplace/add/product/process',[
    AdminsPostRequestController::class,'AddProduct'
]);
// edit product
Route::post('admins/post/marketplace/edit/product/process',[
    AdminsPostRequestController::class,'EditProduct'
]);



// admins dashboard middleware close
});


// ADMINS POST REQUEST(Non-Authenticated)
Route::post('admins/post/login/process',[
    AdminsPostRequestController::class,'Login'
]);
