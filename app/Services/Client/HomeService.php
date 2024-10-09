<?php


namespace App\Services\Client;

use App\Models\Contact;

use App\Models\Products;
use App\Models\Properties;
use App\Models\ProductVariant;

use App\Models\Categories;

class HomeService
{
    public function submitHotline($request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ];

            $dataInsert = Contact::create($data);

            if ($dataInsert) {
                return response()->json(['message' => 'Thành công']);
            } else {
                return response()->json(['message' => 'Lỗi hệ thống vui lòng thử lại sau!']);
            }
        } catch (\Exception $e) {
            // Thông báo lỗi xử lý
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function detailProduct($slug, $id)
    {
        $data = Products::with(['user'])->where('slug', $slug)->first();
        return $data;
    }

    public function getAttributeAjax($request)
    {
        $id = $request->id;
        $data = implode(", ", $id);

        $dataGet = Properties::whereIn('id', $id)->get();

        $stringTitle = '- ';

        foreach ($dataGet as $item) {
            $stringTitle .= $item->name . '- ';
        }

        $ProductVariantData = ProductVariant::where('code', $data)->first();


        $dataResponsive = [
            'titleProduct' => $stringTitle,
            'quantityProduct' => $ProductVariantData->quantity,
            'priceProduct' => $ProductVariantData->price,
            'skuProduct' => $ProductVariantData->sku,
        ];

        return response()->json($dataResponsive);
    }



    public function categoryProduct($slug)
    {
        $category = Categories::where('slug', $slug)->where('status', '0')->first();
        return $category;
    }

    public function productCategories($slug)
    {
        $category = Categories::where('slug', $slug)->where('status', '0')->first();

        if ($category) {
            $products = Products::with(['label'])->where('categories_id', $category->id)->where('status', 0)->get();
        } else {
            $products = collect();
        }
        return response()->json($products);
    }

    public function productArrange($request)
    {
        $categoryId = $request->input('category_id');
        $page = $request->input('page'); // Trang hiện tại, mặc định là trang 1
        $sortOption = $request->input('sort_option'); // Giá trị sắp xếp

        $limit = 10; // Số sản phẩm mỗi trang

        if (!$categoryId) {
            return response()->json(['error' => 'Category ID is required'], 400);
        }
        // Query lấy sản phẩm với phân trang và sắp xếp
        $query = Products::where('categories_id', $categoryId)
            ->where('status', 0);

        // Thêm điều kiện sắp xếp
        switch ($sortOption) {
            case 1:
                $query->orderBy('created_at', 'desc'); // Newest
                break;
            case 2:
                $query->orderBy('price', 'asc'); // Low to high price
                break;
            case 3:
                $query->orderBy('price', 'desc'); // High to low price
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Default to newest
                break;
        }

        // Phân trang với số lượng sản phẩm mỗi trang
        $products = $query->paginate($limit, ['*'], 'page', $page);



        return response()->json($products);
    }

    public function getAllProduct($request)
    {
        $page = $request->input('page'); // Trang hiện tại, mặc định là trang 1
        $sortOption = $request->input('sort_option'); // Giá trị sắp xếp

        $limit = 10; // Số sản phẩm mỗi trang


        // Query lấy sản phẩm với phân trang và sắp xếp
        $query = Products::where('status', 0);

        // Thêm điều kiện sắp xếp
        switch ($sortOption) {
            case 1:
                $query->orderBy('created_at', 'desc'); // Newest
                break;
            case 2:
                $query->orderBy('price', 'asc'); // Low to high price
                break;
            case 3:
                $query->orderBy('price', 'desc'); // High to low price
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Default to newest
                break;
        }

        // Phân trang với số lượng sản phẩm mỗi trang
        $products = $query->paginate($limit, ['*'], 'page', $page);



        return response()->json($products);
    }

    public function searchProductAjax($request){
        dd($request->all());
    }
}
