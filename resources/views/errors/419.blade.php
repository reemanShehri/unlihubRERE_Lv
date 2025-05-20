@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>