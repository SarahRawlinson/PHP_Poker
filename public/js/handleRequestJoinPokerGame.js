let joinCalls = 0;
let lastRemovedJoinCall = 0;
let joinPokerGameAloud = true;
document.addEventListener("join-game", function(event) {
    if (!joinPokerGameAloud) return;
    joinPokerGameAloud = false;


    // console.log('created-game event heard');
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    let form_join_game_data = {
        number: '1',
        poker_game_id: event.detail.number
    };
    let type = "POST";
    let poker_join_request_url = 'poker-join-request';
    $.ajax({
        type: type,
        url: poker_join_request_url,
        data: form_join_game_data,
        dataType: 'json',
        success: function (data) {

            joinCalls++;
            $('#header-main-messages').append('<div class="p-3 flash-'+ data['status']
                +' join-calls-flash-'+joinCalls+'" id="join-calls-flash-'+joinCalls+'">'
                + data['response'] +
                '</div>')
            setTimeout(function(){
                lastRemovedJoinCall++;
                $('#join-calls-flash-'+lastRemovedJoinCall).hide();
            },10000);
        },
        error: function (xhr, status, error) {

            joinCalls++;
            $('#header-main-messages').append('<div class="p-3 flash-error'
                +' join-calls-flash-'+joinCalls+'" id="join-calls-flash-'+joinCalls+'">'
                + 'There was an error with the request responce: ' + xhr.responseText + '. <br>'
                + 'Status: '+ status + '. <br>'
                + 'Error: ' + error
                + '</div>')
            setTimeout(function(){
                lastRemovedJoinCall++;
                $('#join-calls-flash-'+lastRemovedJoinCall).hide();
            },50000);
            console.log(JSON.parse(xhr.responseText));
        }
    });
    joinPokerGameAloud = true;
});
$(document).ready(function($){
    // CREATE
    $("#button-deal").click(function (e) {

    });
});
