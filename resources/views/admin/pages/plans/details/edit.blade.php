@extends('adminlte::page')

@section('title', "Editar detalhe do {$detail->name}")

@section('content_header')
<h1>Editar detalhe {{ $detail->name }}</h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="active">Editar</a></li>
</ol>

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}" method="post">
            @method('put')
            @include('admin.pages.plans.details._partials.form')
        </form>
    </div>
</div>
@endsection

