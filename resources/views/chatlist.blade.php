<h4 class="text-center"><strong>Messages</strong></h4>
<hr>
@if(session('type') == 'company')
	@if(count($ch->where('company_id', session('id'))->get()) == 0)
	<li class="text-center">You have no messages</li>
	<br>
	@else
		@foreach($conversations as $conversation)
			<li>
			@if(!$ch->where('student_id', $conversation->student_id)->where('company_id', session('id'))->first())

			@else
				<a href="#" data-toggle="modal" data-target="#chatModal" onclick="loadstudentchat('{{ $conversation->student->id }}', '{{ $conversation->student->firstname }} {{ $conversation->student->middlename }} {{ $conversation->student->lastname }}', '{{ $conversation->student->username }}')">
				<strong>{{ $conversation->student->firstname }} {{ $conversation->student->middlename }} {{ $conversation->student->lastname }}</strong>
				@if(count($ch->where('company_id', session('id'))->where('student_id', $conversation->student->id)->where('status', 'sentbystudent')->get()) == 0)
				@else
					<span class="badge">{{ count($ch->where('company_id', session('id'))->where('student_id', $conversation->student->id)->where('status', 'sentbystudent')->get()) }}</span>
				@endif
				<br>
			@endif
				<p style="text-overflow: ellipsis; overflow: hidden; font-size: 10px; margin-left: 10px">
				@if(count($ch->where('company_id', session('id'))->where('student_id', $conversation->student->id)->orderBy('created_at', 'desc')->get()) == 0)
				
				@else 
					{{ $ch->where('company_id', session('id'))->where('student_id', $conversation->student->id)->orderBy('created_at', 'desc')->first()->body }}
				@endif
				</p>
			</a></li>
		@endforeach
		<hr>
	@endif
@elseif(session('type') == 'student')
	@if(count($ch->where('student_id', session('id'))->get()) == 0)
	<li class="text-center">You have no messages</li>
	<br>
	@else
		@foreach($conversations as $conversation)
			<li>
			@if(!$ch->where('company_id', $conversation->company->id)->where('student_id', session('id'))->first())

			@else
				<a href="#" data-toggle="modal" data-target="#chatModalStudent" onclick="loadtargetchat('{{ $conversation->company->id }}', '{{ $conversation->company->name }}', '{{ $conversation->company->username }}')">
				<strong>{{ $conversation->company->name }}</strong>
				@if(count($ch->where('student_id', session('id'))->where('company_id', $conversation->company->id)->where('status', 'sentbycompany')->get()) == 0)
				@else
					<span class="badge">{{ count($ch->where('student_id', session('id'))->where('company_id', $conversation->company->id)->where('status', 'sentbycompany')->get()) }}</span>
				@endif
				<br>
			@endif
				<p style="text-overflow: ellipsis; overflow: hidden; font-size: 10px; margin-left: 10px">
				@if(count($ch->where('student_id', session('id'))->where('company_id', $conversation->company->id)->orderBy('created_at', 'desc')->get()) == 0)
				
				@else 
					{{ $ch->where('student_id', session('id'))->where('company_id', $conversation->company->id)->orderBy('created_at', 'desc')->first()->body }}
				@endif
				</p>
			</a></li>
		@endforeach
		<hr>
	@endif
@endif