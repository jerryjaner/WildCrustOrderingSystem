<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Admin\Product\UploadImageTrait;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;

class ProductController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::where('status', 'active')->get();
        return view('admin.product.index', compact('data'));
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
    public function store(ProductStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('product_image')) {
                $validatedData['product_image'] =
                    $this->uploadProductImage($request->file('product_image'), 'products');
            }

            $product = Product::create($validatedData);

            return response()->json([
                'status' => 201,
                'message' => 'Product created successfully',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource records with filtering.
     */
    public function record(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('category_name')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('category_name', 'like', '%'.$request->category_name.'%');
            });
        }

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->get();

        if ($products->count() > 0) {
            $i = 1;
            $output = '<table class="table table-striped table-row-bordered gy-5 gs-7" id="product_record_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($products as $data) {
                $statusLabel = ucwords(str_replace('_', ' ', $data->status));
                $badgeClass = $data->status == 'available' ? 'badge-success' :
                            ($data->status == 'unavailable' ? 'badge-danger' : 'badge-secondary');
                $status = "<span class='badge $badgeClass'>$statusLabel</span>";

                $actionDropdown = '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionMenu'.$data->id.'" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actionMenu'.$data->id.'">
                            <li><a class="dropdown-item product_view" href="#" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#View_Food_Product_Modal"><i class="fas fa-eye me-1"></i>View</a></li>
                            <li><a class="dropdown-item product_edit" href="#" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#Edit_Food_Product_Modal"><i class="fas fa-edit me-1"></i>Edit</a></li>
                            <li><a class="dropdown-item product_delete" href="#" id="'.$data->id.'"><i class="fas fa-trash me-1"></i>Delete</a></li>
                        </ul>
                    </div>
                ';

                $output .= '<tr>
                                <td>'.$i++.'</td>
                                <td><img src="'.asset('storage/'.$data->product_image).'" alt="'.$data->product_name.'" width="50" height="50"></td>
                                <td>'.$data->product_name.'</td>
                                <td>'.$data->category->category_name.'</td>
                                <td>'.$data->description.'</td>
                                <td>'.$data->price.'</td>
                                <td>'.$status.'</td>
                                <td>'.$actionDropdown.'</td>
                            </tr>';
            }

            $output .= '</tbody></table>';
            return response($output);
        }

        return response('<h3 class="text-center text-black mt-5">No record present in the database!</h3>');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category')->find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }
        try {
            $validatedData = $request->validated();

           if ($request->hasFile('product_image')) {
                    $validatedData['product_image'] = $this->updateProductImage($request->file('product_image'), $product->product_image, 'products');
            }
            $product->update($validatedData);

            return response()->json([
                'status' => 200,
                'message' => 'Product updated successfully',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }

        try {
            $this->deleteProductImage($product->product_image, 'products');
            $product->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Product deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete product',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
