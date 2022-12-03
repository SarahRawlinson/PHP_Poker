let calls = 0;
let lastRemovedCall = 0;
let aloud = true;
document.addEventListener("created-game", function(event) {
    if (!aloud) return;
    aloud = false;


    // console.log('created-game event heard');
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    let formData = {
        number: '1',
        poker_game_id: event.detail.number
    };
    let type = "POST";
    let ajaxurl = 'poker-join-request';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function (data) {

            // console.log(data);
            calls++;
            console.log('#calls-flash-'+calls+' created');
            $('#header-main-messages').append('<div class="p-3 flash-success calls-flash-'+calls+'" id="calls-flash-'+calls+'">game joined</div>')
            setTimeout(function(){
                lastRemovedCall++;
                console.log('#calls-flash-'+lastRemovedCall+' removed');
                $('#calls-flash-'+lastRemovedCall).hide();
            },10000);
        },
        error: function (data) {
            console.log(data);
        }
    });
    aloud = true;
});
$(document).ready(function($){
    // CREATE
    $("#button-deal").click(function (e) {

    });
});
