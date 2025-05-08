<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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

Route::get('/clear-compiled', function () {
    Artisan::call('clear-compiled');
});
Route::get('/clear1', function () {
    Artisan::call('config:clear');
});
Route::get('/clear2', function () {
    Artisan::call('cache:clear');
});
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    echo '<script>alert("All Cache & Clear Success")</script>';
});
Route::get('/clear-optimize', function () {
    Artisan::call('optimize:clear');
    echo '<script>alert("Clear Success")</script>';
});
Route::get('login','App\Http\Controllers\AuthenticatedSessionController@create')->name('login');
Route::get('tutor-redirect/{key}','App\Http\Controllers\PaymentController@tutorLoginRedirect')->name('tutor-redirect');
Route::get('parent-redirect/{key}','App\Http\Controllers\PaymentController@parentLoginRedirect')->name('parent-redirect');
Route::get('stripe-payment/{id}','App\Http\Controllers\PaymentController@stripePayment')->name('stripe-payment');
Route::post('redirectPayment','App\Http\Controllers\PaymentController@redirectPayment')->name('redirectPayment');
Route::get('paypal-payment/{id}','App\Http\Controllers\PaymentController@paypalPayment')->name('paypal-payment');
Route::post('/ipn','App\Http\Controllers\PaymentController@ipn')->name('ipn');
Route::post('/payment_script_status', 'App\Http\Controllers\PaymentController@payment_script_status')->name('payment_script_status');
Route::post('create-payment-session','App\Http\Controllers\PaymentController@createPaymentSession')->name('create-payment-session');
Route::get('payment-success/{paymentId}','App\Http\Controllers\PaymentController@paymentSuccess')->name('paymentSuccess');
Route::get('payment-failed/{paymentId}','App\Http\Controllers\PaymentController@paymentFailed')->name('paymentFailed');

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function ($admins) {
    Route::post('verify-login', 'LoginController@verifyLogin')->name('verify-login');
    Route::get('check-email-admin', "LoginController@checkEmail")->name('check-email-admin');
    Route::post('forgot-password-admin-verify', "ForgotPasswordController@forgotPasswordAdminVerify")->name('forgot-password-admin-verify');
    Route::get('admin-reset-password/{id}', 'ResetPasswordController@ResetPassword')->name('admin-reset-password');
    Route::post('update-admin-password/{id}', 'ResetPasswordController@UpdatePasswordAdmin')->name('update-admin-password');
    $admins->middleware(['auth:super_admin', 'verified'])->group(function ($backendVerified) {
        $backendVerified->get('logout-super-admin', 'LoginController@logout')->name('super-admin-logout');
        $backendVerified->get('admin','DashboardController@index')->name('admin-dashboard');
        $backendVerified->get('profile', "ProfileController@profile")->name('profile');
        $backendVerified->post('profile-update', "ProfileController@updateProfile")->name('profile-update');
        $backendVerified->post('check-current-password', "ProfileController@checkCurrentPassword")->name('check-current-password');
        $backendVerified->post('change-password-update', "ProfileController@PasswordUpdate")->name('change-password-update');
        $backendVerified->resource('subject-master', "SubjectController");
        $backendVerified->get('subject-master-ajax-list', "SubjectController@ajaxList");
        $backendVerified->get('subject-unique', "SubjectController@subjectUnique")->name('subject-unique');
        $backendVerified->get('edit-subject-unique', "SubjectController@editSubjectUnique")->name('edit-subject-unique');
        $backendVerified->resource('sub-subject-master', "SubSubjectController");
        $backendVerified->get('sub-subject-master-ajax-list', "SubSubjectController@ajaxList");
        $backendVerified->resource('tutor-level', "TutorLevelController");
        $backendVerified->get('tutor-level-ajax', "TutorLevelController@ajaxList")->name('tutor-level-ajax');
        $backendVerified->delete('tutor-level/{id}', "TutorLevelController@destroy");
        $backendVerified->get('tutor-master-ajax', "TutorMasterController@ajaxList")->name('tutor-master-ajax');
        $backendVerified->get('tutor-add', "TutorMasterController@tutorAdd")->name('tutor-add');
        $backendVerified->post('save-tutor', "TutorMasterController@saveTutor")->name('save-tutor');
        $backendVerified->resource('tutor-master', "TutorMasterController");
        $backendVerified->delete('tutor-delete/{id}', "TutorMasterController@destroy");
        $backendVerified->post('tutor-activate', "TutorMasterController@activateUser");
        $backendVerified->post('tutor-deactivate/{id}', "TutorMasterController@deactivateUser");
        $backendVerified->get('tutor-university', "TutorMasterController@getUniversityDetails")->name('tutor-university');
        $backendVerified->get('tutor-subject', "TutorMasterController@getSubjectDetails")->name('tutor-subject');
        $backendVerified->get('tutor-level-ist', "TutorMasterController@getLevelDetails")->name('tutor-level-list');
        $backendVerified->get('get-count', "TutorMasterController@getCount")->name('get-count');
        $backendVerified->get('offline-bookings', "OfflineBookingController@index")->name('offline-bookings');
        $backendVerified->get('offline-bookings-ajax', "OfflineBookingController@ajaxList")->name('offline-bookings-ajax');
        $backendVerified->post('admin-offline-booking-update', 'OfflineBookingController@updateOfflineBooking')->name('admin-offline-booking-update');
        $backendVerified->get('offline-booking-edit/{id}', "OfflineBookingController@editOfflineBooking")->name('offline-booking-edit');
        $backendVerified->post('offline-booking-delete/{id}', "OfflineBookingController@deleteOfflineBooking")->name('offline-booking-edit');
        $backendVerified->get('tutor-other-list', "TutorMasterController@getOtherDetails")->name('tutor-other-list');
        $backendVerified->get('tutor-student-list', "TutorMasterController@getStudentDetails")->name('tutor-student-list');
        $backendVerified->get('changestatus', "TutorMasterController@changeStatus")->name('changestatus');
        $backendVerified->post('add-hourly-rate', "TutorMasterController@addHourlyRate")->name('add-hourly-rate');
        $backendVerified->get('center-timetable', "TutorMasterController@centerTimetable")->name('center-timetable');
        $backendVerified->post('add-center-timetable', "TutorMasterController@addCenterTimetable")->name('add-center-timetable');
        $backendVerified->get('get-center-timetable', "TutorMasterController@getCenterTimetable")->name('get-center-timetable');
        $backendVerified->get('get-booked-timetable', "TutorMasterController@getBookedTimetable")->name('get-booked-timetable');
        $backendVerified->post('delete-center-timetable', "TutorMasterController@deleteCenterTimetable")->name('delete-center-timetable');

        $backendVerified->get('subject-inquiry', "SearchInquiryController@index")->name('subject.inquiry');
        $backendVerified->post('delete-subject-inquiry/{id}', "SearchInquiryController@destory");
        $backendVerified->get('subject-inquiry-ajax', "SearchInquiryController@ajaxList")->name('subject-inquiry-ajax');

        $backendVerified->resource('blog-master', "BlogMasterController");
        $backendVerified->get('blog-master-ajax', "BlogMasterController@ajaxList")->name('blog-master-ajax');
        $backendVerified->get('change-status', "TutorMasterController@changeStatus")->name('change-status');
        $backendVerified->get('contact-ajax', "ContactListController@ajaxList")->name('contact-ajax');
        $backendVerified->resource('contact-list', "ContactListController");
        $backendVerified->resource('support-ticket', "SupportTicketController");
        $backendVerified->get('support-ajax', "SupportTicketController@ajaxList")->name('support-ajax');
        $backendVerified->get('about-ajax', "AboutController@ajaxList")->name('about-ajax');
        $backendVerified->resource('about-list', "AboutController");
        $backendVerified->resource('tutor-form', "TutorFormController");
        $backendVerified->get('tutor-form-ajax-list', "TutorFormController@ajaxList")->name('tutor-form-ajax-list');
        $backendVerified->post('import-file', "TutorFormController@importCsvFile")->name('import-file');
        $backendVerified->post('save-tutor-form', "TutorFormController@addMutipleTutorForm")->name('save-tutor-form');
        $backendVerified->get('parent-list', "ParentMasterController@index")->name('parent.index');
        $backendVerified->get('parent-list-ajax', "ParentMasterController@ajaxList")->name('parent-list-ajax');
        $backendVerified->get('parent-list/{id}', "ParentMasterController@parentDetails")->name('parent.details');

        // $backendVerified->get('old-student', 'ParentMasterController@oldStudentList')->name('old-student');

        $backendVerified->get('student-list', 'ParentMasterController@studentList')->name('student-list');
        $backendVerified->get('student-list-ajax', 'ParentMasterController@studentAjaxList')->name('student-list-ajax');
        $backendVerified->get('student-add', 'ParentMasterController@addStudent')->name('student-add');
        $backendVerified->get('student-edit/{eid}', 'ParentMasterController@editStudent')->name('student-edit');
        $backendVerified->post('save-student', 'ParentMasterController@saveStudent')->name('save-student');
        $backendVerified->post('delete-student/{id}', 'ParentMasterController@deleteStudent')->name('delete-student');

        $backendVerified->get('tutor-reviews', 'ParentMasterController@TutorReview')->name('tutor-reviews');
        $backendVerified->get('tutor-reviews-ajax', 'ParentMasterController@tutorReviewAjaxList')->name('tutor-reviews-ajax');
        $backendVerified->get('tutor-reviews-add', 'ParentMasterController@addTutorReview')->name('tutor-reviews-add');
        $backendVerified->get('tutor-reviews-edit/{eid}', 'ParentMasterController@editTutorReview')->name('tutor-reviews-edit');
        $backendVerified->post('save-tutor-reviews', 'ParentMasterController@saveTutorReview')->name('save-tutor-reviews');
        $backendVerified->post('delete-tutor-reviews/{id}', 'ParentMasterController@deleteTutorReview')->name('delete-tutor-reviews');
        $backendVerified->post('active-tutor-reviews/{id}', 'ParentMasterController@activeTutorReview')->name('active-tutor-reviews');
        $backendVerified->post('pending-tutor-reviews/{id}', 'ParentMasterController@pendingTutorReview')->name('pending-tutor-reviews');


        $backendVerified->get('tutor-Inquiry', "ParentMasterController@getInquiryDetails")->name('tutor.inquiry');
        $backendVerified->get('get-hourly-rate', "ParentMasterController@getHourlyRate")->name('get-hourly-rate');
        $backendVerified->get('calander-booking', "ParentMasterController@getCalanderBooking")->name('calander-booking');
        $backendVerified->get('getBooklesson', "ParentMasterController@getBooklesson")->name('getBooklesson');
        $backendVerified->post('update-book-lesson', "ParentMasterController@updateBooklesson")->name('update-book-lesson');
        $backendVerified->get('parent-book-lesson-data', "ParentMasterController@getParentBookLesson")->name('parent-book-lesson-data');
        $backendVerified->delete('parent-delete/{id}', "ParentMasterController@destroy");
        $backendVerified->get('testimonial-ajax', "TestimonialController@ajaxList")->name('testimonial-ajax');
        $backendVerified->resource('testimonial', "TestimonialController");

        $backendVerified->get('send-payment-link-parent', "ParentMasterController@sendPaymentLinkMail")->name('send-payment-link-parent');
        $backendVerified->post('add-subject-hourly-rate', "ParentMasterController@addHourlyRate")->name('add-subject-hourly-rate');
        $backendVerified->resource('parent-payment-history', "ParentPaymentController");
        $backendVerified->get('parent-payment-list-ajax', "ParentPaymentController@ajaxList")->name('parent-payment-list-ajax');

        $backendVerified->resource('tutor-payment-history', "TutorPaymentController");
        $backendVerified->get('tutor-payment-history-report', "TutorPaymentController@getPaymentHistory")->name('tutor-payment-history-report');
        $backendVerified->get('filter-tutor-payment-history-report/{search?}', "TutorPaymentController@filterPaymentHistory")->name('filter-tutor-payment-history-report');
        $backendVerified->get('tutor-payment-history-list-ajax', "TutorPaymentController@ajaxHistoryList")->name('tutor-payment-history-list-ajax');
        $backendVerified->get('tutor-payment-list-ajax', "TutorPaymentController@ajaxList")->name('tutor-payment-list-ajax');
        $backendVerified->get('tutor-unpaid-payment-history', "TutorPaymentController@tutorUnpaidList")->name('tutor-unpaid-payment-history');
        $backendVerified->get('tutor-paid-payment-list-ajax', "TutorPaymentController@ajaxListUnpaid")->name('tutor-paid-payment-list-ajax');
        $backendVerified->post('tutor-pay-amounts', "TutorPaymentController@tutorPayamount")->name('tutor-pay-amounts');
        $backendVerified->post('multiple-tutor-pay-amount', "TutorPaymentController@payMultipleTutorsAmount")->name('multiple-tutor-pay-amount');
        $backendVerified->resource('site-setting', "SiteSettingController");
        $backendVerified->resource('online-tutoring', "OnlineTutoringController");
        $backendVerified->resource('text-books', "TextBooksController");
        $backendVerified->resource('e-learning-cms', "ELearningController");
        $backendVerified->get('online-tutoring-ajax-list', "OnlineTutoringController@ajaxList")->name('online-tutoring-ajax-list');
        $backendVerified->get('text-books-ajax-list', "TextBooksController@ajaxList")->name('text-books-ajax-list');
        $backendVerified->get('check-title', "TextBooksController@checkTitle")->name('check-title');
        $backendVerified->get('e-learning-cms-ajax-list', "ELearningController@ajaxList")->name('e-learning-cms-ajax-list');
        $backendVerified->resource('past-papers-cms', "PastPapersController");
        $backendVerified->get('past-papers-cms-ajax-list', "PastPapersController@ajaxList")->name('past-papers-cms-ajax-list');
        $backendVerified->post('admin-offline-booking-store', 'OfflineBookingController@storeOfflineBooking')->name('admin-offline-booking-store');
        $backendVerified->get('check-unique-entry', 'OfflineBookingController@checkUniqueEnquiry')->name('check-unique-entry');
        $backendVerified->get('check-tutor-avalibility', 'OfflineBookingController@checkTutorAvalibility')->name('check-tutor-avalibility');
        $backendVerified->get('admin-offline-booking-edit/{id}', "OfflineBookingController@editOfflineBooking")->name('admin-offline-booking-edit');
        $backendVerified->get('unread-notification', "NotificationController@unreadNotification")->name('unread-notification');
        $backendVerified->get('mark-read/{id}', "NotificationController@markAsRead")->name('mark-read');
        $backendVerified->get('notification', "NotificationController@index")->name('notification');
        $backendVerified->get('tutor-bank-details', "TutorBankDetailsController@index")->name('tutor-bank-details');
        $backendVerified->get('tutor-bank-detail-ajax', "TutorBankDetailsController@bankDetailsAjax")->name('tutor-bank-detail-ajax');
        $backendVerified->get('pay-claim-form-list', "PayClaimFormController@index")->name('pay-claim-form-list');
        $backendVerified->get('pay-claim-form-list-ajax', "PayClaimFormController@ajaxList")->name('pay-claim-form-list-ajax');
        $backendVerified->delete('delete-pay-claim-form/{id}', "PayClaimFormController@destroy");
        $backendVerified->get('view-pay-claim-form/{id}', "PayClaimFormController@viewDetails")->name('view-pay-claim-form');
        $backendVerified->post('update-pay-claim-form', "PayClaimFormController@update");
        $backendVerified->post('confirm-pay-claim-form/{id}', "PayClaimFormController@confirmPay");

        $backendVerified->get('our-featured', "OurFeaturedController@index")->name('our-featured');
        $backendVerified->get('our-featuredour-featured-ajax', "OurFeaturedController@ajaxList")->name('our-featured-ajax');
        $backendVerified->get('our-featured-create', "OurFeaturedController@create")->name('our-featured-create');
        $backendVerified->post('our-featured-store', "OurFeaturedController@store")->name('our-featured-store');
        $backendVerified->get('our-featured/{id}', "OurFeaturedController@show")->name('our-featured-show');
        $backendVerified->get('our-featured/{id}/edit', "OurFeaturedController@edit")->name('our-featured-edit');
        $backendVerified->delete('our-featured/{id}', "OurFeaturedController@destroy")->name('our-featured-destroy');
        $backendVerified->put('our-featured-update/{id}', "OurFeaturedController@update")->name('our-featured-update');

    });
});

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function ($frontend) {

    $frontend->get('/', 'HomeController@index');
    $frontend->get('test_home', 'HomeController@index_test');
    $frontend->post('saveInquiry', 'HomeController@saveInquiry')->name('saveInquiry');
    $frontend->get('terms-and-conditions', 'HomeController@terms_conditions');
    $frontend->get('inspiring-online-tutoring', 'HomeController@onlineTutoring')->name('inspiring-online-tutoring');
    $frontend->get('/subject/{id}', 'UserSubjectController@index');
    $frontend->get('/sub-subject/{id}', 'UserSubjectController@subSubjectDetails');
    $frontend->resource('become-tutor', "BecomeTutorController");
    $frontend->resource('register-student', "BecomeStudentController");
    $frontend->get('check-email', "BecomeTutorController@checkEmail")->name('check.email');
    $frontend->get('find-tutor', "FindATutorController@index")->name('find-tutor');
    $frontend->get('find-tutor/{id}', "FindATutorController@index");
    $frontend->get('find-tutor/{id}/{levelName}', "FindATutorController@index");
    $frontend->get('find-tutor-user', "FindATutorController@getTutors")->name('get.tutors');
    $frontend->get('filter-tutor-user', "FindATutorController@filterTutors")->name('filter.tutors');
    $frontend->get('tutors-details/{id}', "FindATutorController@tutorDetails")->name('tutors-details');
    $frontend->get('tutors-feedback/{id}', "FindATutorController@tutorFeedback")->name('tutors-feedback');
    $frontend->get('tutor-availability-get', "FindATutorController@tutorAvailabilityDetails")->name('tutor-availability-get');
    $frontend->get('submit-review', "FindATutorController@saveReview")->name('submit.review');
    $frontend->post('check-email-parent', "FindATutorController@checkEmailParent")->name('check-email-parent');
    $frontend->post('submit-inquiry', "FindATutorController@saveInquiry")->name('submit.inquiry');
    $frontend->post('submit-feedback', "FindATutorController@saveFeedback")->name('submit-feedback');
    $frontend->get('blog', "BlogController@index")->name('blog');
    $frontend->get('blog-detail/{id}', "BlogController@blogDetails")->name('blog-detail');

    $frontend->resource('contact', "ContactController");
    $frontend->get('about', "AboutsController@index")->name('about');
    $frontend->get('forgot-password-user', 'ForgotPasswordController@index')->name('forgot-password-user');
    $frontend->post('forgot-password-verify', 'ForgotPasswordController@ForgotPasswordVerify')->name('forgot-password-verify');
    $frontend->get('user-reset-password/{id}', 'ResetPasswordController@ResetPassword')->name('user-reset-password');
    $frontend->post('update-user-password/{id}', 'ResetPasswordController@UpdatePassword')->name('update-user-password');
    $frontend->get('tutors', 'TutorListController@index')->name('tutors');
    $frontend->get('tutors-ajax-list', 'TutorListController@ajaxList')->name('tutors-ajax-list');
    $frontend->get('tutors-filter-ajax-list', 'TutorListController@ajaxFilterList')->name('tutors-filter-ajax-list');
    $frontend->get('E-Learning', 'HomeController@getELearningdata')->name('E-Learning');
    $frontend->get('Text-Books', 'HomeController@getTextBook')->name('text-books');
    $frontend->get('past-papers-resources', 'HomeController@getPastPaperData')->name('past-papers-resources');
    $frontend->get('past-papers-resources-detail/{id}', 'HomeController@getPastPaperDetailData')->name('past-papers-resources-detail');
    $frontend->get('biology-tution', 'subjectController@biologyTution')->name('biology-tution');
    $frontend->get('chemistry-tuition', 'subjectController@chemistryTution')->name('chemistry-tuition');
    $frontend->get('combined-sciences-tuition', 'subjectController@conbinedSciencesTution')->name('combined-sciences-tuition');
    $frontend->get('physics-tuition', 'subjectController@physicsTution')->name('physics-tuition');
    $frontend->get('igcse-science', 'subjectController@igcseScience')->name('igcse-science');
    $frontend->get('english-language-literature-tuition', 'subjectController@englishTution')->name('english-language-literature-tuition');
    $frontend->get('mathematics-tuition', 'subjectController@mathematicsTution')->name('mathematics-tuition');
    $frontend->get('business-studies-tuition', 'subjectController@businessStudiesTuition')->name('business-studies-tuition');
    $frontend->get('accounting-tution', 'subjectController@accountingTuition')->name('accounting-tution');
    $frontend->get('computer-science', 'subjectController@computerScienceTuition')->name('computer-science');
    $frontend->get('geography-tuition', 'subjectController@geographyTuition')->name('geography-tuition');
    $frontend->get('history-tuition', 'subjectController@historyTuition')->name('history-tuition');
    $frontend->get('law-tuition', 'subjectController@lawTuition')->name('law-tuition');
    $frontend->get('sociology-tution', 'subjectController@sociologyTuition')->name('sociology-tution');
    $frontend->get('psychology-tuition', 'subjectController@psychologyTuition')->name('psychology-tuition');
    $frontend->get('philosophy-tuition', 'subjectController@philosophyTuition')->name('philosophy-tuition');
    $frontend->get('politics-tution', 'subjectController@politicsTuition')->name('politics-tution');
    $frontend->get('11-common-entrance-exam', 'subjectController@commonEntranceExamTution')->name('11-common-entrance-exam');
    $frontend->get('primary-school', 'subjectController@primarySchool')->name('primary-school');
    $frontend->get('spanish-tuition', 'subjectController@spanishTuition')->name('spanish-tuition');
    $frontend->get('french-tuition', 'subjectController@frenchTuition')->name('french-tuition');
    $frontend->get('german-tuition', 'subjectController@germanTuition')->name('german-tuition');
    $frontend->get('latin-tuition', 'subjectController@latinTuition')->name('latin-tuition');

});

