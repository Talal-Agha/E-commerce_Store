@extends('layouts.admin.layout')
@section('Maincontent')
@php
$subcategories = \App\Http\Controllers\SubCategoriesController::getSubCategoriesForEdit($categorie[0]->categoryId);
@endphp
<h1>Edit Category</h1>
<hr>
<p>*Only Categories will be Shown in Navbar and Products will be categorized in sub categories</p>
<br>
<form form method="POST" action="/myadmin/addcategorie">
{{ csrf_field()}}
<div class="form-group">
 <label for="name">Category Name</label>
 <input type="hidden" name="categoryId" value="{{$categorie[0]->categoryId}}" id="categoryId">
<input name="categoryName" type="text" id="categoryName" value="{{$categorie[0]->categoryName}}" placeholder="Category Name" class="form-control" required>
</div>
<div class="panel panel-default">
  <div class="panel-body">
{{$subcategories}}
  </div>
</div>
<button class="btn btn-success" type="submit">Save Changes</button>
@include('layouts.admin.errors') 
</form>
@endsection