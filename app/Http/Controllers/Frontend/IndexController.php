<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg; 
use Illuminate\Support\Facades\Hash;
use App\Models\BlogPost;
use App\Models\SubCategory;
 
class IndexController extends Controller
{
    public function index(){
    	$blogpost = BlogPost::latest()->get();
    	$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
    	$sliders = Slider::where('status',1)->orderBy('id','ASC')->limit(4)->get();
    	$categories = Category::orderBy('category_name','ASC')->get();

    	$new_arrival = Product::where('status',1)->where('new_arrival',1)->orderBy('id','DESC')->limit(6)->get();
    	$new_product = Product::where('status',1)->where('new_product',1)->orderBy('id','DESC')->limit(6)->get();
    	$best_seller = Product::where('status',1)->where('best_seller',1)->orderBy('id','DESC')->limit(10)->get();
    	$product_promo = Product::where('status',1)->where('product_promo',1)->where('product_discount','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    	return view('frontend.index',compact('categories','sliders','products','new_arrival','best_seller','product_promo','new_product','blogpost'));

    }


    public function UserLogout(){
    	Auth::logout();
    	return Redirect()->route('login');
    }


    public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user'));
    }



    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->post_code = $request->post_code;
		$data->address = $request->address;
 

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profil Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);

    } // end method 


    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }
 

    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method

 

	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_seat;
		$product_seat = explode(',', $size);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color','product_seat','relatedProduct'));

	}



	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}


  // Subcategory wise data
	public function SubCatWiseProduct(Request $request, $subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();


		///  Load More Product with Ajax 
		if ($request->ajax()) {
   $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

   $list_view = view('frontend.product.list_view_product',compact('products'))->render();
	return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	

		}
		///  End Load More Product with Ajax 

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));

	}

    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_seat;
		$product_seat = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_seat,

		));

	} // end method 

 // Product Seach 
	public function ProductSearch(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name','ASC')->get();
		$products = Product::where('product_name','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));

	} // end method 


	///// Advance Search Options 

	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;		 
        
		$products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id','product_slug')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));



	} // end method 

	// Vehicle Page - Using new structure
	public function VehiclesPage(){
		$vehicleCategory = Category::where('category_name', 'Vehicle')->first();
		$vehicleSubCategories = collect();
		$vehicleProducts = collect();
		
		if ($vehicleCategory) {
			$vehicleSubCategories = SubCategory::where('category_id', $vehicleCategory->id)
				->orderBy('subcategory_name','ASC')
				->get();
			// Filter products with VH product code only
			$vehicleProducts = Product::with(['brand', 'category'])
				->where('category_id', $vehicleCategory->id)
				->where('product_code', 'LIKE', 'VH%')
				->where('status', 1)
				->orderBy('id','DESC')
				->limit(12)
				->get();
		}
		
		return view('frontend.vehicles.index', compact('vehicleCategory', 'vehicleSubCategories', 'vehicleProducts'));
	}

	// Sparepart Page - Using new structure
	public function SparepartsPage(){
		$sparepartCategory = Category::where('category_name', 'Sparepart')->first();
		$sparepartSubCategories = collect();
		$sparepartProducts = collect();
		
		if ($sparepartCategory) {
			$sparepartSubCategories = SubCategory::where('category_id', $sparepartCategory->id)
				->orderByRaw("FIELD(subcategory_name, 'Interior', 'Body Kit', 'Part Engine', 'Tires', 'Oil', 'Part Lawas')")
				->get();
			// Filter products with SP product code only
			$sparepartProducts = Product::with(['brand', 'category'])
				->where('category_id', $sparepartCategory->id)
				->where('product_code', 'LIKE', 'SP%')
				->where('status', 1)
				->orderBy('id','DESC')
				->limit(12)
				->get();
		}
		
		return view('frontend.spareparts.index', compact('sparepartCategory', 'sparepartSubCategories', 'sparepartProducts'));
	}

	// Category Vehicles
	public function CategoryVehicles($id, $slug){
		$category = Category::findOrFail($id);
		// Filter products with VH product code only
		$products = Product::where('category_id', $id)
			->where('product_code', 'LIKE', 'VH%')
			->where('status', 1)
			->orderBy('id','DESC')
			->paginate(12);
		$vehicleSubCategories = SubCategory::where('category_id', $id)->orderBy('subcategory_name','ASC')->get();
		
		return view('frontend.vehicles.category', compact('category', 'products', 'vehicleSubCategories'));
	}

	// Category Spareparts
	public function CategorySpareparts($id, $slug){
		$category = Category::findOrFail($id);
		// Filter products with SP product code only
		$products = Product::where('category_id', $id)
			->where('product_code', 'LIKE', 'SP%')
			->where('status', 1)
			->orderBy('id','DESC')
			->paginate(12);
		$sparepartSubCategories = SubCategory::where('category_id', $id)
			->orderByRaw("FIELD(subcategory_name, 'Interior', 'Body Kit', 'Part Engine', 'Tires', 'Oil', 'Part Lawas')")
			->get();
		
		return view('frontend.spareparts.category', compact('category', 'products', 'sparepartSubCategories'));
	}


}
