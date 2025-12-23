<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStore;
use App\Http\Requests\Admin\Category\CategoryUpdate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStore $request)
    {
        // Validation is already handled by the Store request class

        // You can access validated data like this
        $validatedData = $request->validated();

        // Here you would typically create the category in the database
         Category::create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Category created successfully',
        ]);
    }
    /**
     * Display the specified resource records with filtering.
     */
    public function record(Request $request)
    {
        $query = Category::query();

        if ($request->filled('name')) {
            $query->where('category_name', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $categories = $query->get();

        if ($categories->count() > 0) {
            $i = 1;
            $output = '<table class="table table-striped table-row-bordered gy-5 gs-7" id="category_record_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($categories as $data) {
                $statusLabel = ucwords(str_replace('_', ' ', $data->status));
                $badgeClass = $data->status == 'active' ? 'badge-success' :
                            ($data->status == 'inactive' ? 'badge-danger' : 'badge-secondary');
                $status = "<span class='badge $badgeClass'>$statusLabel</span>";

                // Dropdown for actions
                $actionDropdown = '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionMenu'.$data->id.'" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actionMenu'.$data->id.'">
                            <li><a class="dropdown-item category_view" href="#" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#View_Category_Modal"><i class="fas fa-eye me-1"></i>View</a></li>
                            <li><a class="dropdown-item category_edit" href="#" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#Edit_Category_Modal"><i class="fas fa-edit me-1"></i>Edit</a></li>
                            <li><a class="dropdown-item category_delete" href="#" id="'.$data->id.'"><i class="fas fa-trash me-1"></i>Delete</a></li>
                        </ul>
                    </div>
                ';

                $output .= '<tr>
                                <td>'.$i++.'</td>
                                <td>'.$data->category_name.'</td>
                                <td>'.$data->description.'</td>
                                <td>'.$status.'</td>
                                <td>'.$actionDropdown.'</td>
                            </tr>';
            }

            $output .= '</tbody></table>';
            return response($output);
        }

        return response('<h1 class="text-center text-black mt-5">No record present in the database!</h1>');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::findorFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::findorFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdate $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Category updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Category deleted successfully',
        ]);
    }
}
