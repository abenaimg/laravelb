@extends('template')

@section('contenu')
    <br>
	<div class="col-sm-offset-3 col-sm-6">
		{!! Panel::
			head(
				'Ajout d\'un article'
			)
			->body(
				Form::open(['route' => 'post.store']).
					Form::control('text', $errors, 'titre', 'Titre').
					Form::control('textarea', $errors, 'contenu', 'Contenu').
					Form::control('text', $errors, 'tags', 'Entrez les tags séparés par des virgules').
					Form::button_submit('Envoyer !').
				Form::close()
			)
            ->type('primary')
		!!}
		{!! Html::button_back() !!}
	</div>
@endsection

<!--
@extends('template_form')

@section('titre')
    Ajout d'un article
@stop

// AB - second step to reduce the code using macros see file HtmlMacrosServicesProviders
@section('formulaire')
    {!! Form::open(['route' => 'post.store']) !!}
		{!! Form::control('text', $errors, 'titre', 'Titre') !!}
		{!! Form::control('textarea', $errors, 'contenu', 'Contenu') !!}
		{!! Form::control('text', $errors, 'tags', 'Entrez les tags séparés par des virgules') !!}
		{!! Form::button_submit('Envoyer !') !!}
	{!! Form::close() !!}
@endsection

// AB  - first step without macros
@section('contenu')

	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Ajout d'un article</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'post.store']) !!}
					<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
						{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
						{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
						{!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
						{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
						{!! Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Entrez les tags séparés par des virgules')) !!}
						{!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
					</div>
					{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>

@endsection

-->
