@extends('backend.dashboard');
@section('content')

			
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>categories
		
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Category nane</th>
								  <th>Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach( $categorys as $category)   
						  <tbody>
							<tr>
								<td>{{$category->id}}</td>
								<td class="center">{{$category->category_name}}</td>
								<td class="center">{!! $category->category_description !!}</td>
								<td class="center">
									@if($category->publication_status==1)
									<span class="label label-success">Active</span>
									@else
                                	<span class="label label-danger">Unactive</span>
									@endif
								</td>
								<td class="center">
									@if($category->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive/'. $category->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
		                             <a class="btn btn-success" href="{{URL::to('/active/'. $category->id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
                            @endif

							<a class="btn btn-info" href="{{action('categoryController@edit', $category->id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<i class="halflings-icon white trash">
							<form action="{{action('categoryController@destroy', $category->id)}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button class="" type="submit">Delete</button>
							</form></i>
						</td>
							</tr>
						</tbody>
						@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			
			
			
			
			@endsection