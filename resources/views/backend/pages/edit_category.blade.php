@extends('backend.dashboard');
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update ctaegory</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>update Category</h2>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{action('categoryController@update', $categorys->id)}}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Category Name</label>
				  <div class="controls">
				<input type="text" class="input-xlarge" name="category_name" value="{{$categorys->category_name}}">
				  </div>
				</div>
       
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">category description </label>
				  <div class="controls">
					<textarea class="cleditor" name="category_description" rows="3" >
						{{$categorys->category_description}}
					</textarea>
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">save</button>		 
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection