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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::apiresource('/generalSetting', '\App\Http\Controllers\Manage\GeneralSettingController' );
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', '\App\Http\Controllers\DashboardController@dashboard')->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'], function() { });

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::group(['prefix' => 'manage'], function() {
            Route::apiresource('/days', '\App\Http\Controllers\Manage\DayController' );
            Route::resource('/months', '\App\Http\Controllers\Manage\MonthController' );
            Route::resource('/years', '\App\Http\Controllers\Manage\YearController' );
            Route::resource('/gradingTypes', '\App\Http\Controllers\Manage\GradingTypeController');
            Route::resource('/gradingScale', '\App\Http\Controllers\Manage\GradingScaleController');
            Route::resource('/exams', '\App\Http\Controllers\Manage\ExamController' );
            Route::resource('/staffDesignations', '\App\Http\Controllers\Manage\StaffDesignationController' );
            Route::resource('/attendanceStatuses', '\App\Http\Controllers\Manage\AttendanceStatusController' );
            Route::resource('/faculties', '\App\Http\Controllers\Manage\FacultyController' );
            Route::resource('/timeZones', '\App\Http\Controllers\Manage\TimeZoneController' );
            Route::resource('/studentStatuses', '\App\Http\Controllers\Manage\StudentStatusController' );
            Route::resource('/studentBatches', '\App\Http\Controllers\Manage\StudentBatchController' );
            Route::resource('/customerStatuses', '\App\Http\Controllers\Manage\CustomerStatusController' );
            Route::resource('/bookStatuses', '\App\Http\Controllers\Manage\BookStatusController' );
            Route::resource('/bookCategories', '\App\Http\Controllers\Manage\BookCategoryController' );
            Route::resource('/bedStatuses', '\App\Http\Controllers\Manage\BedStatusController' );
            Route::resource('/roomTypes', '\App\Http\Controllers\Manage\RoomTypeController' );
            Route::resource('/foodCategories', '\App\Http\Controllers\Manage\FoodCategoryController' );
            Route::resource('/eatingTimes', '\App\Http\Controllers\Manage\EatingTimeController' );
            Route::resource('/paymentMethods', '\App\Http\Controllers\Manage\PaymentMethodController' );
            Route::resource('/feeHeads', '\App\Http\Controllers\Manage\FeeHeadController' );
            Route::resource('/payrollHeads', '\App\Http\Controllers\Manage\PayrollHeadController' );
            Route::resource('/categories', '\App\Http\Controllers\Manage\CategoryController' );
            Route::resource('/subCategories', '\App\Http\Controllers\Manage\SubCategoryController' );
            Route::resource('/visitorPurposes', '\App\Http\Controllers\Manage\VisitorPurposeController' );
            Route::resource('/grading', '\App\Http\Controllers\Manage\GradingController' );
            Route::resource('/subjects', '\App\Http\Controllers\Subjects\SubjectController' );
            Route::resource('/semesters', '\App\Http\Controllers\Semester\SemesterController' );
            Route::resource('/assignFaculties', '\App\Http\Controllers\AssignFacultyController');
            Route::resource('/assignSubjects', '\App\Http\Controllers\AssignSubjectController');
        });

        Route::group(['prefix' => 'users'], function() {
            Route::apiresource('/users', '\App\Http\Controllers\Users\UserController' );
            Route::apiresource('/staffs', '\App\Http\Controllers\Users\StaffController' );
            Route::apiresource('/employees', '\App\Http\Controllers\Users\EmployeeController' );
            Route::apiresource('/students', '\App\Http\Controllers\Users\StudentController');
            Route::get('/students/studentTransfer', '\App\Http\Controllers\Users\StudentController@studentTransfer');
            Route::get('/findMemberData/{q}', '\App\Http\Controllers\Users\UserController@findStudentOrStaff'); // find Student or Staff
            Route::apiresource('/employees', '\App\Http\Controllers\Users\EmployeeController' );
            Route::get('/students/findStudentDetails/{q}', '\App\Http\Controllers\Users\StudentController@findStudentDetails');

        });

        Route::group(['prefix' => 'accademic'], function() {
            Route::apiresource('/examSchedules', '\App\Http\Controllers\Accademic\ExamScheduleController');
            Route::apiresource('/examMarkLedger', '\App\Http\Controllers\Accademic\ExamMarkLedgerController');
            Route::get('/examResult', '\App\Http\Controllers\Accademic\ExamMarkLedgerController@examResult');
            Route::get('/examMarkLedgerStudent/{year}/{month}/{exam}/{faculty}/{semester}/{subject}', '\App\Http\Controllers\Accademic\ExamMarkLedgerController@examinationMarkLedger' );
            Route::get('/loadExamMarks/{year}/{month}/{exam}/{faculty}/{semester}/{subject}', '\App\Http\Controllers\Accademic\ExamMarkLedgerController@loadExamMarks' );
            Route::get('/findExamResult/{year}/{faculty}/{semester}', '\App\Http\Controllers\Accademic\ExamMarkLedgerController@findExamResult' );

        });

        Route::group(['prefix' => 'assignment'], function() {
            Route::apiresource('/assignments', '\App\Http\Controllers\Accademic\AssignmentController');
            Route::get('/loadSubjectForStaff/{staffId}/{semester}', '\App\Http\Controllers\Accademic\AssignmentController@loadSubjectForStaff' );
            Route::get('/loadSubjectForStaffCurrent/{semester}', '\App\Http\Controllers\Accademic\AssignmentController@loadSubjectForStaffCurrent' );

        });

        Route::group(['prefix' => 'student'], function() {
            Route::get('/getStudentBook', '\App\Http\Controllers\Student\CurrentStudentController@getStudentBook');
            Route::get('/getStudentAssignment', '\App\Http\Controllers\Student\CurrentStudentController@getStudentAssignment');
            Route::get('/getStudentResult', '\App\Http\Controllers\Student\CurrentStudentController@getStudentResult');
            Route::get('/getStudentExamination', '\App\Http\Controllers\Student\CurrentStudentController@getStudentExamination');
            Route::get('/getExaminFacultySemister/{facId}/{semId}', '\App\Http\Controllers\Student\CurrentStudentController@getExaminFacultySemister');


        });

        Route::group(['prefix' => 'accountant'], function() {
            Route::apiresource('/feeMasters', '\App\Http\Controllers\Accounts\FeeMasterController');
            Route::apiresource('/feeCollections', '\App\Http\Controllers\Accounts\FeeCollectionController');
            Route::get('/quickReceiveFee', '\App\Http\Controllers\Accounts\FeeCollectionController@quickReceiveFee');

        });

        Route::group(['prefix' => 'hostel'], function() {
            Route::apiresource('/hostels', '\App\Http\Controllers\Hostels\HostelController');
            Route::apiresource('/rooms', '\App\Http\Controllers\Hostels\RoomController');
            Route::apiresource('/beds', '\App\Http\Controllers\Hostels\BedController');
            Route::apiresource('/residents', '\App\Http\Controllers\Hostels\ResidentController');
            Route::post('/findResident', '\App\Http\Controllers\Hostels\ResidentController@findResident');
            Route::get('/findRooms/{hostel}', '\App\Http\Controllers\Hostels\ResidentController@findRooms');
            Route::get('/findBeds/{hostel}/{room}', '\App\Http\Controllers\Hostels\ResidentController@findBeds');

            Route::get('/residents/final/{id}', '\App\Http\Controllers\Hostels\ResidentController@finalResident');
            Route::get('/residents/leave/{id}', '\App\Http\Controllers\Hostels\ResidentController@leaveResident');

        });

        Route::group(['prefix' => 'library'], function() {
            Route::apiresource('/bookMasters', '\App\Http\Controllers\Library\BookMasterController');
            Route::apiresource('/books', '\App\Http\Controllers\Library\BookController');
            Route::apiresource('/bookIssue', '\App\Http\Controllers\Library\BookIssueController');
            Route::post('/storeStaff', '\App\Http\Controllers\Library\BookIssueController@storeStaff');
            Route::get('/bookIssueReturn/{member}/{book}', '\App\Http\Controllers\Library\BookIssueController@bookIssueReturn');
            Route::get('/studentLibrary/{type}', '\App\Http\Controllers\Library\BookController@studentLibrary');
            Route::get('/studentLibrary/{student}/{type}', '\App\Http\Controllers\Library\BookController@studentLibraryData');
            Route::get('/findBookDetails/{search}', '\App\Http\Controllers\Library\BookController@findBookDetails');
        });

        Route::group(['prefix' => 'ajaxs'], function() {
            Route::get('/staffGrading', '\App\Http\Controllers\Ajax\AjaxController@staffGrading' );
            Route::get('/semester', '\App\Http\Controllers\Ajax\AjaxController@semeter' );
            Route::get('/loadSemisterFromFaculty/{id}', '\App\Http\Controllers\Ajax\AjaxController@loadSemisterFromFaculty' );
            Route::get('/loadSubjectFromSemester/{id}', '\App\Http\Controllers\Ajax\AjaxController@loadSubjectFromSemester');
            Route::get('/loadStudentFromFacultyAndSemester/{faculty}/{semester}', '\App\Http\Controllers\Users\StudentController@loadStudentFromFacultyAndSemester');
            Route::get('/loadStudentFeeMaster/{studentId}', '\App\Http\Controllers\Accounts\FeeCollectionController@loadStudentFeeMaster' );
            Route::get('/loadStudentFromFacultyAndFees/{faculty}/{semester}',  '\App\Http\Controllers\Accounts\FeeCollectionController@loadStudentFacultySemesterFeeMaster' );


        });

    });
    Route::get('/testing', function () { return Inertia\Inertia::render('Testing'); });
