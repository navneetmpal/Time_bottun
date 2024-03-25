<!DOCTYPE html>
<html>
<head>
<title>Drop zone</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>
<body>
<h1>Drop zone</h1>
<div class="container sm-5">
	<div class="row">
		<div class="col-md-12">
			@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}				
				</div>
			@endif
			<div class="card">
				<div class="card-header">
					<h4>
						Gallery list
						<a href="{{ route('dropzone.create') }}" class="btn btn-primary float-end">Upload image</a>
					</h4>
				</div>
				<div class="card-body">
					<div class="row border shadow p-5">
						@foreach($gallery as $g)
							<div class="col-md-2" style="margin: 10px;">
								<img src="{{asset($g->image)}}" style="height: 200px;width: 200px;">
								<br/>
								<button style="height: 30px;width: 200px;">
								<a href="{{ route('dropzone.destroy', $g->id) }}">Delete image number {{$g->id}}</a></button>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>