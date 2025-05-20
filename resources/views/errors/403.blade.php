@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
<script>
    window.location.href = "{{ route('login') }}";
</script>
<a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
