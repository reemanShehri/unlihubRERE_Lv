@extends('errors::minimal')

@section('title', __('Payment Required'))
@section('code', '402')
@section('message', __('Payment Required'))
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
