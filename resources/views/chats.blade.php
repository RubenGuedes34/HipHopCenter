@extends('layouts.appp')

@section('content')
<div class="container">

    <chats :user="{{ auth()->user() }}"></chats>

</div>
@endsection