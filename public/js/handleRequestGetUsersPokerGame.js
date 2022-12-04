let getUserCalls = 0;
let lastRemovedGetUserCalls = 0;
let usersCallsAloud = true;
let connectedGame = -1;
let kill_connection = false;
let getUsersAlreadyCalled = false;
let users = [];
document.addEventListener("check-for-users", function(event) {
    if (event.detail.sender !== 'this' && getUsersAlreadyCalled) return;
    getUsersAlreadyCalled = true;
    if (kill_connection || !usersCallsAloud) return;
    usersCallsAloud = false;

    connectedGame = event.detail.poker_game_id;
    // console.log('created-game event heard');
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    let formData = {
        number: event.detail.poker_game_id,
        poker_game_id: event.detail.poker_game_id
    };
    let type = "POST";
    let check_for_users_url = 'poker-players-request';
    $.ajax({
        type: type,
        url: check_for_users_url,
        data: formData,
        dataType: 'json',
        success: function (data) {


            // console.log(data);
            if (!arraysJsonEqual(users,data['users']))
            {
                data['users'].forEach(function (currentValue, index, arr)
                {
                    let found = false;
                    users.forEach(function (thisValue, thiIndex, thisArr) {
                        if (currentValue['name'] === thisValue['name']){
                            found = true;
                        }
                    });
                    if (!found)
                    {
                        getUserCalls++;
                        $('#header-main-messages').append('<div class="p-3 flash-'+ data['status']
                            +' get-users-calls-flash-'+getUserCalls+'" id="get-users-calls-flash-'+getUserCalls+'">'
                            + currentValue['name'] +' has joined the game.' +
                            '</div>')
                        setTimeout(function(){
                            lastRemovedGetUserCalls++;
                            $('#get-users-calls-flash-'+lastRemovedGetUserCalls).hide();
                            console.log('#get-users-calls-flash-'+lastRemovedGetUserCalls+' hidden');
                        },10000);
                    }
                });

            }
            else {
                console.log('no updates');
            }
            users = data['users']


            setTimeout(function(){
                document.dispatchEvent(new CustomEvent("check-for-users", {
                    detail: {
                        poker_game_id: connectedGame,
                        sender: 'this'
                    }
                }));
            },5000);

        },
        error: function (xhr, status, error) {

            getUserCalls++;
            $('#header-main-messages').append('<div class="p-3 flash-error'
                +' get-users-calls-flash-'+getUserCalls+'" id="get-users-calls-flash-'+getUserCalls+'">'
                + 'There was an error with the request responce: ' + xhr.responseText + '. <br>'
                + 'Status: '+ status + '. <br>'
                + 'Error: ' + error
                + '</div>')
            setTimeout(function(){
                lastRemovedGetUserCalls++;
                $('#get-users-calls-flash-'+lastRemovedGetUserCalls).hide();
            },50000);
            console.log(JSON.parse(xhr.responseText));
        }
    });
    usersCallsAloud = true;
});
function killConnection(on)
{
    kill_connection = on;
    getUsersAlreadyCalled = false;
}
function arraysJsonEqual(a, b) {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length !== b.length) return false;

    // If you don't care about the order of the elements inside
    // the array, you should sort both arrays here.
    // Please note that calling sort on an array will modify that array.
    // you might want to clone your array first.

    for (let i = 0; i < a.length; ++i) {
        if (JSON.stringify(a[i]) !== JSON.stringify(b[i])) return false;
    }
    return true;
}
