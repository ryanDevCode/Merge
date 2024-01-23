<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function userDashboard()
    {
        return view('dashboard.user.dashboard');
    }

    public function adminDashboard()
    {
        return view('dashboard.admin.dashboard');
    }

    public function developerDashboard()
    {
        return view('dashboard.developer.dashboard');
    }

    public function developerBudget()
    {
        $budgets = Budget::all();
        return view('dashboard.developer.budgets.index', compact('budgets'));
    }

    public function developerBudgetShow($bp_department)
    {

        $budgets = Budget::where('bp_department', $bp_department)->get();

        return view('dashboard.developer.budgets.show', compact('bp_department', 'budgets'));
    }

    public function developerBudgetSearch(Request $request, $bp_department = null)
    {
        $data = $request->input('search');

        // If bp_department is not provided, get all budgets
        if (is_null($bp_department)) {
            $budgets = Budget::where('bp_id', 'like', '%' . $data . '%')->get();
        } else {
            // If bp_department is provided, filter budgets by department
            $budgets = Budget::where('bp_department', $bp_department)
                ->where(function ($query) use ($data) {
                    $query->orWhere('bp_name', 'like', '%' . $data . '%')
                        ->orWhere('bp_amount', 'like', '%' . $data . '%')
                        ->orWhere('bp_description', 'like', '%' . $data . '%')
                        ->orWhere('bp_category', 'like', '%' . $data . '%')
                        ->orWhere('bp_startDate', 'like', '%' . $data . '%')
                        ->orWhere('bp_endDate', 'like', '%' . $data . '%')
                        ->orWhere('bp_actualSpending', 'like', '%' . $data . '%')
                        ->orWhere('bp_variance', 'like', '%' . $data . '%')
                        ->orWhere('bp_varianceReason', 'like', '%' . $data . '%')
                        ->orWhere('bp_approvalStatus', 'like', '%' . $data . '%')
                        ->orWhere('bp_approverName', 'like', '%' . $data . '%')
                        ->orWhere('bp_approvedDate', 'like', '%' . $data . '%')
                        ->orWhere('bp_approvedAmount', 'like', '%' . $data . '%')
                        ->orWhere('bp_notes', 'like', '%' . $data . '%');
                })->get();
        }

        if ($budgets->isEmpty() && !is_null($bp_department)) {
            // If bp_department is provided, but search data is not found, return the view with an error message
            return view('dashboard.developer.budgets.show', compact('bp_department'))->with('error', 'No matching records found.');
        }

        // Return the view with the budgets and bp_department
        return view('dashboard.developer.budgets.show', compact('budgets', 'bp_department'));
    }


    public function developerBudgetDestroy(string $bp_id)
    {
        $budget = Budget::findOrFail($bp_id);
        $bp_department = $budget->bp_department; // Retrieve the 'bp_department' value from the deleted budget
        $budget->delete();

        // If there are remaining budgets, redirect to the 'developer.budgets.show' route with success message
        return redirect()->route('developer.budgets.show', ['bp_department' => $bp_department])
            ->with('success', 'Budget deleted successfully');
    }

    public function developerBudgetCreate($bp_department = null)
    {
        $departments = Department::all();
        $users = User::all();
        // dd($users);
        return view('dashboard.developer.budgets.create ', compact('bp_department', 'departments', 'users'));
    }

    public function developerBudgetStore(Request $request)
    {
        $requestData = $request->all();

        // Formatting dates before inserting into the database
        $requestData['bp_startDate'] = date('Y-m-d', strtotime($request->input('bp_startDate')));
        $requestData['bp_endDate'] = date('Y-m-d', strtotime($request->input('bp_endDate')));
        $requestData['bp_approvedDate'] = date('Y-m-d', strtotime($request->input('bp_approvedDate')));

        // dd($requestData);
        // Creating a new budget record
        Budget::create($requestData);

        // Redirect to the show page for the department
        return redirect()->route('developer.budgets.show', $requestData['bp_department'])->with('success', 'Budget added successfully');
    }

    public function developerBudgetEdit($bp_department = null, string $bp_id)
    {

        $budget = Budget::findOrFail($bp_id);
        $departments = Department::all();
        $users = User::all();
        return view('dashboard.developer.budgets.edit', compact('budget', 'users', 'departments', 'bp_department'));
    }
    public function developerBudgetUpdate(Request $request, $bp_department = null, string $bp_id)
    {
        $budget = Budget::findOrFail($bp_id);

        // Extracting all request data
        $requestData = $request->all();

        // Formatting dates before updating the database
        $requestData['bp_startDate'] = date('Y-m-d', strtotime($request->input('bp_startDate')));
        $requestData['bp_endDate'] = date('Y-m-d', strtotime($request->input('bp_endDate')));
        $requestData['bp_approvedDate'] = date('Y-m-d', strtotime($request->input('bp_approvedDate')));

        // Update the budget record
        $budget->update($requestData);

        return redirect()->route('developer.budgets.show', compact('budget', 'bp_department'))->with('success', 'Budget updated successfully');
    }
}
