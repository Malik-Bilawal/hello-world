<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\policymodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class policycontroller extends Controller
{
    public function insertpolicy(Request $request)
    {
        $validatedData = $request->validate([
            'policytitle' => 'required|string|max:255',
            'policytxt' => 'required|string',
        ]);

        $policy = new policymodel();
        $policy->policytitle = $request->policytitle;
        $policy->policytxt = $request->policytxt;
        $policy->save();

        return redirect()->back()->with('success', 'Policy added successfully.');
    }

public function editpolicy($id)
{
    $policy = policymodel::findOrFail($id);
    return view('Admin.WebSection.edit-policy', ['policy' => $policy]);
}

    public function updatepolicy(Request $request, $id)
    {
        $policy = policymodel::findOrFail($id);

        $policy->policytitle = $request->input('policytitle');
        $policy->policytxt = $request->input('policytxt');
        $policy->save();

        return redirect()->back()->with('success', 'Policy updated successfully.');
    }

    public function deletepolicy($id)
    {
        $policy = policymodel::findOrFail($id);
        $policy->delete();
        return redirect()->back()->with('success', 'Policy deleted successfully.');
    }

    public function showpoliciesadmin()
    {
        $policies = policymodel::all();
        return view('Admin.WebSection.show-policy', compact('policies'));
    }

    public function showpolicieswebsite()
    {
        $policy = policymodel::all();
        return view('WEBSITE.policy', compact('policy'));
    }

    public function showcustomer(){
        $customer = User::all();
        return view('Admin.customer-list' , compact('customer'));
    }
}
