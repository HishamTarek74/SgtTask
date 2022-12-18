<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    public function topCompaniesRevenue()
    {
        $companies = Company::orderBy('revenue','DESC')->limit(10)->get();

        return CompanyResource::collection($companies);
    }
}
