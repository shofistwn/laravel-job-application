<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Skill;
use App\Models\SkillSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Throwable;

class JobApplicationController extends Controller
{
  public function submitApplication(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'job_id' => 'required|numeric|exists:skills,id',
      'name' => 'required|string',
      'email' => 'required|email|unique:candidates,email',
      'phone' => 'required|numeric|unique:candidates,phone',
      'skills' => 'required|array',
      'skills.*' => 'distinct|exists:skills,id',
      'year' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      return $this->errorResponse('Request validation failed', $validator->errors(), 400);
    }

    try {
      DB::beginTransaction();

      $requestData = $validator->validated();

      $candidate = Candidate::create([
        'job_id' => $requestData['job_id'],
        'name' => $requestData['name'],
        'email' => $requestData['email'],
        'phone' => $requestData['phone'],
        'year' => $requestData['year'],
      ]);

      foreach ($requestData['skills'] as $skill_id) {
        SkillSet::create([
          'candidate_id' => $candidate->id,
          'skill_id' => $skill_id
        ]);
      }

      DB::commit();

      return $this->successResponse('Job application submission successful', []);
    } catch (Throwable $e) {
      DB::rollBack();

      return $this->errorResponse('Job application submission failed', $e->getMessage(), 500);
    }
  }

  public function validateEmail(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|unique:users,email',
    ]);

    if ($validator->fails()) {
      return $this->errorResponse('Email validation failed', $validator->errors(), 400);
    }

    return $this->successResponse('Email validation successful', []);
  }

  public function validatePhone(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'phone' => 'required|numeric|unique:candidates,phone',
    ]);

    if ($validator->fails()) {
      return $this->errorResponse('Phone validation failed', $validator->errors(), 400);
    }

    return $this->successResponse('Phone validation successful', []);
  }

  public function validateSkills(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'skills' => 'required|array',
      'skills.*' => 'distinct|exists:skills,id',
    ]);

    if ($validator->fails()) {
      return $this->errorResponse('Skills validation failed', $validator->errors(), 400);
    }

    return $this->successResponse('Skills validation successful', []);
  }

  public function getSkills()
  {
    $skills = Skill::select('id', 'name')->get();

    return $this->successResponse('List of skills', $skills);
  }

  public function getJobs()
  {
    $jobs = Job::select('id', 'name')->get();

    return $this->successResponse('List of jobs', $jobs);
  }

  public function getYearOfBirth()
  {
    $currentYear = date('Y');
    $startYear = $currentYear - 100;
    $endYear = $currentYear;
    $yearsOfBirth = range($startYear, $endYear);

    return $this->successResponse('List of years of birth', $yearsOfBirth);
  }

  private function successResponse(string $message, $data)
  {
    return response()->json([
      'success' => true,
      'message' => $message,
      'data' => $data
    ]);
  }

  private function errorResponse(string $message, $error, $status_code)
  {
    return response()->json([
      'success' => false,
      'message' => $message,
      'error' => $error
    ], $status_code);
  }
}