@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
