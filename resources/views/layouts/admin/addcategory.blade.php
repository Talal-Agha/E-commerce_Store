@extends('layouts.admin.layout')
@section('Maincontent')
<h1>Add Category</h1>
<hr>
<p>*Only Categories will be Shown in Navbar and Products will be categorized in sub categories</p>
<br>
<form form method="POST" action="/myadmin/addcategorie">
{{ csrf_field()}}
<div class="form-group">
 <label for="name">Category Name</label>
<input name="categoryName" type="text" id="categoryName" placeholder="Category Name" class="form-control" required>
</div>
<p>*if you are making sub category select parent category</p>
<div class="form-group">
  <label for="parentCategory">Select Parent Category:</label>
  <select class="form-control" name="parentCategory" id="parentCategory">
    <option value="">None</option>
    @foreach($categories as $category)
    <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
    @endforeach
  </select>
</div>
<button class="btn btn-success" type="submit">Add Category or Sub Category</button>
@include('layouts.admin.errors') 
</form>
@endsection