@extends('layout.front')

@section('title', 'Profile')

@section('style')
<style>
    
</style>
@endsection

@section('content')
Hello, {{ Auth::user()->name ? Auth::user()->name : Auth::user()->phone }}
<a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
@endsection

@section('script')
<script>
    
</script>
@endsection