Route::group(['namespace' => 'App\Http\Controllers\Frontend\Tutor'], function ($tfrontend) {
    $tfrontend->get('tutor-login', 'TutorLoginController@index')->name('tutor-login');
    $tfrontend->post('verify-login-tutor', 'TutorLoginController@verifyLogin')->name('verify-login-tutor');
    $tfrontend->middleware(['auth:web', 'verified'])->group(function ($backendVerified) {
        $backendVerified->get('tutor-dashboard','TutorDashboardController@index')->name('tutor-dashboard');
        $backendVerified->get('dbs','TutorDashboardController@dbs')->name('dbs');
        $backendVerified->post('dbs-update', 'TutorDashboardController@dbsUpdate')->name('dbs-update');
        $backendVerified->post('change-dbs', 'TutorDashboardController@changeValidDbs')->name('change-dbs');
        $backendVerified->get('tutor-logout', 'TutorLoginController@logout')->name('tutor-logout');
        $backendVerified->get('tutor-verify','TutorVerifyController@index')->name('tutor-verify');
        $backendVerified->post('tutor-profile', 'TutorVerifyController@updateProfile')->name('tutor-profile');
        $backendVerified->post('tutor-dbs', 'TutorVerifyController@updateDBS')->name('tutor-dbs');
        $backendVerified->post('tutor-certificate', 'TutorVerifyController@updateCertificate')->name('tutor-certificate');
        $backendVerified->get('tutor-account', 'TutorAccountController@index')->name('tutor-account');
        $backendVerified->get('check-email-tutor', "TutorAccountController@checkEmail")->name('check-email-tutor');
        $backendVerified->put('update-tutor', "TutorAccountController@updateProfile")->name('update-tutor');
        $backendVerified->get('check-password-tutor', "TutorAccountController@checkCurrentPassword")->name('check-password-tutor');
        $backendVerified->post('update-password-tutor', "TutorAccountController@updatePassword")->name('update-password-tutor');
        $backendVerified->get('tutor-bookings', 'TutorAvailabilityController@index')->name('tutor-bookings');
        $backendVerified->get('tutor-availability', 'TutorAvailabilityController@tutorAvailability')->name('tutor-availability');
        $backendVerified->get('get-booked-slot', 'TutorAvailabilityController@getBookedSlot')->name('get-booked-slot');
        $backendVerified->post('delete-slot', 'TutorAvailabilityController@deleteSlot')->name('delete-slot');
        $backendVerified->post('delete-booking-slot', 'TutorAvailabilityController@deleteBookingSlot')->name('delete-booking-slot');
        $backendVerified->post('add-availability', 'TutorAvailabilityController@addTutorAvailability')->name('add-availability');
        $backendVerified->get('get-tutor-availability', 'TutorAvailabilityController@getTutorAvailabilityDetails')->name('get-tutor-availability');
        $backendVerified->get('get-tutor-bookings', 'TutorAvailabilityController@getTutorBookingsDetails')->name('get-tutor-bookings');
        $backendVerified->get('tutor-profile', 'TutorProfileController@index')->name('tutor-profile');
        $backendVerified->get('tutor-student', 'TutorSubjectController@studentList')->name('tutor-student');
        $backendVerified->get('tutor-student-ajax', 'TutorSubjectController@studentAjaxList')->name('tutor-student-ajax');
        $backendVerified->get('tutor-student-add', 'TutorSubjectController@addStudent')->name('tutor-student-add');
        $backendVerified->get('tutor-student-edit/{eid}', 'TutorSubjectController@editStudent')->name('tutor-student-edit');
        $backendVerified->post('save-tutor-student', 'TutorSubjectController@saveStudent')->name('save-tutor-student');
        $backendVerified->post('delete-tutor-student/{id}', 'TutorSubjectController@deleteStudent')->name('delete-tutor-student');
        $backendVerified->get('tutor-subject', 'TutorSubjectController@index')->name('tutor-subject');
        $backendVerified->post('tutor-subject-store', 'TutorSubjectController@store')->name('tutor-subject-store');
        $backendVerified->get('tutor-subject-ajax', "TutorSubjectController@ajaxList")->name('tutor-subject-ajax');
        $backendVerified->get('tutor-subject-edit/{id}', "TutorSubjectController@edit")->name('tutor-subject-edit');
        $backendVerified->post('check-level-subject', "TutorSubjectController@checkData")->name('check-level-subject');
        $backendVerified->put('tutor-subject-update', "TutorSubjectController@update")->name('tutor-subject-update');
        $backendVerified->delete('remove-subject/{id}', "TutorSubjectController@delete")->name('remove-subject');
        $backendVerified->get('tutor-online-subject-ajax', "TutorSubjectController@onlineAjaxList")->name('tutor-online-subject-ajax');
        $backendVerified->get('tutor-online-subject-edit/{id}', "TutorSubjectController@editOnlineSubject")->name('tutor-online-subject-edit');
        $backendVerified->get('tutor-profile-photo', 'TutorProfilePhotoController@index')->name('tutor-profile-photo');
        $backendVerified->post('update-tutor-image', 'TutorProfilePhotoController@updateTutorImage')->name('update-tutor-image');
        $backendVerified->post('update-tutor-video', 'TutorProfilePhotoController@updateTutorVideo')->name('update-tutor-video');
        $backendVerified->get('get-bookslot-data', 'TutorAvailabilityController@getBookedSlotData')->name('get-bookslot-data');
        $backendVerified->get('show-bookslot-data/{id}/{time}', 'TutorAvailabilityController@showBookedslots')->name('show-bookslot-data');
        $backendVerified->get('edit-book-slot', 'TutorAvailabilityController@editBookSlot')->name('edit-book-slot');
        $backendVerified->post('update-book-slot', 'TutorAvailabilityController@updateBookSlot')->name('update-book-slot');
        $backendVerified->post('cancel-slot', 'TutorAvailabilityController@cancelSlot')->name('cancel-slot');
        $backendVerified->post('store-account-details', 'TutorAccountController@storeAccountDetails')->name('store-account-details');
        $backendVerified->get('get-tutor-bank-details', 'TutorAccountController@getTutorBankDetails')->name('get-tutor-bank-details');
        $backendVerified->resource('tutor-resource', "TutorResourceController");
        $backendVerified->get('tutor-resource-ajax', "TutorResourceController@resourceAjaxList")->name('tutor-resource-ajax');
        $backendVerified->resource('tutor-text-books', "TutorTextBooksController");
        $backendVerified->get('tutor-text-books-ajax-list', "TutorTextBooksController@ajaxList")->name('tutor-text-books-ajax-list');

        $backendVerified->get('testFun', "TutorPayClaimFormController@testFun")->name('testFun');
        $backendVerified->get('tutor-pay-claim-form', "TutorPayClaimFormController@create")->name('tutor-pay-claim-form');
        $backendVerified->post('tutor-pay-claim-form-store', "TutorPayClaimFormController@store")->name('tutor-pay-claim-form-store');
        $backendVerified->get('tutor-pay-claim-history', "TutorPayClaimFormController@index")->name('tutor-pay-claim-history');
        $backendVerified->get('tutor-pay-claim-form-edit/{id}', "TutorPayClaimFormController@edit");
        $backendVerified->post('tutor-pay-claim-form-update', "TutorPayClaimFormController@update");
        $backendVerified->get('tutor-pay-claim-form-ajax-list', "TutorPayClaimFormController@ajaxList")->name('tutor-pay-claim-form-ajax-list');
        $backendVerified->delete('tutor-pay-claim-form/{id}', "TutorPayClaimFormController@destroy");

        $backendVerified->get('tutor-parent-list', 'ParentListController@index')->name('tutor-parent-list');
        $backendVerified->get('send-payment-mail-tutor', 'ParentListController@sendPaymentMailTutor')->name('send-payment-mail-tutor');
        $backendVerified->get('send-booking-notification-admin', 'ParentListController@sendBookingNotificationAdmin')->name('send-booking-notification-admin');
        $backendVerified->get('send-booking-mail-tutor', 'ParentListController@sendBookingMail')->name('send-booking-mail-tutor');
        $backendVerified->get('tutor-parent-list/{id}', 'ParentListController@getParentDetails')->name('tutor-parent-details');
        $backendVerified->get('parent-subject-details', 'ParentListController@parentSubjectDetails')->name('parent-subject-details');
        $backendVerified->post('add-teaching-hours', 'ParentListController@saveTutoringHours')->name('add-teaching-hours');
        $backendVerified->post('attend-lesson-subject', 'ParentListController@attendLesson')->name('attend-lesson-subject');
        $backendVerified->post('add-zoom-details', 'ParentListController@addZoomDetails')->name('add-zoom-details');
        $backendVerified->resource('tutor-resource', "TutorResourceController");
        $backendVerified->get('tutor-resource-ajax', "TutorResourceController@resourceAjaxList")->name('tutor-resource-ajax');
        $backendVerified->get('tutor-feedback', "TutorFeedBackController@index")->name('tutor-feedback');
        $backendVerified->get('tutor-feedback-ajax', "TutorFeedBackController@ajaxList")->name('tutor-feedback-ajax');
        $backendVerified->resource('tutor-support-ticket', "TutorSupportController");
        $backendVerified->get('tutor-support-ajax', "TutorSupportController@supportAjaxList")->name('tutor-support-ajax');
        $backendVerified->get('tutor-support-edit/{id}', "TutorSupportController@edit")->name('tutor-support-edit');
        $backendVerified->get('tutor-missed-lessons', 'TutorAvailabilityController@tutorMissedLesson')->name('tutor-missed-lessons');
        $backendVerified->get('tutor-offline-booking', 'TutorAvailabilityController@tutorOfflineBooking')->name('tutor-offline-booking');
        $backendVerified->post('offline-booking-store', 'TutorAvailabilityController@storeOfflineBooking')->name('offline-booking-store');
        $backendVerified->get('tutor-offline-subject-ajax', 'TutorAvailabilityController@getOfflineBookingAjax')->name('tutor-offline-subject-ajax');
        $backendVerified->get('check-unique', 'TutorAvailabilityController@checkUniqueEnquiry')->name('check-unique');
        $backendVerified->get('tutor-offline-booking-edit/{id}', "TutorAvailabilityController@editOfflineBooking")->name('tutor-offline-booking-edit');
        $backendVerified->post('tutor-offline-booking-delete/{id}', "TutorAvailabilityController@deleteOfflineBooking")->name('tutor-offline-booking-delete');
        $backendVerified->post('tutor-offline-booking-attend/{id}', "TutorAvailabilityController@attendOfflineBooking")->name('tutor-offline-booking-attend');
        $backendVerified->post('offline-booking-update', 'TutorAvailabilityController@updateOfflineBooking')->name('offline-booking-update');

        $backendVerified->get('tutor-missed-lesson-ajax', 'TutorAvailabilityController@missedLessonAjax')->name('tutor-missed-lesson-ajax');
        $backendVerified->post('add-missed-lesson-reason', 'TutorAvailabilityController@addMissedLessonReason')->name('add-missed-lesson-reason');
        $backendVerified->get('merithub-classroom', 'TutorMerithubController@getToken')->name('merithub-classroom');
        $backendVerified->get('get-online-tutoring-data', 'ParentListController@getOnlineTutoringData')->name('get-online-tutoring-data');
        $backendVerified->resource('tutor-e-learning', "TutorELearningController");
        $backendVerified->get('tutor-e-learning-ajax-list', "TutorELearningController@ajaxList")->name('tutor-e-learning-ajax-list');
        $backendVerified->resource('tutor-past-papers', "TutorPastPapersController");
        $backendVerified->get('tutor-past-papers-ajax-list', "TutorPastPapersController@ajaxList")->name('tutor-past-papers-ajax-list');
        $backendVerified->resource('tutor-e-learning', "TutorELearningController");
        $backendVerified->get('tutor-e-learning-ajax-list', "TutorELearningController@ajaxList")->name('tutor-e-learning-ajax-list');
        $backendVerified->get('tutor-check-title', "TutorTextBooksController@checkTitle")->name('tutor-check-title');
        $backendVerified->get('tutor-online-tutoring', "OnlineTutoringController@index")->name('tutor-online-tutoring');
        $backendVerified->get('tutor-online-tutoring-ajax', "OnlineTutoringController@ajaxList")->name('tutor-online-tutoring-ajax');
        $backendVerified->post('add-merithub-link', "OnlineTutoringController@addMeritHublink")->name('add-merithub-link');
        $backendVerified->get('edit-merithub-link', "OnlineTutoringController@editMeritHublink")->name('edit-merithub-link');
        $backendVerified->post('update-merithub-link', "OnlineTutoringController@updateMeritHublink")->name('update-merithub-link');
        $backendVerified->post('delete-merithub-link', "OnlineTutoringController@deleteMeritHublink")->name('delete-merithub-link');
    });
});
Route::group(['namespace' => 'App\Http\Controllers\Frontend\Parent'], function ($pfrontend) {
    $pfrontend->get('parent-login', 'ParentLoginController@index')->name('parent-login');
    $pfrontend->get('textbook-parent-login', 'ParentLoginController@index')->name('textbook-parent-login');
    $pfrontend->post('verify-login-parent', 'ParentLoginController@verifyLogin')->name('verify-login-parent');
    $pfrontend->middleware(['auth:parent', 'verified'])->group(function ($parentVerified) {
        $parentVerified->get('parent-dashboard', 'ParentDashboardController@index')->name('parent-dashboard');
        $parentVerified->get('parent-account', 'ParentAccountController@index')->name('parent-account');
        $parentVerified->get('check-email-parent', 'ParentAccountController@checkEmail')->name('check-email-parent');
        $parentVerified->get('check-email-parent', 'ParentAccountController@checkEmail')->name('check-email-parent');
        $parentVerified->post('update-parent', 'ParentAccountController@parentUpdate')->name('update-parent');
        $parentVerified->get('check-old-password', 'ParentAccountController@checkOldPassword')->name('check-old-password');
        $parentVerified->post('update-password', 'ParentAccountController@updatePassword')->name('update-password');
        $parentVerified->get('parent-logout', 'ParentLoginController@logout')->name('parent-logout');
        $parentVerified->get('bookings', 'BookingsController@index')->name('booking.index');
        $parentVerified->post('add-tutor-availability', 'BookingsController@addTutorAvailability')->name('add-tutor-availability');
        $parentVerified->get('add-tutor-availability-data', 'BookingsController@getTutorAvailabilityDetails')->name('add-tutor-availability-data');
        $parentVerified->get('parent-text-books', 'ParentTextBooksController@index')->name('parent-text-books');
        $parentVerified->get('feedback', 'FeedbackController@index')->name('feedback');
        $parentVerified->get('feedback/{uid}', 'FeedbackController@feedbackForm')->name('feedback-form');
        $parentVerified->post('submit-parent-review', 'FeedbackController@submitParentFeedback')->name('submit-parent-review');
        $parentVerified->get('get-feedback', 'FeedbackController@getFeedback')->name('get-feedback');
        $parentVerified->get('parent-text-books-ajax', 'ParentTextBooksController@ajaxList')->name('parent-text-books-ajax');
        $parentVerified->resource('parent-support-ticket', "ParentSupportController");
        $parentVerified->get('parent-support-ajax', "ParentSupportController@supportAjaxList")->name('parent-support-ajax');
        $parentVerified->get('parent-support-edit/{id}', "ParentSupportController@edit")->name('parent-support-edit');
        $parentVerified->resource('parent-lesson-payment', "ParentLessonPaymentController");
        $parentVerified->get('parent-lesson-payment-ajax', "ParentLessonPaymentController@lessonAjaxList")->name('parent-lesson-payment-ajax');
        $parentVerified->get('parent-e-learning-ajax-list', "ParentELearningController@ajaxList")->name('parent-e-learning-ajax-list');
        $parentVerified->get('parent-e-learning', "ParentELearningController@index")->name('parent-e-learning');
    });

});
