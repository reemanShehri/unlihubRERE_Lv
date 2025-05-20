@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
