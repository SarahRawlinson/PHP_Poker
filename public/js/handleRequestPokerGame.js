// let getCard = function getCards(num) {
//     if (num.length === 0) {
//         document.getElementById("label-0").innerHTML = "";
//         return 0;
//     } else {
//         let xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState === 4 && this.status === 200) {
//                 // document.getElementById("label-0").innerHTML = JSON.parse( this.responseText)[0].image;
//                 let clean = this.responseText.trim();
//                 let json = JSON.parse(clean);
//                 document.getElementById("to-change1").innerHTML = json['dealer_count'];
//                 document.getElementById("to-change2").innerHTML = json['log']['v0'].name;
//             }
//         };
//         xmlhttp.open("GET", "assets/request/RequestDeal.php?num=" + num, true);
//         xmlhttp.send();
//     }
// }
// getCard(2);
let createCalls = 0;
let lastRemovedCreatedCall = 0;
let createPokerGameAloud = true;
$(document).ready(function($){
    // CREATE
    $("#button-deal").click(function (e) {
        if (!createPokerGameAloud) return;
        createPokerGameAloud = false;
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
        e.preventDefault();
        let formCreate_Game_Data = {
            number: '1'
        };
        let type = "POST";
        let poker_request_url = 'poker-request';
        $.ajax({
            type: type,
            url: poker_request_url,
            data: formCreate_Game_Data,
            dataType: 'json',
            success: function (data) {

                console.log(data);
                createCalls++;
                console.log('#calls-flash-'+createCalls+' created');
                $('#header-main-messages').append('<div class="p-3 flash-'+ data['status']
                    +' create-calls-flash-'+createCalls+'" id="create-calls-flash-'+createCalls+'">'
                    + data['response'] +
                    '</div>')
                setTimeout(function(){
                    lastRemovedCreatedCall++;
                    console.log('#create-calls-flash-'+lastRemovedCreatedCall+' removed');
                    $('#create-calls-flash-'+lastRemovedCreatedCall).hide();
                    document.dispatchEvent(new CustomEvent("check-for-users", {
                        detail: {
                            poker_game_id: data['game'][0]['id'],
                            sender: 'created game'
                        }
                    }));
                },10000);
                // console.log(data);
                console.log(data['game'][0]['id']);
                // console.log('created-game event created');
                document.dispatchEvent(new CustomEvent("join-game", {
                    detail: {
                        number: data['game'][0]['id']
                    }
                }));
            },
            error: function (xhr, status, error) {

                createCalls++;
                $('#header-main-messages').append('<div class="p-3 flash-error'
                    +' create-calls-flash-'+createCalls+'" id="create-calls-flash-'+createCalls+'">'
                    + 'There was an error with the request responce: ' + xhr.responseText + '. <br>'
                    + 'Status: '+ status + '. <br>'
                    + 'Error: ' + error
                    + '</div>')
                setTimeout(function(){
                    lastRemovedCreatedCall++;
                    console.log('#create-calls-flash-'+lastRemovedCreatedCall+' removed');
                    $('#create-calls-flash-'+lastRemovedCreatedCall).hide();
                },50000);
                console.log(JSON.parse(xhr.responseText));
            }

        });
        createPokerGameAloud = true;
    });
});
