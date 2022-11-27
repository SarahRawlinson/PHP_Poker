<?php

use App\Classes\Cards\CardExamples;
use App\Classes\Cards\Card\ICard;
use App\Classes\Cards\Dealer\StandardPlayingCardDealer;
use App\Classes\Cards\Deck;
use App\Classes\Player\PlayerCreator;
use App\Classes\Player\PlayerGroup;
use App\Classes\Player\PlayerType;

$cards = CardExamples::getRoyalFlush();
$dealer = new StandardPlayingCardDealer();
$deck = $dealer->getDeck();
//$player1 = PlayerCreator::CreatePlayer(PlayerType::Human, 'Bob');
//$player2 = PlayerCreator::CreatePlayer(PlayerType::AI, 'Terry');
//$playerGroup = new PlayerGroup([$player1, $player2]);
//function deal(StandardPlayingCardDealer &$dealer, PlayerGroup &$playerGroup)
//{
//    $dealer->deal($playerGroup,1);
//}
function deal(Deck &$deck): ICard
{
    return $deck->pop();
}
?>


@forelse($cards as $i=> $card)
    @if(is_a($card, ICard::class))
        <img src="{{asset($card->getImagePath())}}" alt="card-image{{$i}}" class="rounded" id="{{$i}}" width="100px">
        <label class="h2" for="{{$i}}" id="label-{{$i}}">{{$card->getName()}}</label>
    @endif
@empty
    <p>There are no cards</p>
@endforelse

<h3 id="to-change1">{{deal($deck)->getName()}}</h3>
<h3 id="to-change2">{{$deck->count()}}</h3>
<form>
{{--    @csrf--}}
    <button name="button-deal" id="button-deal" type="submit">button</button>
</form>


{{--<script>--}}
{{--    $('#button1').click(function () {--}}
{{--        alert('button clicked');--}}
{{--        $('#to-change1').text('{{deal($deck)->getName()}}');--}}
{{--        $('#to-change2').text('{{$deck->count()}}');--}}
{{--    });--}}
{{--</script>--}}
<script>
    let URL_VAL = '{{url('/poker')}}';
    {{--let CSRF_TOKEN = '<?php echo csrf_token() ?>';--}}
    let CSRF_TOKEN = '{{csrf_token()}}';
    $(document).ready(function ()
    {
        let head = $('head');
        head.append('<meta name="csrf-token" content="' + CSRF_TOKEN + '">');
        head.append('<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">');

        console.log(CSRF_TOKEN);

    });

</script>
<script src="{{asset('js/handleRequestPokerGame.js')}}"></script>
