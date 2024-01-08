<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfessionalSkillsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
//    return view('welcome');
});
//Auth::routes(['verify' => true]);

Route::get('clear_cache', function () {

    Artisan::call('optimize:clear');
    return redirect()->back()->with("success", "Cache is cleared");


});

Route::get('config_clear', function () {

    Artisan::call('config:clear');
    return redirect()->back()->with("success", "Config is cleared");

});


//Route::get('qr-code-g', function () {
//
//    \SimpleSoftwareIO\QrCode\Facades\QrCode::size(500)
//        ->format('png')
//        ->generate('192.168.1.11/role-permissions-blog/public/login', asset('images/qrcode.png'));
//
//    return view('qrCode');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('test-mail', [App\Http\Controllers\HomeController::class, 'mail'])->name('test-mail');
Route::get('verify_email', [App\Http\Controllers\HomeController::class, 'verify_email'])->name('verify-email');

//Route::get('send-mail', [App\Http\Controllers\HomeController::class, 'send_mail'])->name('send-mail');

//New Route Clear
Route::get('register_page', [App\Http\Controllers\UserController::class, 'register_page'])->name('register-page');
Route::get('index', [App\Http\Controllers\UserController::class, 'index_page'])->name('index-page');
Route::get('/api/check-email', [App\Http\Controllers\API\EmailController::class, 'checkEmail'])->name('check-email');
Route::get('test_register_page', [App\Http\Controllers\UserController::class, 'test_register_page'])->name('test-register-page');

//New Route
Route::get('table_index', [App\Http\Controllers\UserController::class, 'table_index'])->name('table-index');


Route::get('question_table', [App\Http\Controllers\UserController::class, 'question_table'])->name('question-table');
Route::get('question_create', [App\Http\Controllers\UserController::class, 'question_create'])->name('question-create');
Route::get('evaluation_criteria', [App\Http\Controllers\UserController::class, 'evaluation_criteria'])->name('evaluation-criteria');
Route::get('evaluation_criteria_create', [App\Http\Controllers\UserController::class, 'evaluation_criteria_create'])->name('evaluation-criteria-create');
Route::get('additional_evaluation_criteria', [App\Http\Controllers\UserController::class, 'additional_evaluation_criteria'])->name('additional-evaluation-criteria');
Route::get('additional_evaluation_criteria_create', [App\Http\Controllers\UserController::class, 'additional_evaluation_criteria_create'])->name('additional-evaluation-criteria-create');


Route::get('campaign-ideas-index', [App\Http\Controllers\UserController::class, 'campaign_ideas_index'])->name('campaign-ideas-index');
Route::get('sub-campaign-ideas-index', [App\Http\Controllers\UserController::class, 'sub_campaign_ideas_index'])->name('sub_campaign-ideas-index');
Route::get('test_question_create', [App\Http\Controllers\UserController::class, 'test_question_create'])->name('test-question-create');
Route::get('answer_register_page', [App\Http\Controllers\UserController::class, 'answer_register_page'])->name('answer-register-page');


//New Route create
//Campaign Idea
Route::get('campaign-index', [App\Http\Controllers\UserController::class, 'campaign_index'])->name('campaign-index');
Route::get('campaign-tab', [App\Http\Controllers\UserController::class, 'campaign_tab'])->name('campaign-tab');
Route::post('add-campaign-ideas', [App\Http\Controllers\UserController::class, 'add_campaign_ideas'])->name('add-campaign-ideas');
Route::get('campaign_idea_edit/{id}', [App\Http\Controllers\UserController::class, 'campaign_idea_edit'])->name('campaign-idea-edit');
Route::post('campaign_idea_update/{id}', [App\Http\Controllers\UserController::class, 'campaign_idea_update'])->name('campaign-idea-update');
Route::get('campaign_idea_delete/{id}', [App\Http\Controllers\UserController::class, 'campaign_idea_delete'])->name('campaign-idea-delete');

//Campaign Question
Route::get('question_form', [App\Http\Controllers\UserController::class, 'question_form'])->name('question-form');
Route::post('add_question_form', [App\Http\Controllers\UserController::class, 'add_question_form'])->name('add-question-form');
Route::get('campaign_question_table', [App\Http\Controllers\UserController::class, 'campaign_question_table'])->name('campaign-question-table');
Route::get('campaign_question_edit/{id}', [App\Http\Controllers\UserController::class, 'campaign_question_edit'])->name('campaign-question-edit');
Route::post('campaign_question_update/{id}', [App\Http\Controllers\UserController::class, 'campaign_question_update'])->name('campaign-question-update');
Route::get('campaign_question_delete/{id}', [App\Http\Controllers\UserController::class, 'campaign_question_delete'])->name('campaign-question-delete');


