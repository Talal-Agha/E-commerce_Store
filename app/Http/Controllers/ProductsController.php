<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\subCategories;
use App\productImages;
use App\brands;
use App\Tags;
use App\filters;
use App\productFilter;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\FiltersController;
use Illuminate\Support\Facades\Log;
use DB;

class ProductsController extends Controller
{
  //ALL THE ADMIN FUNCTIONS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 
    public function index(){
        $products = products::select('products.*','brands.brandName','sub_categories.subCategoryName')
            ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
            ->leftJoin('sub_categories', 'products.category', '=', 'sub_categories.subCategoryId')->latest()->take(50)->get();
        return view('layouts.admin.products', compact('products'));
    }

    public function showAddProduct(){
        $subCategories = subCategories::all();
        $brands = brands::all();
        return view('layouts.admin.addproduct', compact('subCategories','brands'));
    }
    public function addNewPrduct(){
     $product = $this->validate(request(),[
            "name" => 'required|string',
            "description" => 'required|string',
            "features" => '',
            "price" => 'required',
            "sale_status" => 'integer',
            "sale_price" => 'required',
            "upc" => 'required|unique:products,upc',
            "available" => 'integer',
            "sku" =>'required|unique:products,sku',
            "quantity" => 'required',
            "checkForUpdates" => 'integer',
            "category" => 'required',
            "brand" => 'required',
            "thumbnail" => 'required|url',
        ]);
     $product["sale_status"] = (null !== request('sale_status')) ? 1 : 0 ;
     $product["available"] = (null !== request('available')) ? 1 : 0 ;
     $product["checkForUpdates"] = (null !== request('checkForUpdates')) ? 1 : 0 ;
     $product["product_id"]=$product["sku"];
     $product["author"]=auth()->guard('nonAdldap')->user()->email;
        if (Products::create($product)) {
          if(null !== request('productImages')){
          foreach (request('productImages') as $productImage) {
            productImages::create([
             'product_id'=> $product["product_id"],
             'productImages'=> $productImage
            ]);
            }
          }
         if(null !== request('productTags')){
          foreach (request('productTags') as $productTag) {
            Tags::create([
             'product_Id'=> $product["product_id"],
             'tagName'=> $productTag
            ]);
            }
          }
         Session()->flash('message', "Product Sucessfully Added with Id#".$product["product_id"]);
        } else {
          Session()->flash('error', "Error Adding Product Id#".$product["product_id"]);
        }
        return back();
    }
    public function deleteProduct($id){
        $product = products::where('product_id',"=", $id)->delete();
        if(!$product){
        Session()->flash('error', "Unable to Delete Product with Id#".$id);
        return back();
        }
        productImages::where('product_id',"=", $id)->delete();
        Tags::where('product_Id',"=", $id)->delete();
        Session()->flash('message', "Product Sucessfully Delete with Id#".$id);
        return back();
    }

