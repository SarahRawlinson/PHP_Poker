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


$(document).ready(function($){
    // CREATE
    $("#button-deal").click(function (e) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
        e.preventDefault();
        let formData = {
            number: '1'
        };
        let type = "POST";
        let ajaxurl = 'poker-request';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                // console.log(data);
                console.log(data['game'][0]['id']);
                // console.log('created-game event created');
                document.dispatchEvent(new CustomEvent("created-game", {
                    detail: {
                        number: data['game'][0]['id']
                    }
                }));
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
