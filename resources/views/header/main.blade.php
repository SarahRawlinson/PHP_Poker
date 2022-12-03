<?php

use App\Classes\Web_Data\PageAttributes;
use Illuminate\Support\Facades\Auth;

$PageLinks = PageAttributes::GetPageAttributes();
$loggedIn = false;
?>



@auth
    <?php $loggedIn = true ?>
@endauth

{{--status--}}
@if($loggedIn)
    <div class="container logged-in-status" id="header-main-logged-in-status">
        <div class="row">
            <h5 class="text-end">You are logged in as {{Auth::user()->name}}</h5>
        </div>
    </div>
@endif

<div class="container-fluid">
    <div class="row pb-3 pt-3 mb-3 mt-3">

        {{--nav bar--}}
        <ul class="nav">
            @foreach($PageLinks as $page)
                @if(($page['login_needed'] === 1 && $loggedIn)
                    || $page['login_needed'] === 0
                    || ($page['login_needed'] === -1 && !$loggedIn))
                    <li><a href="{{ route($page['link']) }}"
                           class={{request()->routeIs($page['link'])?"active":""}}>{{$page['title']}}</a></li>
                @endif
            @endforeach
        </ul>

        {{--messages--}}
        <div class="container messages" id="header-main-messages">
            <div class="mb-5">
                @includeWhen($errors->any(), 'messages._errors')
                @includeWhen(session('success'), 'messages._success')
                @includeWhen(session('deleted'), 'messages._item_deleted')
            </div>
        </div>
    </div>
</div>