    public function editProduct($id){
        $productData = products::where('product_id',"=", $id);
        if($productData->count()){
          $productData = $productData
            ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
            ->leftJoin('sub_categories', 'products.category', '=', 'sub_categories.subCategoryId')
            ->leftJoin('filters', 'products.filter', '=', 'filters.filter_Id')
            ->get()->first();
            $tags = Tags::where('product_id',"=", $id)->get();
        $productImages = productImages::where('product_id', $id)->get();
        return view('layouts.admin.editproduct', compact('productData', 'productImages','tags'));          
        }else{
          return back();
        }

    }
    public function updateProduct(){
 if(null === request('productId') &&  request('productId') == null){
  Session()->flash('error', "Error Accoured Please Try Again");
        return back(); 
 }
      $saleStatus = (null !== request('sale_status')) ? 1 : 0 ;
      $availability= (null !== request('available')) ? 1 : 0 ;
      $checkForUpdates= (null !== request('checkForUpdates')) ? 1 : 0 ;
      $productData = products::where('product_id','=', request('productId'))->limit(1)
        ->update([
           'name'=> request('productName'),
           'description'=> request('productDescription'),
           'features'=> request('productFeatures'),
           'price'=> request('productPrice'),
           'sale_status'=> $saleStatus,
           'sale_price'=> request('productSalePrice'),
           'category'=> request('category'),
           'brand'=>request('brand'),
           'sku'=> request('productSKUNo'),
           'upc'=> request('productUPCNo'),
           'quantity'=>request('productQuantity'),
           'available'=>$availability,
           'checkForUpdates'=>$checkForUpdates,
           'author'=> auth()->guard('nonAdldap')->user()->email
       ]); 
       if($productData){
        productImages::where('product_id',"=", request('productId'))->delete();
        if(null !== request('productImages') && request('productImages') != null ){
        foreach(request('productImages') as $productfilename){
          productImages::create([
           'product_id'=> request('productId'),
           'productImages'=> $productfilename
            ]); 
        }
      }
      if(null !== request('productTags') && request('productTags') != null ){
         Tags::where('product_id','=', request('productId'))->delete();
          foreach(request('productTags')  as $tagName){
         Tags::create([
           'product_Id'=> request('productId'),
           'tagName'=> $tagName
         ]);
        }

      }
        Session()->flash('message', "Product id #".request('productId')."  Sucessfully Updated");
        return back(); 
     }else{
        Session()->flash('error', "Product id #".request('productId')."  Not Sucessfully Updated");
        return back(); 
     }
    }
    public function searchProductAdmin(){
       $mainQuery= products::where('name','LIKE','%'.request("search").'%');
       switch (request("category")) {
         case 'notSet':
         $allIdOfCategory = subCategories::pluck("subCategoryId");
$mainQuery = $mainQuery->whereNotIn('category',$allIdOfCategory);
           break;
           case 'all':
           break;
         default:
        $mainQuery = $mainQuery->where('category','=',request("category"));
           break;
       }
      switch (request("filter")) {
         case 'notSet':
        $productIds =  productFilter::pluck("product_Id");
        $mainQuery = $mainQuery->whereNotIn('product_Id',$productIds);
           break;
           case 'all':
           break;
         default:
        $productIds =  productFilter::where('filter_id',request("filter"))->pluck("product_Id");
        $mainQuery = $mainQuery->whereIn('product_Id',$productIds);
           break;
       }
       switch (request("brand")) {
         case 'notSet':
  $allIdOfBrands = brands::pluck("brand_id");
  $mainQuery = $mainQuery->whereNotIn('brand',$allIdOfBrands);
           break;
           case 'all':
           break;
         default:
        $mainQuery = $mainQuery->where('brand','=',request("brand"));
           break;
       }
    if (count($mainQuery->get())) {
      echo'<center><h4>'.count($mainQuery->get()).' Search Reasults Found</h4></center>';
           $mainQuery = $mainQuery
           ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
            ->leftJoin('sub_categories', 'products.category', '=', 'sub_categories.subCategoryId')
           ->get();
            echo '<table class="table table-hover table-bordered">
            <thead>';
            echo view("layouts.admin.elements.product-search-table-header")->render();
            $forSearch= 1;
           foreach ($mainQuery as $productData){
         echo view("layouts.admin.elements.product-search-table-row",compact("productData",'forSearch'))->render();
           }
           echo '</table></thread>';
          }else{
            return '<center><h1>0 SearchResults Found</h1></center>';
           }
    }
public function totalErrorsCounter(){
  $allIdOfCategory = subCategories::pluck("subCategoryId");
  $allIdOfFilter = productFilter::pluck("product_Id");
  $allIdOfBrands = brands::pluck("brand_id");
  $totalProducts = products::count();               
$filterCount =products::whereNotIn('product_id',$allIdOfFilter)->count(); 
$brandsCount = products::whereNotIn('brand',$allIdOfBrands)->count();
$categoryCount = products::whereNotIn('category',$allIdOfCategory)->count();
$respone=array("totalProducts"=>$totalProducts,
"filterCount"=>$filterCount,
"brandCount"=>$brandsCount,
"categoryCount"=>$categoryCount);
return json_encode($respone);
}
public function updateProductsTabelWithGoogleMerchant(){
$i = 0;
$return = array();
$data = request("mydata");
$nextPageToken["nextPageToken"] = null;
$decodeData = json_decode($data,true);
switch (json_last_error()) {
        case JSON_ERROR_NONE:
        break;
        case JSON_ERROR_DEPTH:
        Log::info('-Maximum stack depth exceeded');
             $respone["response"] ='-Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
        Log::info('-Underflow or the modes mismatch');
            $respone["response"] = '-Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
        Log::info('-Unexpected control character found');
             $respone["response"] ='-Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
        Log::info('-Syntax error, malformed JSON');
            $respone["response"] ='-Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
        Log::info('-Malformed UTF-8 characters, possibly incorrectly encoded');
            $respone["response"] = '-Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
        Log::info('-Unknown error');
            $respone["response"] = '-Unknown error';
        break;}
    if(array_key_exists('nextPageToken', $decodeData)){
      $return['nextPage']=$decodeData["nextPageToken"];
  }
foreach($decodeData['resources'] as $response){
  $sku=$response['offerId'];
  $upc=$response['gtin'];
  $imageLink=$response['imageLink'];
  $description=$response['description'];
  $title=$response['title'];
  $priceValue=$response['price']['value'];
  $priceCurrency=$response['price']['currency'];  
  $productCategory=$response['googleProductCategory'];
  $brand=$response['brand'];
  $condition=$response['condition'];
  $availability=$response['availability'];
  $shippingWeightValue=(array_key_exists('shippingWeight', $response)) ? $response['shippingWeight']['value'] : null;
  $shippingWeightUnit=(array_key_exists('shippingWeight', $response)) ? $response['shippingWeight']['unit'] : null;
  $shippingLengthValue = (array_key_exists('shippingLength', $response)) ? $response['shippingLength']['value'] : null;
  $shippingLengthUnit = (array_key_exists('shippingLength', $response)) ? $response['shippingLength']['unit'] : null;
  $shippingWidthValue = (array_key_exists('shippingWidth', $response)) ? $response['shippingWidth']['value'] : null;
  $shippingWidthUnit = (array_key_exists('shippingWidth', $response)) ? $response['shippingWidth']['unit'] : null;
  $shippingHeightValue = (array_key_exists('shippingHeight', $response)) ? $response['shippingHeight']['value'] : null;
  $shippingHeightUnit = (array_key_exists('shippingHeight', $response)) ? $response['shippingHeight']['unit'] : null;
  if(array_key_exists('additionalImageLinks', $response)){
    $additionalImageLinks = $response['additionalImageLinks'];
  }
  $productQuery = products::where('product_id','=',$sku);
  if($productQuery->exists()){
    $productQuery->limit(1)->update([
           'name'=> $title,
           'thumbnail'=> $imageLink,
           'description'=> $description,
           'price'=> $priceValue,
           'upc'=> $upc,
           'availability'=>$availability,
           'productCondition'=>$condition,
           'currency'=>$priceCurrency,
           'heightValue'=>$shippingHeightValue,
           'heightUnit'=>$shippingHeightUnit,
           'lenthValue'=>$shippingLengthValue,
           'lenthUnit'=>$shippingLengthUnit,
           'weightValue'=>$shippingWeightValue,
           'weightUnit'=>$shippingWeightUnit,
           'widthValue'=>$shippingWidthValue,
           'widthUnit'=>$shippingWidthUnit,
           'author'=> auth()->guard('nonAdldap')->user()->email,
           'updated_at' => date("Y-m-d h:i:s")
        ]);
        $respone["response"] = 'Product '.$sku.' values updated';
  }else{
   $addProductQuery = products::create([
           'product_id'=> $sku,
           'name'=> $title,
           'thumbnail'=> $imageLink,
           'description'=> $description,
           'price'=> $priceValue,
           'sku'=> $sku,
           'upc'=> $upc,
           'filter'=>0,
           'availability'=>$availability,
           'productCondition'=>$condition,
           'currency'=>$priceCurrency,
           'heightValue'=>$shippingHeightValue,
           'heightUnit'=>$shippingHeightUnit,
           'lenthValue'=>$shippingLengthValue,
           'lenthUnit'=>$shippingLengthUnit,
           'weightValue'=>$shippingWeightValue,
           'weightUnit'=>$shippingWeightUnit,
           'widthValue'=>$shippingWidthValue,
           'widthUnit'=>$shippingWidthUnit,
           'author'=> auth()->guard('nonAdldap')->user()->email,
           'created_at' => date("Y-m-d h:i:s"),
           'updated_at' => date("Y-m-d h:i:s")
            ]);
   if ($addProductQuery){
    $respone["response"] ='Product '.$sku.' added in database';      
    if(isset($additionalImageLinks) && $additionalImageLinks != null){
      foreach($additionalImageLinks as $additionalImageLink){
       productImages::create([
           'product_id'=> $sku,
           'productImages'=> $additionalImageLink,
           'created_at' => date("Y-m-d h:i:s"),
           'updated_at' => date("Y-m-d h:i:s")
            ]);
   }
   }
 $i++;
}
}}
echo json_encode($return);
}
    public function quickEditProducts(){
      $this->validate(request(),[
        'productsIds' => 'required',
       ]);
       $returnMessage = null;

if(request("newcategory") != "notSet"){
      $categoryStatus= products::whereIn('product_id',request("productsIds"))  
        ->update([
           'category'=> request("newcategory"),
           'author'=>auth()->guard('nonAdldap')->user()->email
       ]);  
 if(!$categoryStatus){
$returnMessage = $returnMessage." <Products Categories Not Sucessfully Updated> ";
}else{
 $returnMessage = $returnMessage." <Products Categories Sucessfully Updated> ";
}
}

if(request("newBrand") != "notSet"){
  $brandStatus=  products::whereIn('product_id',request("productsIds"))  
     ->update([
           'brand'=> request("newBrand"),
           'author'=> auth()->guard('nonAdldap')->user()->email
       ]);  
if(!$brandStatus){
$returnMessage = $returnMessage." <Products Brands Not Sucessfully Updated> ";
}else{
$returnMessage = $returnMessage." <Products Brands Sucessfully Updated> ";
}
}

if(request("newfilter") != "notSet"){
  foreach (request("productsIds") as $productId) {
    $main = productFilter::where('product_id',$productId)
    ->where('filter_id',request("newfilter"));
if(!$main->count()){
$filterStatus = productFilter::create([
           'product_id'=>$productId,
           'filter_id'=> request("newfilter")
       ]); 
}
}
$returnMessage = $returnMessage." <Products Filters Sucessfully Updated> ";
}

 Session()->flash('message', $returnMessage);
    return back();
}
    public function liveService()
    {
      $mainQuery = products::where("quantity","<=",request("lessCount"));
      if(count($mainQuery)){
            echo'<center><h4>'.count($mainQuery->get()).' Search Reasults Found</h4></center>';
           $mainQuery = $mainQuery
           ->limit(request("showProducts"))
           ->leftJoin('brands', 'products.brand', '=', 'brands.brand_id')
            ->leftJoin('sub_categories', 'products.category', '=', 'sub_categories.subCategoryId')
           ->get();
            echo '<table class="table table-hover table-bordered">
            <thead>';
            echo view("layouts.admin.elements.product-search-table-header")->render();
           foreach ($mainQuery as $productData){
         echo view("layouts.admin.elements.product-search-table-row",compact("productData"))->render();
           }
           echo '</table></thread>';
          }else{
            return '<center><h1>0 SearchResults Found</h1></center>';
           }
    }
// ALL THE USERS SIDE FUNCTIONS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function userHomePage(){
      return view('layouts.subas.pages.index');
    }
    
    public function searchForProducts(){
       $this->validate(request(),[
        'searchFor' => 'required|min:2',
       ]);
      $name= "Search";
      $searchFor = request('searchFor');
      $productQuerysku = products::where('product_id','=', $searchFor)->where("available","!=",0);
      if($productQuerysku->count()){
        $products = $productQuerysku->get();
        return view('layouts.subas.pages.search',compact('products','name'));
      }
      $fromTags = Tags::where("tagName",'LIKE','%'.$searchFor.'%')->pluck("product_id");
      $products = products::
      where('name','like', '%'.$searchFor.'%')
      ->orwhereIn('product_id',$fromTags)
      ->where("available",1)
      ->where("sale_status",1)
      ->orderBy('sale_price', 'desc')
      ->get();
      return view('layouts.subas.pages.search',compact('products','name','searchFor'));
    }

    public function showProductDetail($id){
        $productQuery = products::where('product_id', $id);
        $brand = $productQuery->pluck('brand');
        $relatedProducts = products::where('brand',$brand)->inRandomOrder()->take(6)->get();
        $productData = $productQuery->get()->first();
        $productImages = productImages::where('product_id', $id)->get();
        return view('layouts.subas.pages.single-product-no-sidebar', compact('productData', 'productImages','relatedProducts'));
      }

    public function loadQuickView(){
       $product =  products::where('product_id', request("productId"))->get()->first();
       return view('layouts.subas.elements.quick-view-content',compact("product","price"));
     }


  public function updateGridView(){
      $products = products::where('category',request("subCategoryId"))->where("available","!=",0);
    if(null != request("filterId")){
      $filters = productFilter::whereIn('filter_id',request("filterId"))->pluck('product_Id');
      $products = $products->whereIn('product_id',$filters);
    }
    if($products->count()){
      $products = $products->orderBy('sale_price', 'desc')->get();
     $this->updateGridViewLayout($products);
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }

    public function updateListView(){
    $products = products::select("product_id","thumbnail","name","brand","sale_status","price","sale_price","description")->where('category',request("subCategoryId"))->where("available","!=",0);
    if(null != request("filterId")){
      $filters = productFilter::whereIn('filter_id',request("filterId"))->pluck('product_Id');
      $products = $products->whereIn('product_id',$filters);
    }

    if($products->count()){
      $products = $products->orderBy('sale_price', 'desc')->get();
$this->updateListViewLayout($products);
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }

  public function updateGridViewBrand(){
    $products = products::where('category',request("subCategoryId"))->where("available","!=",0)->orderBy('sale_price', 'desc');
    if(null != request("filterId")){
      $products = $products->whereIn('brand',request("filterId"));
    }
    $products = $products->orderBy('sale_price', 'desc')->get();
    if(count($products)){
      
     $this->updateGridViewLayout($products);
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }

   public function updateListViewBrand(){
    $products = products::where('category',request("subCategoryId"))->where("available","!=",0);
    if(null != request("filterId")){
      $products = $products->whereIn('brand',request("filterId"));
    }
    if(count($products)){
      $products = $products->orderBy('sale_price', 'desc')->get();
$this->updateListViewLayout($products);
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }


   public function updateGridViewLayout($products){
      foreach($products as $recentProduct){
       echo view('layouts.subas.elements.product-box',compact("recentProduct"));
      }
}  

public function updateListViewLayout($products){
foreach($products as $recentProduct){
 echo view('layouts.subas.elements.product-list-box',compact("recentProduct"));
}
  }
  public function chkWithSku(){
if (request("sku")) {
  $product = products::where("product_id","=",request("sku"))->get();
      if(count($product)){
         return "true";
      }else{
        return "false";
      }
    }
  }
}
