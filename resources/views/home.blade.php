@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">{{ __('Home')}}</li>
@endsection

@section('content')
<div class="contaier">
    <h1>{{ __('Memo App')}}</h1>
</div>
@endsection
