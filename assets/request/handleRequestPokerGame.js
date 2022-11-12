let getCard = function getCards(num) {
    if (num.length === 0) {
        document.getElementById("label-0").innerHTML = "";
        return 0;
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // document.getElementById("label-0").innerHTML = JSON.parse( this.responseText)[0].image;
                let clean = this.responseText.trim();
                let json = JSON.parse(clean);
                document.getElementById("to-change1").innerHTML = json['dealer_count'];
                document.getElementById("to-change2").innerHTML = json['log']['v0'].name;
            }
        };
        xmlhttp.open("GET", "assets/request/RequestDeal.php?num=" + num, true);
        xmlhttp.send();
    }
}
getCard(2);
