<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    
	public function AddProduct(){
		$categories = Category::latest()->get();
		$subcategories = SubCategory::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories', 'subcategories', 'brands'));

	}


	public function StoreProduct(Request $request){

        // Validate required fields
        $request->validate([
            'product_name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exisœts:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'product_qty' => 'required|numeric|min:0',
            'product_price' => 'required|numeric|min:0',
            'product_tags' => 'required',
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
            'product_thambnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'multi_img.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Auto-generate product code if empty
        $product_code = $request->product_code;
        if (empty($product_code)) {
            $product_code = $this->generateProductCodeInternal($request->category_id);
        }
 
        $image = $request->product_thambnail;
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(800, null, function ($constraint) {
    		$constraint->aspectRatio();
    		$constraint->upsize();
    	})->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
      	'product_code' => $product_code,

      	'product_qty' => $request->product_qty,
      	'product_weight' => $request->product_weight ?: 0,
      	'product_tags' => $request->product_tags,
		'product_transmission' => $request->product_transmission,
      	'product_fuel_type' => $request->product_fuel_type,
      	'product_engine' => $request->product_engine,
      	'product_seat' => $request->product_seat,
      	'product_color' => $request->product_color,

      	'product_price' => $request->product_price,
      	'product_discount' => $request->product_discount,
      	'product_short_desc' => $request->product_short_desc,
      	'product_long_desc' => $request->product_long_desc,

      	'product_promo' => $request->product_promo,
      	'new_product' => $request->new_product,
      	'new_arrival' => $request->new_arrival,
      	'best_seller' => $request->best_seller,

      	'product_thambnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);


      ////////// Multiple Image Upload Start ///////////

      $images = $request->file('multi_img');
      foreach ($images as $img) {
    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(800, null, function ($constraint) {
    		$constraint->aspectRatio();
    		$constraint->upsize();
    	})->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::insert([

    		'product_id' => $product_id,
    		'photo_name' => $uploadPath,
    		'created_at' => Carbon::now(), 

    	]);

      }

      ////////// Een Multiple Image Upload Start ///////////


       $notification = array(
			'message' => 'Produk Berhasil Ditambah',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);


	} // end method



	public function ManageProduct(){

		$products = Product::latest()->get();
		return view('backend.product.product_view',compact('products'));
	}


	public function EditProduct($id){

		$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','products','multiImgs'));

	}


	public function ProductDataUpdate(Request $request)
	{
		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_weight' => $request->product_weight ?: 0,
      	'product_tags' => $request->product_tags,
      	'product_transmission' => $request->product_transmission,
      	'product_fuel_type' => $request->product_fuel_type,
      	'product_engine' => $request->product_engine,
      	'product_seat' => $request->product_seat,
      	'product_color' => $request->product_color,

      	'product_price' => $request->product_price,
      	'product_discount' => $request->product_discount,
      	'product_short_desc' => $request->product_short_desc,
      	'product_long_desc' => $request->product_long_desc,

      	'product_promo' => $request->product_promo,
      	'new_product' => $request->new_product,
      	'new_arrival' => $request->new_arrival, 
			'best_seller' => $request->best_seller,     	 
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);

          $notification = array(
			'message' => 'Product Berhasil Diperbarui Tanpa Gambar',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);


	} // end method 


/// Multiple Image Update
	public function MultiImageUpdate(Request $request){
		// Update existing images
		if($request->multi_img) {
			$imgs = $request->multi_img;

			foreach ($imgs as $id => $img) {
		    $imgDel = MultiImg::findOrFail($id);
		    unlink($imgDel->photo_name);
		     
	    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
	    	Image::make($img)->resize(800, null, function ($constraint) {
	    		$constraint->aspectRatio();
	    		$constraint->upsize();
	    	})->save('upload/products/multi-image/'.$make_name);
	    	$uploadPath = 'upload/products/multi-image/'.$make_name;

	    	MultiImg::where('id',$id)->update([
	    		'photo_name' => $uploadPath,
	    		'updated_at' => Carbon::now(),

	    	]);

		 } // end foreach
		}

		// Add new images to gallery
		if($request->new_multi_img) {
			$product_id = $request->product_id;

			$new_images = $request->file('new_multi_img');
			foreach ($new_images as $img) {
		    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
		    	Image::make($img)->resize(800, null, function ($constraint) {
		    		$constraint->aspectRatio();
		    		$constraint->upsize();
		    	})->save('upload/products/multi-image/'.$make_name);
		    	$uploadPath = 'upload/products/multi-image/'.$make_name;

		    	MultiImg::insert([
		    		'product_id' => $product_id,
		    		'photo_name' => $uploadPath,
		    		'created_at' => Carbon::now(),
		    	]);
		    }
		}

       $notification = array(
			'message' => 'Galeri Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod


 /// Product Main Thambnail Update /// 
 public function ThambnailImageUpdate(Request $request){
 	$pro_id = $request->id;
 	$oldImage = $request->old_img;
 	unlink($oldImage);

    $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(800, null, function ($constraint) {
    		$constraint->aspectRatio();
    		$constraint->upsize();
    	})->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

         $notification = array(
			'message' => 'Produk Thumbnail Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

     } // end method


 //// Multi Image Delete ////
     public function MultiImageDelete($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	$notification = array(
			'message' => 'Produk Galeri Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method 



     public function ProductInactive($id){
     	Product::findOrFail($id)->update(['status' => 0]);
     	$notification = array(
			'message' => 'Produk Non Aktif',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }


  public function ProductActive($id){
  	Product::findOrFail($id)->update(['status' => 1]);
     	$notification = array(
			'message' => 'Produk Aktif',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     	
     }



     public function ProductDelete($id){
     	$product = Product::findOrFail($id);
     	unlink($product->product_thambnail);
     	Product::findOrFail($id)->delete();

     	$images = MultiImg::where('product_id',$id)->get();
     	foreach ($images as $img) {
     		unlink($img->photo_name);
     		MultiImg::where('product_id',$id)->delete();
     	}

     	$notification = array(
			'message' => 'Produk Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     }// end method 



  // product Stock 
public function ProductStock(){

    $products = Product::latest()->get();
    return view('backend.product.product_stock',compact('products'));
  }

  // AJAX method for generating product code
  public function generateProductCode(Request $request)
  {
      $categoryId = $request->category_id;
      
      if (!$categoryId) {
          return response()->json(['error' => 'Category ID is required'], 400);
      }
      
      $code = $this->generateProductCodeInternal($categoryId);
      
      return response()->json(['product_code' => $code]);
  }

  // Generate product code based on category (internal method)
  private function generateProductCodeInternal($category_id) {
      $prefix = 'PR'; // Default prefix
      
      if ($category_id) {
          $category = Category::find($category_id);
          if ($category) {
              $categoryName = strtolower($category->category_name);
              
              // Check if it's a vehicle category
              if (strpos($categoryName, 'vehicle') !== false || 
                  strpos($categoryName, 'mobil') !== false || 
                  strpos($categoryName, 'motor') !== false) {
                  $prefix = 'VH';
              } 
              // Check if it's a sparepart category
              else if (strpos($categoryName, 'sparepart') !== false || 
                       strpos($categoryName, 'part') !== false || 
                       strpos($categoryName, 'suku cadang') !== false) {
                  $prefix = 'SP';
              }
          }
      }
      
      // Get all existing numbers for this prefix
      $existingNumbers = Product::where('product_code', 'LIKE', $prefix . '%')
          ->get()
          ->map(function($product) use ($prefix) {
              // Extract the number part from the code
              $code = $product->product_code;
              $numberPart = substr($code, strlen($prefix));
              
              // Check if it's a valid 3-digit number
              if (preg_match('/^\d{3}$/', $numberPart)) {
                  return (int) $numberPart;
              }
              return 0;
          })
          ->filter(function($number) {
              return $number > 0; // Only valid numbers
          })
          ->sort()
          ->values()
          ->toArray();
      
      // Find the first gap in the sequence, starting from 1
      $nextNumber = 1;
      
      if (!empty($existingNumbers)) {
          // Check each number starting from 1 to find the first gap
          foreach (range(1, max($existingNumbers) + 1) as $number) {
              if (!in_array($number, $existingNumbers)) {
                  $nextNumber = $number;
                  break;
              }
          }
      }
      
      // Generate the code with 3-digit padding
      $productCode = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
      
      return $productCode;
  }


}
