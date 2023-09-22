<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function home(Request $request){
        // Lấy giá trị từ form
        $brand = $request->input('xBrand');
        $color = $request->input('xColour');
        $gender = $request->input('gender');
        $searchTerm = $request->input('searchTerm'); // Giá trị tìm kiếm full-text

        $query = Product::query();

        // Thêm điều kiện tìm kiếm full-text với các giá trị từ form
        if ($searchTerm) {
            $query->where(function($q) use ($searchTerm, $brand, $color, $gender) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('title', 'LIKE', "%{$searchTerm}%");

                // Nếu muốn so sánh với các giá trị $brand, $color, $gender
                if ($brand) {
                    $q->orWhere('brand', 'LIKE', "%{$brand}%");
                }

                if ($color) {
                    $q->orWhere('color', 'LIKE', "%{$color}%");
                }

                if ($gender) {
                    $q->orWhere('gender', 'LIKE', "%{$gender}%");
                }
            });
        }

        // Xử lý tùy chọn sắp xếp
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    // Xử lý mặc định hoặc lựa chọn không hợp lệ
            }
        }

        $products = $query->get();
        $totalProducts = count($products);

        return view ('web.home.home',compact('products','totalProducts'));
    }

    public function getProduct(){
        $products = Product::paginate(10);
//        $users = User::all();
          $cat_id=DB::table('category')->get();

//        return view('web.product.index',compact('products','cat_id'));
        return view('admin.home.home',compact('products','cat_id'));

    }

    public function createProduct (){
        $cat_id=DB::table('category')->get();
        $brands_id=DB::table('brands')->get();

        return view('admin.product.create',compact('cat_id','brands_id'));

    }
    public function storeProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file ảnh
            'detail' => 'required',
            'description' => 'required',
            'cat_id' => 'required|exists:category,cat_id', // Kiểm tra xem cat_id tồn tại trong bảng category
            'brand_id' => 'required|exists:brands,brand_id',
        ]);

        $imgPath = null; // Khởi tạo đường dẫn ảnh

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name_file = $file->getClientOriginalName();

            // Thêm chuỗi ngẫu nhiên vào tên tệp ảnh
            $randomString = Str::random(5);
            $name_with_random = $randomString . "-" . $name_file;

            // Lưu tệp ảnh vào thư mục 'image' với tên đã thêm chuỗi ngẫu nhiên
            $path = $file->move('image', $name_with_random);
            // Lấy đường dẫn tương đối với tên đã thêm chuỗi ngẫu nhiên
            $imgPath = 'image/' . $name_with_random;

        }

        // Lưu sản phẩm với đường dẫn ảnh trong cơ sở dữ liệu
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'img' => $imgPath,
            'detail' => $request->input('detail'),
            'description' => $request->input('description'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        return redirect()->route('admin.home.create-product')->with('success', 'Tạo sản phẩm thành công.');
    }


    public function editProduct($id){
        $product = Product::find($id);
        $cat_id=DB::table('category')->get();
        $brands_id=DB::table('brands')->get();
        return view('admin.product.edit',compact('product','cat_id','brands_id'));
    }
    public function updateProduct(Request $request,$id){
        $product = Product::find($id);

        if($request->hasFile('img')){
            //xoa hinh cu
            if(file_exists($product->img)){
                unlink($product->img);
            }
            //Luu hinh anh moi vao thu muc 'image'
            $file = $request->file('img');
            $name_file = $file ->getClientOriginalName();
            $randomString = Str::random(5);
            $name_with_random = $randomString . "-" . $name_file;
            $path = $file->move('image',$name_with_random);

            $product->img = 'image/' .$name_with_random;
        }

        // Cập nhật các trường thông tin khác
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->detail = $request->input('detail');
        $product->description = $request->input('description');
        $product->cat_id = $request->input('cat_id');
        $product->brand_id = $request->input('brand_id');

        // Lưu thông tin sản phẩm
        $product->save();

        return redirect()->route('admin.home.edit-product',$id)->with('success','Update successfull');
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        //Lấy đường dẫn hình ảnh
        $imgPath =public_path($product->img);
//        dd($imgPath);

        if(file_exists($imgPath)){
            unlink($imgPath);
        }
        $product->delete();
        return redirect()->route('admin.home.get-product')->with('success','Delete successfull');
    }

    public function  detailProduct($id){
        $product = Product::find($id);
        return view('web.home.detailProduct',compact('product'));
    }

    public function search (Request $request){
        $search = $request->input('search');

        $products = Product::where('name','like',"%$search%")
            ->orWhere('description','like','%$search%')
            ->get();
        return view('web.home.searchProduct',compact('products'));
    }
}
