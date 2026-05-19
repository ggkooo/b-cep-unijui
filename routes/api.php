<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\DocumentItemController;
use App\Http\Controllers\Api\DocumentSectionController;
use App\Http\Controllers\Api\GuidanceExampleController;
use App\Http\Controllers\Api\GuidancePointController;
use App\Http\Controllers\Api\GuidanceSectionController;
use App\Http\Controllers\Api\MeetingScheduleController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\NormativeItemController;
use App\Http\Controllers\Api\NormativeSectionController;
use App\Http\Controllers\Api\ServiceHourController;
use App\Http\Controllers\Api\TrainingMaterialController;
use App\Http\Controllers\Api\TrainingTopicController;
use App\Http\Controllers\Api\TutorialController;
use App\Http\Controllers\Api\TutorialFaqController;
use App\Http\Controllers\Api\TutorialVideoController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => response()->json([
    'status' => 'ok',
    'timestamp' => now()->toISOString(),
]));

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/members', [MemberController::class, 'index']);
Route::get('/normative-sections', [NormativeSectionController::class, 'index']);
Route::get('/document-sections', [DocumentSectionController::class, 'index']);
Route::get('/meeting-schedules', [MeetingScheduleController::class, 'index']);
Route::get('/service-hours', [ServiceHourController::class, 'index']);
Route::get('/training-topics', [TrainingTopicController::class, 'index']);
Route::get('/training-materials', [TrainingMaterialController::class, 'index']);
Route::get('/tutorials', [TutorialController::class, 'index']);
Route::get('/tutorial-videos', [TutorialVideoController::class, 'index']);
Route::get('/tutorial-faqs', [TutorialFaqController::class, 'index']);
Route::get('/guidance-sections', [GuidanceSectionController::class, 'index']);
Route::get('/contact-info', [ContactInfoController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/members', [MemberController::class, 'store']);
    Route::put('/members/{id}', [MemberController::class, 'update']);
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);
    Route::patch('/members/reorder', [MemberController::class, 'reorder']);

    Route::post('/normative-sections', [NormativeSectionController::class, 'store']);
    Route::put('/normative-sections/{id}', [NormativeSectionController::class, 'update']);
    Route::delete('/normative-sections/{id}', [NormativeSectionController::class, 'destroy']);
    Route::patch('/normative-sections/reorder', [NormativeSectionController::class, 'reorder']);
    Route::post('/normative-sections/{section}/items', [NormativeItemController::class, 'storeForSection']);
    Route::put('/normative-items/{id}', [NormativeItemController::class, 'update']);
    Route::delete('/normative-items/{id}', [NormativeItemController::class, 'destroy']);
    Route::patch('/normative-items/reorder', [NormativeItemController::class, 'reorder']);

    Route::post('/document-sections', [DocumentSectionController::class, 'store']);
    Route::put('/document-sections/{id}', [DocumentSectionController::class, 'update']);
    Route::delete('/document-sections/{id}', [DocumentSectionController::class, 'destroy']);
    Route::post('/document-sections/{section}/items', [DocumentItemController::class, 'storeForSection']);
    Route::put('/document-items/{id}', [DocumentItemController::class, 'update']);
    Route::delete('/document-items/{id}', [DocumentItemController::class, 'destroy']);

    Route::post('/meeting-schedules', [MeetingScheduleController::class, 'store']);
    Route::put('/meeting-schedules/{id}', [MeetingScheduleController::class, 'update']);
    Route::delete('/meeting-schedules/{id}', [MeetingScheduleController::class, 'destroy']);

    Route::post('/service-hours', [ServiceHourController::class, 'store']);
    Route::put('/service-hours/{id}', [ServiceHourController::class, 'update']);
    Route::delete('/service-hours/{id}', [ServiceHourController::class, 'destroy']);

    Route::post('/training-topics', [TrainingTopicController::class, 'store']);
    Route::put('/training-topics/{id}', [TrainingTopicController::class, 'update']);
    Route::delete('/training-topics/{id}', [TrainingTopicController::class, 'destroy']);
    Route::post('/training-materials', [TrainingMaterialController::class, 'store']);
    Route::put('/training-materials/{id}', [TrainingMaterialController::class, 'update']);
    Route::delete('/training-materials/{id}', [TrainingMaterialController::class, 'destroy']);

    Route::post('/tutorials', [TutorialController::class, 'store']);
    Route::put('/tutorials/{id}', [TutorialController::class, 'update']);
    Route::delete('/tutorials/{id}', [TutorialController::class, 'destroy']);
    Route::post('/tutorial-videos', [TutorialVideoController::class, 'store']);
    Route::put('/tutorial-videos/{id}', [TutorialVideoController::class, 'update']);
    Route::delete('/tutorial-videos/{id}', [TutorialVideoController::class, 'destroy']);
    Route::post('/tutorial-faqs', [TutorialFaqController::class, 'store']);
    Route::put('/tutorial-faqs/{id}', [TutorialFaqController::class, 'update']);
    Route::delete('/tutorial-faqs/{id}', [TutorialFaqController::class, 'destroy']);

    Route::post('/guidance-sections', [GuidanceSectionController::class, 'store']);
    Route::put('/guidance-sections/{id}', [GuidanceSectionController::class, 'update']);
    Route::delete('/guidance-sections/{id}', [GuidanceSectionController::class, 'destroy']);
    Route::post('/guidance-sections/{section}/points', [GuidancePointController::class, 'storeForSection']);
    Route::put('/guidance-points/{id}', [GuidancePointController::class, 'update']);
    Route::delete('/guidance-points/{id}', [GuidancePointController::class, 'destroy']);
    Route::post('/guidance-sections/{section}/examples', [GuidanceExampleController::class, 'storeForSection']);
    Route::put('/guidance-examples/{id}', [GuidanceExampleController::class, 'update']);
    Route::delete('/guidance-examples/{id}', [GuidanceExampleController::class, 'destroy']);

    Route::put('/contact-info', [ContactInfoController::class, 'update']);
});
