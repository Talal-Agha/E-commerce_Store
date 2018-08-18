<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\subCategories;
use App\products;
use App\Http\Controllers\SubCategoriesController;

class CategoriesController extends Controller
{
    public function index(){
    	$categories = categories::latest()->get();
        return view('layouts.admin.categories',compact('categories'));
    }

     public function indexUsers($categoryName){
        $categories = categories::where("categoryName",$categoryName)->pluck('categoryId')->first();
        $subCategories = SubCategoriesController::getSubForNav($categories);
        $arratOfSubcategories = subCategories::where('categoryId',$categories)->pluck('subCategoryId');
        $products = products::whereIn('category',$arratOfSubcategories)->where("available","!=",0)->orderBy('sale_price', 'desc')->get();
        return view('layouts.subas.pages.categories',compact('categoryName','subCategories','products','categories'));
    }

    public function getSubCategoriesForModel(){
        $main = categories::get();
        return json_encode($main);
    }

    public function showAddCategory(){
	    $categories = categories::get();
        return view('layouts.admin.addcategory',compact('categories'));
    }
    public function EditCategory($id){
        $categorie = categories::where('categoryId','=',$id)->get();
        if($categorie->count()){
        return view('layouts.admin.editcategory',compact('categorie'));
     }
        return back();
    }
        public function loadEditCategory(Request $request){
            $id = request("categoryId");
        $categorie = categories::where('categoryId','=',$id)->get();
        if($categorie->count()){
        return $categorie;
     }else{
        return "0";
    }
    }

    public function deleteEditCategory(Request $request){
            $id = request("categoryId");
        $categorie = categories::where('categoryId','=',$id)->limit(1)->delete();
        if($categorie){
        return "1";
     }else{
        return "0";
    }
    }

    public function addCategory(Request $request){

    	$this->validate(request(),[
        'categoryName' => 'required|min:2',
           ]);
    	$id = uniqid();

    	if($request->has('parentCategory')){
           subCategories::create([
            'categoryId'=> $request->input('parentCategory'),
            'subCategoryId'=>$id,
            'subCategoryName'=>$request->input('categoryName')
         ]);
    	}else{
    	categories::create([
            'categoryId'=> $id,
            'categoryName'=>$request->input('categoryName')
         ]);
  
    	}
return redirect()->route('adminMainCategories');
    }

    public function getSubCategories($name){

    $categories = categories::where('categoryName',$name);
    $getId = $categories->pluck('categoryId');
    $getDetail = $categories->get();
    $subCategories = subCategories::where('categoryId',$getId)->get();
    return view('layouts.pages.categoryDetails',compact('getDetail','subCategories'));

}

public function searchCategory(Request $request){

return $request->search.$request->from;
}

public static function forSubCategories($id){
$subCategories = subCategories::where('categoryId',$id)->get();
return $subCategories;
}

public static function subCategoriesProducts($id){
$productsCount = products::where('category',"=",$id)->count();
return $productsCount;
}
  public function updateGridView(){
     $subCategories = subCategories::where('categoryId',request("categoryId"))->pluck("subCategoryId");
      $products = products::where("available","!=",0)->orderBy('sale_price', 'desc');
      if(request("filterId") != null){
       $products= $products->whereIn('category',request("filterId"))->get();
      }else{
        $products=  $products->whereIn('category',$subCategories)->get();
      }
    if(count($products)){
        echo'<center>Total Products '.count($products).'</center>';
     foreach($products as $recentProduct){
       echo view('layouts.subas.elements.product-box',compact("recentProduct"));
      }
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }

    public function updateListView(){
      $subCategories = subCategories::where('categoryId',request("categoryId"))->pluck("subCategoryId");
      $products = products::where("available","!=",0)->orderBy('sale_price', 'desc');
      if(request("filterId") != null){
       $products=  $products->whereIn('category',request("filterId"))->get();
      }else{
        $products= $products->whereIn('category',$subCategories)->get();
      }
    if(count($products)){
        echo'<center>Total Products '.count($products).'</center>';
foreach($products as $recentProduct){
 echo view('layouts.subas.elements.product-list-box',compact("recentProduct"));
}
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }
}
