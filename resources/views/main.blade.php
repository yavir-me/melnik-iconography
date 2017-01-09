@extends('layouts.default')
@section('content')
<div class="row slider-row"> {{-- slider row --}}
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="img/slideshow/1.jpg">
			</div>

			<div class="item">
				<img src="img/slideshow/2.jpg">
			</div>

			<div class="item">
				<img src="img/slideshow/3.jpg">
			</div>

			<div class="item">
				<img src="img/slideshow/4.jpg">
			</div>

		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>  {{-- / slider row --}}

<div class="row services-row">
	{{-- works kinds --}}
	<div class="col-sm-12 col-md-6 col-lg-4 col-lg-offset-2">
		<div class="panel panel-default work-kinds">
			<div class="panel-heading">Works kinds</div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tbody>
						<tr>
							<td><i class="fa fa-briefcase" aria-hidden="true"></i> kind 1</td>
						</tr>
						<tr>
							<td><i class="fa fa-briefcase" aria-hidden="true"></i> kind 2</td>
						</tr>
						<tr>
							<td><i class="fa fa-briefcase" aria-hidden="true"></i> kind 3</td>
						</tr>
						<tr>
							<td><i class="fa fa-briefcase" aria-hidden="true"></i> kind 4</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	{{-- icons kinds --}}
	<div class="col-sm-12 col-md-6 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">Icons kinds</div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tbody>
						<tr>
							<td><i class="fa fa-paint-brush" aria-hidden="true"></i> Icons kind 1</td>
						</tr>
						<tr>
							<td><i class="fa fa-paint-brush" aria-hidden="true"></i> Icons kind 2</td>
						</tr>
						<tr>
							<td><i class="fa fa-paint-brush" aria-hidden="true"></i> Icons kind 3</td>
						</tr>
						<tr>
							<td><i class="fa fa-paint-brush" aria-hidden="true"></i> Icons kind 4</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row gallery-row"> {{-- gallery row --}}
	<h1 class="text-center">Last works</h1>
	@foreach($icons as $icon)
	<div class="col-sm-12 col-md-6 col-lg-4 icon">
		<div class="thumbnail">
			<img src="{{!empty($icon->path) ? $icon->path : 'Icon title goes here'}}">
			<div class="caption">
				<h3>{{!empty($icon->name) ? $icon->name : 'Icon name'}}</h3>
				<p>{{!empty($icon->description) ? $icon->description : 'Some description goes here'}}</p>
				<p><a href="#" class="btn btn-primary" role="button">View</a></p>
			</div>
		</div>
	</div>
	@endforeach
</div> {{-- / gallery row --}}

<div class="row footer">
	<div class="col-sm-4 col-md-2 col-md-offset-5 reach-me">
		<h3>Reach me here:</h3>
	</div>
	<div class="col-sm-8 col-md-4">
		<form action="/reach-me" method="POST"><input type="email" name="email" class="form-control" placeholder="Your email address"></form>
	</div>
</div>
@stop
