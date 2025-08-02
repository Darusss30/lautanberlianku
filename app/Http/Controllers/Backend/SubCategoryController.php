<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

    	// Hanya ambil kategori utama: Vehicle dan Sparepart
    	$categories = Category::whereIn('category_name', ['Vehicle', 'Sparepart'])->orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::with('category')->latest()->get();
    	return view('backend.category.subcategory_view',compact('subcategory','categories'));

    }


     public function SubCategoryStore(Request $request){

       $request->validate([
    		'category_id' => 'required',
    		'subcategory_name' => 'required',
    	],[
    		'category_id.required' => 'Pilih ',
    		'subcategory_name.required' => 'Masukkan sub kategori',
    	]);

    	 

	   SubCategory::insert([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
		'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
		 

    	]);

	    $notification = array(
			'message' => 'SubCategory Berhasil Ditambah',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



     public function SubCategoryEdit($id){
    	// Hanya ambil kategori utama: Vehicle dan Sparepart
    	$categories = Category::whereIn('category_name', ['Vehicle', 'Sparepart'])->orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }


    public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
		'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
		 

    	]);

	    $notification = array(
			'message' => 'SubCategory Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }  // end method



    public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'SubCategory Berhasil Di Hapus',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

 
     public function GetSubCategory($category_id){

     	$subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
     	return json_encode($subcat);
     }

    // Specific Sub Category Views
    public function BodyKitView(){
        $subcategory = SubCategory::whereHas('category', function($query) {
            $query->where('category_name', 'LIKE', '%Body Kit%');
        })->latest()->get();
        return view('backend.category.bodykit_view', compact('subcategory'));
    }

    public function PartEngineView(){
        $subcategory = SubCategory::whereHas('category', function($query) {
            $query->where('category_name', 'LIKE', '%Part Engine%');
        })->latest()->get();
        return view('backend.category.partengine_view', compact('subcategory'));
    }

    public function TiresView(){
        $subcategory = SubCategory::whereHas('category', function($query) {
            $query->where('category_name', 'LIKE', '%Tires%');
        })->latest()->get();
        return view('backend.category.tires_view', compact('subcategory'));
    }

    public function OilView(){
        $subcategory = SubCategory::whereHas('category', function($query) {
            $query->where('category_name', 'LIKE', '%Oil%');
        })->latest()->get();
        return view('backend.category.oil_view', compact('subcategory'));
    }

    public function PartLawasView(){
        $subcategory = SubCategory::whereHas('category', function($query) {
            $query->where('category_name', 'LIKE', '%Part Lawas%');
        })->latest()->get();
        return view('backend.category.partlawas_view', compact('subcategory'));
    }


}
