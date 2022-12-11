
@extends('layout')
@section('meta')

@endsection
@section('page name','Join Poker Game')
@section('page title','Join Poker Game')
@section('page content')
    <h2>Find a game</h2>
    @isset($pokerGames)
        @forelse($pokerGames as $pokerGame)
            <div class="post-content">
                <h2>
                    @auth
                        <button onclick="joinPokerGame({{ $pokerGame->id }})" id="join{{ $pokerGame->id }}">
                            @endauth
                            {{ $pokerGame->id }}
                            @auth
                        </button>
                    @endauth

                </h2>
                <p>{{ $pokerGame->id }}</p>
                <small class="row">posted by <b>{{$pokerGame->user->name}}</b></small>
                <small class="row">time: <b>{{$pokerGame->updated_at}}</b></small>
                @auth
                    <a href="{{route('poker.show', [$pokerGame])}}">
                        @endauth
                        {{ $pokerGame->id }}
                        @auth
                    </a>
                @endauth
            </div>
        @empty
            <p>There are no games yet</p>
        @endforelse
    @else
        <p>issue with page</p>
    @endisset
@endsection
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    let URL_VAL = '{{url('/poker')}}';
    {{--let CSRF_TOKEN = '<?php echo csrf_token() ?>';--}}
    let CSRF_TOKEN = '{{csrf_token()}}';
    $(document).ready(function ()
    {
        let head = $('head');
        head.append('<meta name="csrf-token" content="' + CSRF_TOKEN + '">');
        console.log(CSRF_TOKEN);
    });
    function joinPokerGame(id)
    {
        console.log(id);
        document.dispatchEvent(new CustomEvent("join-game", {
            detail: {
                number: id,
            }
        }));
    }

</script>
<script src="{{asset('js/handleRequestJoinPokerGame.js')}}"></script>

