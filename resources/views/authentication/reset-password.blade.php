@extends('layouts.default')
@section('content')
{{-- register form row --}}
<div class="row">
	<div class="col-sm-12 col-md-6 col-md-offset-3 register-block">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Reset password</h3>
			</div>
			<div class="panel-body">
				<div class="panel-body">
					<form action="" method="POST">
						{{csrf_field()}}

						@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" placeholder="Password" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-unlock"></i></span>
								<input type="password" name="password_confirmation" placeholder="Password confirmation" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<input type="submit" value="Reset password" class="btn btn-success pull-right">
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>
@stop
