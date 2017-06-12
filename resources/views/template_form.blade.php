@extends('templateu')

@section('contenu')
  <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				@yield('titre')
			</div>
			<div class="panel-body">
				@yield('formulaire')
			</div>
		</div>
		{!! Html::button_back() !!}
	</div>
@stop
