<?php 
namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Repositories\IRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository implements IRepository {
    
    public function all() {
        
    }
    public function paginate(int $perPage = 10, bool $onlyActive = true) {
        if($onlyActive) {
            return  Product::where('is_active', 1)
                    ->orderByDesc('updated_at')
                    ->paginate($perPage);
        }
        
        return Product::with('images')->with('categories')->with('attributes')
        ->orderByDesc('updated_at')
        ->paginate($perPage);;
    }

    public function find($id) {
        return Product::findOrFail($id);
    }

    public function create($request) {
        $data = $request->all();
        $data['is_active'] = empty($data['is_active']) ? false : true;
        $product = Product::create($data);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $index => $image) {
                $fileName = $product->id . '_' . $index . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(Product::IMAGE_UPLOAD_PATH), $fileName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'name' => $fileName
                ]);
            }
        }
        foreach ($data['categoryIds'] as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $product->categories()->attach($category);
            }
        }

        if($data['attributes'] != null) {
            foreach (json_decode($data['attributes']) as $nameAttribute => $value) {
                $product->attributes()->create([
                    'product_id' => $product->id,
                    'name' => $nameAttribute,
                    'value' => $value
                ]);
            }
        }

    }

    public function update($id, $request) {
        $product = Product::with('images')->findOrFail($id);
        $data = $request->all();
        $data['is_active'] = empty($data['is_active']) ? false : true;

        if($request->hasFile('images')) {
            foreach ($product->images as $image) {
                $filePath = public_path(Product::IMAGE_UPLOAD_PATH . '/' . $image->name);
                if (file_exists($filePath)) unlink($filePath);
                ProductImage::destroy($image->id);
            }
            $images = $request->file('images');
            foreach ($images as $index => $image) {
                $fileName = $product->id . '_' . $index . '_' . time() . '.' .  $image->getClientOriginalExtension();
                $image->move(public_path(Product::IMAGE_UPLOAD_PATH), $fileName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'name' => $fileName
                ]);
            }
        }

        {
            $product->categories()->detach();
            foreach ($data['categoryIds'] as $categoryId) {
                $category = Category::find($categoryId);
                $product->categories()->attach($category);
            }
        }
        ProductAttribute::where('product_id', $id)->delete();
        if($data['attributes'] != null) {
            foreach (json_decode($data['attributes']) as $nameAttribute => $value) {
                $product->attributes()->create([
                    'product_id' => $product->id,
                    'name' => $nameAttribute,
                    'value' => $value
                ]);
            }
        }

        $product->update($data);
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->categories()->detach();

        // Xóa tất cả thuộc tính của sản phẩm 
        ProductAttribute::where('product_id', $id)->delete();
        // Xóa tất cả hình ảnh liên kết với các sản phẩm 
        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $image) {
            $filePath = public_path(Product::IMAGE_UPLOAD_PATH . '/' . $image->name);
            if (file_exists($filePath)) {
                unlink($filePath);
                $image->delete();
            }
        }
        // Xóa sản phẩm
        $product->delete();
    }

    public function search($keyword) {
        return Product::where('is_active', true)
        ->where('name', 'LIKE', '%' . $keyword . '%')
        ->where('is_active', true)
        ->orderByDesc('updated_at')
        ->paginate(15);
    }

    public function searchPrivate($keyword) {
        return Product::
        where('name', 'LIKE', '%' . $keyword . '%')
        ->orderByDesc('updated_at')
        ->paginate(15);
    }

    public function getsuggestProducts($productId) {
        // Lấy ra sản phẩm hiện tại
        $currentProduct = Product::find($productId);

        if (!$currentProduct) {
            // Xử lý trường hợp không tìm thấy sản phẩm
            return [];
        }
        // Lấy ra các danh mục của sản phẩm hiện tại
        $categories = $currentProduct->categories;
        // Lấy ra các sản phẩm thuộc các danh mục của sản phẩm hiện tại
        $suggestedProducts = Product::whereHas('categories', function ($query) use ($categories) {
                                        $query->whereIn('id', $categories->pluck('id'));
                                    })->where('id', '!=', $productId) // Loại trừ sản phẩm hiện tại
                                    ->paginate(10);
        return $suggestedProducts;
    }

    public function getProductsByCategory($categoryId) {
        return Product::whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->paginate(10);
        // $products = Product::whereHas('categories', function ($query) use ($categoryID) {
        //     $query->where('category_id', $categoryID);
        // })->get();
    }
}
