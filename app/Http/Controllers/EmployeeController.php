<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EmployeeController extends BaseController
{
    public function store(EmployeeStoreRequest $request)
    {
        Employee::insert([
            $request->except(['_method', '_token'])
        ]);

        return $this->index();
    }

    public function index()
    {
        $employees = Employee::query()
            ->select('id', 'first_name', 'last_name', 'company_id', 'email', 'phone')
            ->paginate(10);

        return view('employees', ['employees' => $employees]);
    }

    public function destroy(int $employeeId)
    {
        Employee::query()
            ->where('id', $employeeId)
            ->delete();

        return $this->index();
    }

    public function create()
    {
        return view('employee-add');
    }

    public function edit(int $employeeId)
    {
        $employee = Employee::query()
            ->where('id', $employeeId)
            ->select('id', 'first_name', 'last_name', 'company_id', 'email', 'phone')
            ->first();

        return view('employee-add', ['employeeEdit' => $employee]);
    }

    public function update(int $employeeId, Request $request)
    {
        Employee::query()
            ->where('id', $employeeId)
            ->update($request->except(['_method', '_token']));

        return $this->index();
    }
}
