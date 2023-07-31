@extends('frontend.main_master')
@section('main')

@section('title')
Demo personal site with Portfolio and Blog developed in Laravel
@endsection

@include('frontend.home.slide')
@include('frontend.home.about')
@include('frontend.home.services')
@include('frontend.home.portfolio')
@include('frontend.home.partners')
@include('frontend.home.blog')
@php
    //@include('frontend.home.contact')
@endphp

@endsection