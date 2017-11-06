
function selectCardEdit() {

    var fields = document.forms["modifyUser"];

    if ( fields["editCard"].value == -1) {
        fields["ccName"].value = "";
        fields["ccNumber"].value = "";
        fields["ccExpiration"].value = "";
        fields["ccCCV"].value = "";
    } else {

        index = fields["editCard"].selectedIndex;
        fields["ccName"].value = cards[index].name;
        fields["ccNumber"].value = cards[index].number;
        fields["ccExpiration"].value = cards[index].expirationDate;
        fields["ccCCV"].value = cards[index].ccv;

    }

}


function selectCardPay() {

    var fields = document.forms["pay"];

    index = fields["selectCard"].selectedIndex;
    fields["ccName"].value = cards[index].name;
    fields["ccNumber"].value = cards[index].number;
    fields["ccExpirationDate"].value = cards[index].expirationDate;
    fields["ccCCV"].value = cards[index].ccv;



}





