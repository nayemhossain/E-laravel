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
		<a href="#">Add product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add product</h2>
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{action('productController@update', $product->id)}}" method="post" 
			enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
			  <fieldset>

				<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_name" required="" value="{{$product->product_name}}">
				  </div>
				</div>

                <div class="control-group">
					<label class="control-label" for="selectError3">Product category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id" required="" > 
					  	<option>select category</option>
					  	@foreach($categorys as $category)
					  	<option value="{{$category->id}}">{{$category->category_name}}</option>
                     	@endforeach		
					  </select>
					</div>
				  </div>

				  <div class="control-group">
					<label class="control-label" for="selectError3">Manufacture Name</label>
					<div class="controls">
					  <select id="selectError3" name="manufacture_id" required="">
						<option>seslect manufacture </option>
                        @foreach($manufactures as $manufacture)
					  	<option value="{{$manufacture->id}}">{{$manufacture->manufacture_name}}</option>
                     	@endforeach	

					  </select>
					</div>
				  </div>

				
				<div class="control-group">
				  <label class="control-label" for="date01">Product Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_price" value="{{$product->product_price}}">
				  </div>
				</div>

                <div class="control-group">
				  <label class="control-label" for="fileInput">Image </label>
				  <div class="controls">
					<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" value="{{$product->product_image}}">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="date01">Product Size</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_size" value="{{$product->product_size}}" >
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="date01">Product Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" name="product_color" value="{{$product->product_color}}" >
				  </div>
				</div>

				

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product </button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection