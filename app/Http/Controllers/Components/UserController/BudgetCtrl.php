<?php

namespace App\Http\Controllers\Components\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Budgets;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Status;
use App\Models\User;

class BudgetCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = Budgets::all();
        $groupedBudgets = $budgets->groupBy('budget_department');

        $departments = Department::all();

        return view('dashboard.user.budget.index', compact('groupedBudgets', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($department_code = null)
    {
        $departments = Department::all();
        $categories = Categories::all();
        // $statuses = Status::all();
        // $users = User::all();

        return view('dashboard.user.budget.create', compact('department_code', 'departments', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'budget_name' => 'required|string|max:255|unique:budgets,budget_name',
            'budget_department' => 'required|string|max:255',
            'budget_amount' => 'required|string|max:255',
            'budget_category' => 'required|string|max:255',
            'budget_startDate' => 'required',
            'budget_endDate' => 'required',
            'budget_description' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $budget = Budgets::create([
            'budget_name' => $request->input('budget_name'),
            'budget_department' => $request->input('budget_department'),
            'budget_amount' => $request->input('budget_amount'),
            'budget_category' => $request->input('budget_category'),
            'budget_startDate' => date('Y-m-d', strtotime($request->input('budget_startDate'))),
            'budget_endDate' => date('Y-m-d', strtotime($request->input('budget_endDate'))),
            'budget_description' => $request->input('budget_description'),
            'budget_type' => 'T1',
            'budget_status' => 'S2',
        ]);

        return redirect()->route('user.budget.show', $budget['budget_department'])->with('success', 'Budget added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($department_code = null)
    {

        $users = User::all();
        $statuses = Status::all();
        $categories = Categories::all();

        $budgets = Budgets::where('budget_department', $department_code)->get();

        return view('dashboard.user.budget.show', compact('department_code', 'budgets', 'users', 'statuses', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $budgets = Budgets::findOrFail($id);
        $departments = Department::all();
        $categories = Categories::all();

        return view('dashboard.user.budget.edit', compact('budgets', 'departments', 'categories',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'budget_name' => 'required|string|max:255|unique:budgets,budget_name,' . $id,
            'budget_department' => 'required|string|max:255',
            'budget_amount' => 'required|string|max:255',
            'budget_category' => 'required|string|max:255',
            'budget_startDate' => 'required',
            'budget_endDate' => 'required',
            'budget_description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $budget = Budgets::find($id);

        if ($budget) {
            $budget->update([
                'budget_name' => $request->input('budget_name'),
                'budget_department' => $request->input('budget_department'),
                'budget_amount' => $request->input('budget_amount'),
                'budget_category' => $request->input('budget_category'),
                'budget_startDate' => date('Y-m-d', strtotime($request->input('budget_startDate'))),
                'budget_endDate' => date('Y-m-d', strtotime($request->input('budget_endDate'))),
                'budget_description' => $request->input('budget_description'),
                'budget_type' => 'T1',
            ]);
        }

        return redirect()->route('user.budget.show', $budget->budget_department)->with('success', 'Budget updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $budget = Budgets::findOrFail($id);

        $budget->delete();

        return redirect()->route('user.budget.show', $budget->budget_department)->with('success', 'Budget deleted successfully');
    }

    /**
     * Search the specified dataresource from storage.
     */
    public function search(Request $request, $department_code = null)
    {
        $data = $request->input('search');
        $users = User::all();
        $statuses = Status::all();
        $categories = Categories::all();


        if (is_null($department_code)) {
            $budgets = Budgets::where('id', 'like', '%' . $data . '%')->get();
        } else {

            $budgets = Budgets::where('budget_department', $department_code)
                ->where(function ($query) use ($data) {
                    $query->orWhere('budget_name', 'like', '%' . $data . '%')
                        ->orWhere('budget_amount', 'like', '%' . $data . '%')
                        ->orWhere('budget_description', 'like', '%' . $data . '%')
                        ->orWhere('budget_category', 'like', '%' . $data . '%')
                        ->orWhere('budget_startDate', 'like', '%' . $data . '%')
                        ->orWhere('budget_endDate', 'like', '%' . $data . '%')
                        ->orWhere('budget_status', 'like', '%' . $data . '%')
                        ->orWhere('budget_approvedBy', 'like', '%' . $data . '%')
                        ->orWhere('budget_approvedDate', 'like', '%' . $data . '%')
                        ->orWhere('budget_approvedAmount', 'like', '%' . $data . '%')
                        ->orWhere('budget_notes', 'like', '%' . $data . '%');
                })->get();
        }

        if ($budgets->isEmpty() && !is_null($department_code)) {

            return view('dashboard.user.user.budget.show', compact('department_code'))->with('error', 'No matching records found.');
        }

        return view('dashboard.user.user.budget.show', compact('budgets', 'department_code', 'users', 'statuses', 'categories'));
    }
}