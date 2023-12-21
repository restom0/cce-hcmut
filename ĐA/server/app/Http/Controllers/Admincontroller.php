<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;

class Admincontroller extends Controller
{

    public function getLoginAdmin()
    {
        return view("admin.dangnhap");
    }
    public function postLoginAdmin(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email', 'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => "chưa nhập địa chỉ mail",

                'email.email' => "Địa chỉ mail không đúng định dạng", 'password.required' => 'Chưa nhập mật khẩu', 'password.min' => 'mật khẩu tối thiểu 6 ký tự', 'password.max' => 'mật khẩu tối đa 20 ký tự'
            ]
        );
        $chungthuc = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($chungthuc)) {
            return redirect("admin/lietkedonhang");
        } else {
            return redirect()->back()->with(['matb' => '0', 'noidung' => 'Đăng nhập thất bại']);
        }
    }
    public function getProducttype()
    {
        if (Auth::check()) {
            $loai_sp = ProductType::paginate(5);
            return view("admin.danhsachloai", compact("loai_sp"));
        } else {
            return view("admin.dangnhap");
        }
    }
    public function getAddProducttype()
    {
        if (Auth::check()) {
            return view("admin.themloaisanpham");
        } else {
            return view("admin.dangnhap");
        }
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect("admin/index");
    }

    public function getUserInfo()
    {
        if (Auth::check()) {
            return view("admin.thongtin");
        }
        return redirect("admin/index");
    }
    function getdsUser()
    {
        $users = User::all();
        return view('admin.danhsachnguoidung', compact('users'));
    }
    function getThemUser()
    {

        return view('admin.themnguoidung');
    }

    function postThemUser(Request $req)
    {
        $req->validate([
            "fullname" => "required",
            "email" => "required email",

            "pass1" => "required min:6",
            "pass2" => "same:pass1",

            "phone" => "required numeric",

            "address" => "required"

        ], [
            "fullname.required" => "Vui lòng nhập họ và tên người dùng",
            "email.required" => "Vui lòng nhập email người dùng",
            "pass1.required" => "Vui lòng nhập password",
            "pass1.min" => "Mật khẩu phải nhiều hơn 6 chữ cái",
            "phone.numeric" => "Số điện thoại không đúng",
            "address.required" => "Vui lòng nhập địa chỉ người dùng",

            "pass2.same" => "Mật khẩu nhập lại không khớp",
            "phone.required" => "Vui lòng nhập số điện thoại",

        ]);
        $user = new User();

        $user->full_name = $req['fullname'];
        $user->email = $req['email'];

        $user->password = $req['pass2'];
        $user->phone = $req["phone"];

        $user->address = $req["address"];

        $user->save();
        return redirect()->back()->with('thongbao', 'Thêm người dùng thành công');
    }

    function getSuaUser($id)
    {
        $user = User::find($id);

        return view('admin.suanguoidung', compact('user'));
    }
    function postSuaUser(Request $req)
    {

        $req->validate([

            "fullname" => "required",
            "email" => "required email",

            "pass1" => "required min:6",
            "pass2" => "same: pass1",

            "phone" => "required numeric",

            "address" => "required"

        ], [
            "fullname.required" => "Vui lòng nhập họ và tên người dùng",
            "email.required" => "Vui lòng nhập email người dùng",
            "pass2.same" => "Mật khẩu nhập lại không khớp",
            "phone.numeric" => "Số điện thoại không đúng",
            "address.required" => "Vui lòng nhập địa chỉ người dùng",
            "pass1.required" => "Vui lòng nhập password",
            "pass1.min" => "Mật khẩu phải nhiều hơn 6 chữ cái",

            "phone.required" => "Vui lòng nhập số điện thoại",

        ]);
        $user = User::find($req->id);

        $user->full_name = $req['fullname'];
        $user->email = $req['email'];
        $user->password = bcrypt($req['pass2']);

        $user->phone = $req["phone"];

        $user->address = $req["address"];

        $user->save();
        return redirect()->back()->with('thongbao', 'Sửa người dùng thành công');
    }

    function xoaUser($id)
    {

        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('thongbao', "Xóa người dùng thành công");
    }



    public function postAddProducttype(Request $req)
    {
        $validateData = $req->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Chưa nhập tên loại sản phẩm',
                'description.required' => 'Chưa nhập mô tả loại sản phẩm',
                'image.required' => 'Chưa chọn hình loại sản phẩm',
                'image.mimes' => 'Chọn tập tin: jpg, png, gif, svg',
            ]
        );

        $filename = $req->file('image')->getClientOriginalName();

        $prot = new ProductType;
        $prot->name = $req->name;
        $prot->description = $req->description;
        $prot->image = $filename;
        $prot->save();

        $path = $req->file('image')->move('image/product', $filename);

        return redirect()->back()->with('thongbao', 'Thêm loại sản phẩm thành công');
    }

    public function getEditProducttype($id)

    {
        if (Auth::check()) {
            $loai_sp = ProductType::find($id);

            return view("admin.sualoaisanpham", compact("loai_sp"));
        } else {
        }
        return view("admin.dangnhap");
    }
    public function postEditProducttype(Request $req, $id)
    {
        $loai_sp = ProductType::find($id);

        $this->validate(
            $req,
            [
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Chưa nhập tên loại sản phẩm',
                'description.required' => 'Chưa nhập mô tả loại sản phẩm',
                'image.required' => 'Chưa chọn hình loại sản phẩm',
                'image.mimes' => 'Chọn tập tin: jpg, png, gif, svg',
            ]
        );

        $filename = $req->file('image')->getClientOriginalName();
        $loai_sp->name = $req->name;
        $loai_sp->description = $req->description;
        $loai_sp->image = $filename;

        $loai_sp->save();
        $path = $req->file('image')->move('image/product', $filename);

        return redirect()->back()->with('thongbao', 'Cập Nhật thành công');
    }

    public function getDeleteProducttype($id)
    {
        $loai_sp = ProductType::find($id);
        $loai_sp->delete();
        return redirect("admin/danhsachloai")->with("thongbao", "Đã xóa thành công");
    }
    public function getBills()
    {
        if (Auth::check()) {
            $donhang = Bill::join('customer', 'customer.id', '=', 'bills.id_customer')->get();
            return view("admin.danhsachdonhang", compact("donhang"));
        } else {
            return view("admin.dangnhap");
        }
    }

    public function getEditBills($id)
    {
        $dhg = Bill::find($id);
        $cus = Customer::find($dhg->id_customer);
        $ct_dhg = Bill_detail::where("id_bill", "=", $dhg->id)
            ->join("products", "products.id", "=", "Bill_detail.id_product")
            ->get(['products.name', 'bill_detail.quantity', 'bill_detail.unit_price']);
        return view("admin.chitietdonhang", compact("dhg", "cus", "ct_dhg"));
    }

    public function postEditBills(Request $req, $id)
    {
        $dhg = Bill::find($id);
        $dhg->state = $req->state;
        $dhg->save();
        return redirect()->back()->with("thongbao", "Đã cập nhật đơn hàng");
    }
    public function getCustomer()
    {

        if (Auth::check()) {
            $customer = Customer::all();
        }
        return view("admin.lienketkhachhang", compact("customer"));
    }

    public function deleteCustomer($id)
    {

        $cusnum = Bill::where("id_customer", "=", $id)->count();
        if ($cusnum == 0) {

            $cus = Customer::find($id);
            $cus->delete();
        }
        return redirect()->back()->with("thongbao", "Đã xóa khách hàng thành công");
    }
    function getDanhSachSanPham()
    {
        $products = Product::with('productType')->paginate(5);
        return view('admin.danhsachsanpham', compact('products'));
    }
    function getThemSanPham()
    {
        $type_pro = ProductType::all();
        return view('admin.themsanpham', compact('type_pro'));
    }
    function postThemSanPham(Request $req)
    {
        // Validation rules
        $req->validate([
            'namePro' => 'required',
            'loaisp' => 'required',
            'price' => 'required|numeric|min:1000',
            'unit' => 'required',
            'rdoStatus' => 'required',
            'des' => 'sometimes',
            'fImages' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:2048', // Validation for image added
        ], [
            // Custom error messages
            'namePro.required' => 'Vui lòng nhập tên sản phẩm',
            'loaisp.required' => 'Vui lòng chọn loại sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm không được chứa ký tự',
            'price.min' => 'Giá sản phẩm phải lớn hơn 1000 đồng',
            'unit.required' => 'Vui lòng nhập đơn vị tính',
            'rdoStatus.required' => 'Vui lòng chọn tình trạng sản phẩm',
        ]);

        // Create a new Product instance
        $pro = new Product();

        // Assign data from the request to the model attributes
        $pro->name = $req->input('namePro');
        $pro->id_type = $req->input('loaisp');
        $pro->description = $req->input('des', ''); // Use default value if 'des' is not present
        $pro->unit_price = $req->input('price');
        $pro->promotion_price = $req->input('pro_price', 0); // Use default value if 'pro_price' is not present
        $pro->unit = $req->input('unit');
        $pro->new = $req->input('rdoStatus');

        // Handle file upload
        if ($req->hasFile('fImages')) {
            $file = $req->file('fImages');

            // Validate file extension
            $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
            $duoi = $file->getClientOriginalExtension();
            if (!in_array($duoi, $allowedExtensions)) {
                return redirect('admin/product/themsanpham')->with('loi', 'Bạn chỉ được thêm file có đuôi jpg, png, jpeg, webp');
            }

            // Generate a unique filename and move the file to the desired directory
            $name = $file->getClientOriginalName();
            $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;

            while (file_exists('image/product/' . $hinh)) {
                $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            }

            $file->move('image/product/', $hinh);

            // Assign the filename to the 'image' attribute
            $pro->image = $hinh;
        } else {
            $pro->image = ""; // Set default value if no file is uploaded
        }

        // Save the product to the database
        $pro->save();

        // Redirect back with a success message
        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }
    function getSuaSanpham($id)
    {
        $product = Product::find($id);
        $type_pro = ProductType::all();
        return view('admin.suasanpham', compact('product', 'type_pro'));
    }
    function postSuaSanpham(Request $req)
    {
        $req->validate([
            "namePro" => "required",
            "loaisp" => "required",
            "price" => "required|numeric|min:1000",
            "unit" => "required",
        ], [
            "namePro.required" => "Vui lòng nhập tên sản phẩm",
            "loaisp.required" => "Vui lòng chọn loại sản phẩm",
            "price.required" => "Vui lòng thêm đơn giá",
            "price.numeric" => "Đơn giá không hợp lệ",
            "price.min" => "Đơn giá không nhỏ hơn 1000",
            "unit.required" => "Vui lòng nhập đơn vị tính",
        ]);

        // Find the product by ID
        $product = Product::find($req->id);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('loi', 'Sản phẩm không tồn tại');
        }

        // Update product details
        $product->name = $req->input("namePro");
        $product->unit_price = $req->input("price");
        $product->promotion_price = $req->input("pro_price", 0);
        $product->new = $req->input("rdoStatus", 0); // Assuming a default value of 0 if 'rdoStatus' is not present

        // Check if the request has a file
        if ($req->hasFile('fImages')) {
            $file = $req->file('fImages');

            // Validate file extension
            $duoi = $file->getClientOriginalExtension();
            $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
            if (!in_array($duoi, $allowedExtensions)) {
                return redirect()->back()->with('loi', 'Bạn chỉ được thêm file có đuôi jpg, png, jpeg, webp');
            }

            // Generate a unique filename and move the file to the desired directory
            $name = $file->getClientOriginalName();
            $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;

            while (file_exists('image/product/' . $hinh)) {
                $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            }

            $file->move('image/product/', $hinh);

            // Assign the filename to the 'image' attribute
            $product->image = $hinh;
        }

        // Save the updated product details
        $product->save();

        return redirect()->back()->with('thongbao', 'Sửa sản phẩm thành công');
    }
    function xoaSanPham($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        return redirect()->back()->with('thongbao', "Xóa Sản phẩm thành công");
    }
    function getdsSlide()
    {
        $slides = Slide::all();
        return view('admin.danhsachslide', compact('slides'));
    }

    function getThemSlide()
    {
        return view('admin.themslide');
    }
    function postThemSlide(Request $req)
    {

        $slide = new Slide();
        if ($req->hasFile('fImages')) {

            $file = $req->file('fImages');
            $duoi = $file->getClientOriginalExtension();

            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp') {

                return redirect('admin/slide/themslide')->with('loi', 'Bạn chỉ được
                                                                                                                                                                              thêm file có đuôi jpg,png, jpeg,webp');
            }
            $name = $file->getClientOriginalName();

            $hinh = "slide" . random_int(0, 9) . "_" . $name;
            while (file_exists('image/slide/' . $hinh)) {
                $hinh = "slide" . random_int(0, 9) . "_" . $name;
            };
            $file->move('image/slide/', $hinh);
            $slide->image = $hinh;
        } else {
            return redirect('admin/slide/themslide')->with('loi', 'Bạn phải thêm hình');
        };
        $slide->updated_at = date("Y-m-d H:i:s");

        $slide->created_at = date("Y-m-d H:i:s");
        $slide->link = $req["link"] != null ? $req["link"] : "";

        $slide->save();
        return redirect()->back()->with('thongbao', 'Thêm Silde Thành công');
    }
    function getSuaSlide($id)
    {
        $slide = Slide::find($id);

        return view('admin.suaslide', compact('slide'));
    }
    function postSuaSlide(Request $req)
    {

        $slide = Slide::find($req->id);
        if ($req->hasFile('fImages')) {
            $file = $req->file('fImages');


            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp') {
                return redirect('admin/product/themsanpham')->with('loi', 'Bạn chỉ được
                                                                                   | thêm file có đuôi jpg, png, jpeg, webp');
            }
            $name = $file->getClientOriginalName();
            $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;

            while (file_exists('image/slide/' . $hinh)) {
                $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            };
            $file->move('image/slide/', $hinh);

            $slide->image = $hinh;
        } else {
            return redirect('admin/product/themsanpham')->with('loi', 'Bạn phải thêm hình');
        };
        $slide->updated_at = date("Y-m-d H:i:s");

        $slide->link = $req["link"] != null ? $req["link"] : "";
        $slide->save();

        return redirect()->back()->with('thongbao', 'Sửa Silde Thành công');
    }

    function xoaSlide($id)
    {
        $slide = Slide::find($id);

        $slide->delete();

        return redirect()->back()->with('thongbao', 'Xóa Silde Thành công');
    }
}
