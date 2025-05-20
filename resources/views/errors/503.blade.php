@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
