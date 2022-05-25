@extends('layouts.html_general_layout')

@section('og-metadata-top')
	
@endsection

@section('title-top')
	@yield('title')
@endsection

@section('description-top')
	@yield('description')
@endsection

@section('robots-behaviour-top')
	noindex, nofollow
@endsection

@section('header')
	<!-- Harmonica menu -->
    @include('header.harmonica_menu')
	
	<!-- Menu and Nav header -->
	@include('header.simplified_header')
	

@endsection

@section('main-content-top')
	@yield('main-content')
@endsection

@section('footer')
	@include('footer.opening_contact')
	@include('footer.footer')
@endsection

@section('scripts-top')
	
@endsection

