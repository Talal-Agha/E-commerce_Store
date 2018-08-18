      <tr>
        <td>{{$filter->filter_id }}</td>
        <td>{{$filter->filterName}}</td>
        <td><?php echo App\Http\Controllers\SubCategoriesController::getSubCategoriesNameForProducts($filter->subCategoryId); ?></td>
        <td>{{$filter->type}}</td>
        <td>
  <button type="button" onClick="loadEditfilter({{$filter->filter_Id }});" data-toggle="modal" data-target="#myEditCatModal" class="btn btn-warning">Edit</button>
</td>
      </tr>