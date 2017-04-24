@extends('layouts/layout')

@section('test')
	Search<input type="text" name = "q" id="qtest" value=""><br>
	<button onclick="test()">Go!!!</button>
	<div id="testing" style="border: 1px solid black">
		

	</div>
@stop