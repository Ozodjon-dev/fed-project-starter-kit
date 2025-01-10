<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\ContractCategory;
use Illuminate\Support\Facades\DB;

class ContractCategoriesController extends Controller
{
    public function list()
    {
        $categories = ContractCategory::paginate(10);
        return view('contracts/categories/category-list', compact('categories'));
    }

    public function add()
    {
        return view('contracts/categories/category-add');
    }


    public function store()
    {
        $data = request()->validate([
            'name' => 'required'
        ]);
        ContractCategory::create($data);
        return redirect()->route('contract_categories.list');
    }

    public function show($id)
    {
        $category = ContractCategory::findOrFail($id);
        return view('contracts/categories/category-show', compact('category'));
    }

    public function edit($id)
    {
        $category = ContractCategory::findOrFail($id);
        return view('contracts/categories/category-edit', compact('category',));
    }

    public function update($id)
    {
        $category = ContractCategory::findOrFail($id);
        $data = request()->validate([
            'name' => 'required'
        ]);
        $category->update($data);
        return redirect()->route('contract_categories.show', $id);
    }

    public function destroy($id)
    {
        $category = ContractCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('contract_categories.list');

    }
}

