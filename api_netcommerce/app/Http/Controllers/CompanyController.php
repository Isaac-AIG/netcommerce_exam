<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies with their tasks and associated users.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $companies = Company::with(['tasks.user'])
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })->get();

            return response()->json([
                'data' => $companies,
                'message' => 'Companies retrieved successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve companies',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
