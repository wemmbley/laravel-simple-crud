<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
    public function store(CompanyStoreRequest $request)
    {
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filePath = $file->store('public');
            $filePath = explode(DIRECTORY_SEPARATOR, $filePath);
        }

        Company::insert([
            'name' => $request->input('name'),
            'logo' => $filePath[1],
            'website' => $request->input('website'),
            'email' => $request->input('email'),
        ]);

        return $this->index();
    }

    public function index()
    {
        $companies = Company::query()
            ->select('id', 'name', 'logo', 'website', 'email')
            ->paginate(10);

        return view('companies', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company-add');
    }

    public function edit(int $employeeId)
    {
        $company = Company::query()
            ->where('id', $employeeId)
            ->select('id', 'name', 'logo', 'website', 'email')
            ->first();

        return view('company-add', ['companyEdit' => $company]);
    }

    public function update(int $employeeId, Request $request)
    {
        Company::query()
            ->where('id', $employeeId)
            ->update($request->except(['_method', '_token']));

        return $this->index();
    }

    public function destroy(int $employeeId)
    {
        Company::query()
            ->where('id', $employeeId)
            ->delete();

        return $this->index();
    }
}
