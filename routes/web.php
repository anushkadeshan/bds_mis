<?php

use App\Models\bss\ResultOL;

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
use App\Http\Livewire\OlResults;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\WelcomeController;
use Spatie\WelcomeNotification\WelcomesNewUsers;

Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('welcome/{user}', [WelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [WelcomeController::class, 'savePassword']);
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::group(['middleware'=>'password.confirm'],function(){
        Route::group(['prefix'=>'admin'], function(){
            Route::resource('roles', App\Http\Controllers\RoleController::class);
            Route::resource('permissions', App\Http\Controllers\PermissionController::class);
            Route::resource('users', App\Http\Controllers\UserController::class);
            Route::resource('tasks', App\Http\Controllers\TaskController::class);
            Route::resource('budget-types', App\Http\Controllers\Program\BudgetTypeController::class);
        });
    });
        Route::view('upload-profile-picture', 'LiveliHoodFamily.profile-picture')->name('upload-profile-picture');
        Route::get('money-order-documents', [App\Http\Controllers\LivelihoodFamilyController::class, 'money_orders'])->name('money-orders');
        Route::view('csos', 'csos.index')->name('cso.index');
        Route::view('csos-create', 'csos.create')->name('cso.create');
        Route::group(['prefix'=>'working-areas'], function(){
            Route::resource('gn-divisions', App\Http\Controllers\GnOfficeController::class);
            Route::resource('dsd-divisions', App\Http\Controllers\DsOfficeController::class);
        });

        Route::group(['prefix'=>'program'], function(){
            Route::resource('completion-reports', App\Http\Controllers\Program\CompletionReportController::class);
            Route::resource('budget', App\Http\Controllers\Program\BudgetController::class);
            Route::resource('progress', App\Http\Controllers\Program\ProgressController::class);
        });
        Route::group(['prefix'=>'families'], function(){
            Route::resource('house-hold-families', App\Http\Controllers\LivelihoodFamilyController::class);
            Route::resource('resourse-people', App\Http\Controllers\ResoursePersonController::class);
        });

        Route::group(['prefix'=>'activities'], function(){
            Route::resource('livelihood-support', App\Http\Controllers\ImproveLivilyhoodController::class);
            Route::resource('business-developmemt', App\Http\Controllers\BusinessDevelopmentController::class);
            Route::resource('idea-generation', App\Http\Controllers\IdeaGenerationController::class);
            Route::resource('marketing-linkages', App\Http\Controllers\MarketingLinkageController::class);
            Route::resource('insurances', App\Http\Controllers\InsuranceController::class);
            Route::resource('awaraness-sgbv', App\Http\Controllers\AwarnessSGBVController::class);
        });

        Route::group(['prefix'=>'bss'], function(){
            Route::view('dashboard', 'dashboard-bss')->name('dashboard-bss');
            Route::resource('students', App\Http\Controllers\bss\StudentController::class);
            Route::get('ol-results', [App\Http\Controllers\bss\StudentController::class, 'ol'])->name('ol');
            Route::get('al-results', [App\Http\Controllers\bss\StudentController::class, 'al'])->name('al');
            Route::get('students-edit', [App\Http\Controllers\bss\StudentController::class, 'editStudent'])->name('edit-student');
        });

        Route::group(['prefix'=>'skill-development'], function(){
            Route::resource('courses', App\Http\Controllers\skill\CourseController::class);
            Route::resource('institutes', App\Http\Controllers\skill\InstituteController::class);
            Route::resource('employers', App\Http\Controllers\skill\EmployerController::class);
            Route::resource('vacancies', App\Http\Controllers\skill\VacancyController::class);
            Route::resource('families', App\Http\Controllers\skill\FamilyController::class);
            Route::resource('youths', App\Http\Controllers\skill\YouthController::class);
        });
        Route::resource('activities', App\Http\Controllers\ActivityController::class);
        Route::get('my-activities', [App\Http\Controllers\ActivityController::class, 'myActivities']);
        Route::post('familyList', [App\Http\Controllers\skill\YouthController::class, 'familyList']);
        Route::post('bssList', [App\Http\Controllers\skill\YouthController::class, 'bssList']);
        Route::post('courseList', [App\Http\Controllers\skill\YouthController::class, 'courseList']);
        Route::post('courseList1', [App\Http\Controllers\skill\YouthController::class, 'courseList1']);
        Route::view('notifications', 'Logs.notifications');

        Route::get('eip-clients', [App\Http\Controllers\EipController::class, 'index'])->name('eip-clients');
        Route::get('eip-create', [App\Http\Controllers\EipController::class, 'create'])->name('eip-create');

        Route::group(['prefix'=>'mobile-app'], function(){
            Route::resource('sessions', App\Http\Controllers\MobileApp\SessionController::class);
            Route::resource('trips', App\Http\Controllers\MobileApp\TripController::class);
            Route::view('trip-detail-view','MobileApp.trips-detailed-view')->name('trip-detail-view');

        });

        Route::group(['prefix'=>'log-frame'], function(){
            Route::resource('projetcs', App\Http\Controllers\LogFrame\ProjectController::class);
            Route::resource('pre-conditions', App\Http\Controllers\LogFrame\PreConditionController::class);
            Route::resource('outcomes', App\Http\Controllers\LogFrame\OutcomeController::class);
            Route::resource('outputs', App\Http\Controllers\LogFrame\OutputController::class);
            Route::resource('logframe-activities', App\Http\Controllers\LogFrame\ActivityController::class);
        });

});

Route::view('career-key', 'career-key.index');
Route::get("/tor", function() { return Redirect::to("/storage/audit-tor/ToRAudit.pdf"); });
Route::view('invitaion-for-bids','tender.index');
