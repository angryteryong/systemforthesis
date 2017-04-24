@foreach($chats as $chat)                
  @if($chat->companyid == session('id') && $chat->sendertype == session('type'))
    <div class="row chats">
      <div class="col-sm-1"></div>
      <p class="alert alert-success col-sm-11 yourchats">{{ $chat->body }}
      <i class="pull-right chattimes">{{ $chat->created_at }}</i></p>
    </div>
  @else
    <div class="row chats">
      <p class="alert alert-info col-sm-11 theirchats">{{ $chat->body }}
      <i class="pull-right chattimes theirchats">{{ $chat->created_at }}</i></p>
      <div class="col-sm-1"></div>
    </div>
  @endif
@endforeach