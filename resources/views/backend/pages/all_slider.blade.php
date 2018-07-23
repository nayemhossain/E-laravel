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
					<h2><i class="halflings-icon user"></i><span class="break"></span>Slider</h2>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
							  <th>Slider ID</th>
							  <th>Slider Image</th>							 
							  <th>Status</th>
							  <th>Actions</th>
						  </tr>
					  </thead> 
                 @foreach( $sliders as $slider)
					  <tbody>
						<tr>
						<td>{{ $slider->id }}</td>
                       <td> <img src="{{URL::to($slider->slider_image)}}" style="height: 80px; width:200px;"></td>
						<td class="center">
							@if($slider->publication_status==1)
							<span class="label label-success">Active</span>
							@else
                                <span class="label label-danger">Unactive</span>
							@endif
						</td>

						<td class="center">
                            @if($slider->publication_status==1)
							<a class="btn btn-danger" href="{{URL::to('/inactive/'. $slider->id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
                            @else
                             <a class="btn btn-success" href="{{URL::to('/active/'.$slider->id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
                            @endif

							<i class="halflings-icon white trash">
							<form action="{{action('sliderController@destroy', $slider->id)}}" method="post">
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