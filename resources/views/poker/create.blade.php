
@extends('layout')
@section('meta')
    @yield('meta-poker')
@endsection
@section('page name','Poker Home')
@section('page title','Poker Home')
@section('page content')
    <h2>welcome to my Poker Home page</h2>

{{--    <form>--}}
{{--        --}}{{--    @csrf--}}
{{--        <button name="button1" id="button1" type="submit">button</button>--}}
{{--    </form>--}}
    @include('poker.poker-game')



{{--        <script>--}}
{{--            function getMessage() {--}}
{{--                // $.ajaxSetup({--}}
{{--                //     headers: {--}}
{{--                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                //     }--}}
{{--                // });--}}
{{--                $.ajax({--}}
{{--                    type:'POST',--}}
{{--                    url:'/getmsg',--}}
{{--                    --}}{{--data:'_token = <?php echo csrf_token() ?>',--}}
{{--                    success:function(data) {--}}
{{--                        $("#msg").html(data.msg);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}



{{--    <div id = 'msg'>This message will be replaced using Ajax.--}}
{{--        Click the button to replace the message.</div>--}}
{{--<script>--}}
{{--    let head = $('head');--}}
{{--    let CSRF_TOKEN = '{{csrf_token()}}';--}}
{{--    head.append('<meta name="csrf-token" content="' + CSRF_TOKEN + '">');--}}
{{--    head.append('<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">');--}}
{{--    $(document).ready(function () {--}}
{{--        $('#button1').click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            getMessage();--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}





@endsection

