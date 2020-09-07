@extends('welcome')
@section('content')
<section class="pt-4">
	<div>
	<h4 class="text-muted text-uppercase font-weight-bold text-center">Registered Hostels</h4>
	<div>
		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
		  <thead>
		    <tr>
		      <th class="th-sm">Name</th>
		      <th class="th-sm">Type</th>
		      <th class="th-sm">University</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($hostels as $item)
		  	<tr>
		  		<td><a href="{{ url('/displayHostelInfo/'.$item->id) }}">{{$item->hname}}</a></td>
		  		<td>{{$item->type}}</td>	
		  		<td>{{$item->name}}</td>	
	  		</tr>
	  		@endforeach	  	
		  </tbody>
		</table>
	</div>	
</section>
@endsection