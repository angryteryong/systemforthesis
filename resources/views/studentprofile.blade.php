@extends('layouts/layout')

@section('title')
  Job Placement System for Dagupan City - Student
@stop

@section('studentProfile')
@if(session('type') == 'company')
  @if(session('alert') && session('prompt'))
    <div>You do not have the privilege to view this page</div>
  @else
    @include('studentprofileinclude')
  @endif
@else
  @include('studentprofileinclude')
@endif

@stop