Route::group(['middleware' => ['auth']], function () {
    //Resource Route
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('permission', PermissionController::class);

    Route::resource('resumes', ResumeController::class);
    Route::resource('professional_skills', ProfessionalSkillsController::class);
    Route::resource('work_experiences', WorkExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('course', CourseController::class);
    Route::resource('payment', PaymentController::class);

    //Profile Update Code
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile_update', [App\Http\Controllers\UserController::class, 'profile_update'])->name('profile-update');
    Route::post('/change_password', [App\Http\Controllers\UserController::class, 'change_password'])->name('change-password');


    //Backup Download
    Route::get('/backup_run', [App\Http\Controllers\UserController::class, 'backup_run'])->name('backup-run');
    Route::get('/backup_download', [App\Http\Controllers\UserController::class, 'backup_download'])->name('backup-download');

    //    Status Route Define
    Route::get('/userStatus', [App\Http\Controllers\UserController::class, 'userStatus'])->name('userStatus');
    Route::get('/professional_skillsStatus', [App\Http\Controllers\ProfessionalSkillsController::class, 'professional_skillsStatus'])->name('professional_skillsStatus');
    Route::get('/work_experiencesStatus', [App\Http\Controllers\WorkExperienceController::class, 'work_experiencesStatus'])->name('work_experiencesStatus');
    Route::get('/educationsStatus', [App\Http\Controllers\EducationController::class, 'educationsStatus'])->name('educationsStatus');
    Route::get('/projectsStatus', [App\Http\Controllers\ProjectController::class, 'projectsStatus'])->name('projectsStatus');
    Route::get('/courseStatus', [App\Http\Controllers\CourseController::class, 'courseStatus'])->name('courseStatus');
    Route::get('/preview_resume', [App\Http\Controllers\ResumeController::class, 'preview_resume'])->name('preview_resume');

    Route::get('/download-pdf', [App\Http\Controllers\ResumeController::class, 'downloadPDF'])->name('download-pdf');
    Route::get('/resume-details', [App\Http\Controllers\ResumeController::class, 'resume_details'])->name('resume-details');
    Route::get('/resume-demo', [App\Http\Controllers\ResumeController::class, 'resume_demo'])->name('resume-demo');
    Route::get('/resume-test', [App\Http\Controllers\ResumeController::class, 'resume_test'])->name('resume-test');
    Route::post('/updateProfilePicture', [App\Http\Controllers\UserController::class, 'updateProfilePicture'])->name('updateProfilePicture');

    Route::get('send-mail', [App\Http\Controllers\UserController::class, 'send_mail'])->name('send-mail');
    Route::post('update-row-order', [App\Http\Controllers\ProductController::class, 'updateColumnOrder'])->name('update-row-order');

//Payment
    Route::get('razorpay-payment', [App\Http\Controllers\RazorpayPaymentController::class, 'index'])->name('razorpay-payment');
    Route::post('razorpay-payment-store', [App\Http\Controllers\RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
    Route::get('/online_pay', [App\Http\Controllers\PaymentController::class, 'online_pay'])->name('online-pay');
    Route::get('/refund_payment', [App\Http\Controllers\PaymentController::class, 'refundPayment'])->name('refund-payment');
    Route::get('/history_payment', [App\Http\Controllers\PaymentController::class, 'payment_history'])->name('payment-history');
    Route::get('/payment_history_delete', [App\Http\Controllers\PaymentController::class, 'payment_history_delete'])->name('payment-history-delete');
    Route::get('/refund_payment_history', [App\Http\Controllers\PaymentController::class, 'refund_payment_history'])->name('refund-payment-history');
    Route::get('/refund_payment_history_delete', [App\Http\Controllers\PaymentController::class, 'refund_payment_history_delete'])->name('refund-payment-history-delete');

//Payment Pdf
    Route::get('/payment_pdf', [App\Http\Controllers\PaymentController::class, 'payment_pdf'])->name('payment-pdf');
    Route::get('/payment_history_pdf', [App\Http\Controllers\PaymentController::class, 'payment_history_pdf'])->name('payment-history-pdf');
    Route::get('/refund_payment_history_pdf', [App\Http\Controllers\PaymentController::class, 'refund_payment_history_pdf'])->name('refund-payment-history-pdf');

    Route::get('/toggle-theme', [App\Http\Controllers\PaymentController::class, 'toggleTheme'])->name('toggle-theme');
    Route::post('/change-theme', [App\Http\Controllers\PaymentController::class, 'change_theme'])->name('change-theme');

    //User Chat
    Route::get('/users-chat', [App\Http\Controllers\UserChatController::class, 'user_chat'])->name('user-chat');
    Route::post('/users/user-chat-send/', [App\Http\Controllers\UserChatController::class, 'user_chat_send'])->name('user-chat-send');

    Route::get('/users-chat-demo', [App\Http\Controllers\UserChatController::class, 'user_chat_demo'])->name('user-chat-demo');

    Route::get('/image-resize', [App\Http\Controllers\UserChatController::class, 'image_resize'])->name('image-resize');
    Route::post('/image-resize-store', [App\Http\Controllers\UserChatController::class, 'image_resize_store'])->name('image-resize-store');
    Route::get('/image-resize-delete/{id}', [App\Http\Controllers\UserChatController::class, 'image_resize_delete'])->name('image-resize-delete');


    //Test demo design route
    Route::get('/users-chat-test', [App\Http\Controllers\UserChatController::class, 'users_chat_test'])->name('users-chat-test');


    //Open Camera
    Route::get('/webcam', [App\Http\Controllers\WebcamController::class, 'index']);
    Route::post('/save-image', [App\Http\Controllers\WebcamController::class, 'store'])->name('webcam.capture');

});
Route::get('/reload-captcha', [App\Http\Controllers\UserController::class, 'reloadCaptcha'])->name('reload-captcha');


