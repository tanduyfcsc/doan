<?php

use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\RevenueStatisticsController;
use App\Models\Comment;
use App\Models\MyCourse;
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

/*
Admin Dashboard
 */
Route::middleware('adminLogin')->group(function () {
    Route::get('dashboard', function () {
        $courses = MyCourse::join('users', 'my_courses.giaoVienID', '=', 'users.id')
            ->where('my_courses.trangThai', 0)
            ->select('my_courses.*', 'users.hoTen as name', 'users.email', 'users.avatar', 'users.id as idGiangVien')
            ->get();
        $revenuesByTeacher = [];

        foreach ($courses as $course) {
            $teacherID = $course->giaoVienID;
            if (!isset($revenuesByTeacher[$teacherID])) {
                $revenuesByTeacher[$teacherID] = [
                    'name' => $course->name,
                    'email' => $course->email,
                    'avatar' => $course->avatar,
                    'value' => 0,
                ];
            }
            $revenuesByTeacher[$teacherID]['value'] += $course->giaCa;
        }

        usort($revenuesByTeacher, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        return view('Admin.dashboard.dashboardAdmin', compact('revenuesByTeacher'));

    })->name('admin-dashboard');

    Route::get('user/check', [AdminLoginController::class, 'checkLogin']);

    Route::middleware('adminMiddleware')->group(function () {
        Route::get('user', function () {

            return view('Admin.user.addUser');

        })->name('admin-add-user');

        Route::get('quan-li-nhan-vien', [AddUserController::class, 'userManagement'])->name('user-management');
        Route::get('quan-li-giang-vien', [AddUserController::class, 'userLecturers'])->name('user-lecturers');

        Route::get('user/edit/{id}', [AddUserController::class, 'userEdit'])->name('user-edit');
        Route::post('user/update/{id}', [AddUserController::class, 'userUpdate'])->name('user-update');

        Route::get('user/delete/{id}', [AddUserController::class, 'userDelete'])->name('user-delete');
        Route::post('add/User', [AddUserController::class, 'addUser'])->name('add-User');
        Route::get('revenue/statistics/teacher', [RevenueStatisticsController::class, 'RevenueStatisticsTeacher'])->name('RevenueStatisticsTeacher');

    });

    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout-admin');

});

/*
Login Admin
 */

Route::get('login/test', function () {
    return view('Admin.userManagement.test');
});

Route::get('category', function () {
    return view('Admin.userManagement.category');
});

Route::get('/update/user', function () {
    return view('Admin.userManagement.update');
});

Route::get('/update/chapters', function () {
    // $course = Course::with(['chapters' => function ($query) {
    //     $query->select(['id', 'tenChuongHoc', 'course_id', 'user_id'])
    //         ->with('lessons');
    // }])->findOrFail(1);

    // $course->instructor;
    // return response()->json(['data' => $course]);
    // 20230506005248
    // http://127.0.0.1:8000/update/chapters

    $reply = Comment::find(1);
    $comments = $reply->replies;

    return response()->json(['data' => $comments]);

});

Route::get('course', function () {
    return view('Admin.userManagement.testkhoa');
});

Route::middleware('adminLogout')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin-login');
    Route::post('/login', [AdminLoginController::class, 'login']);
});
