/**
 * @author Sebastian
 */

$(document).ready(function () {

$("#prev").click(function(event) {      
    $.ajax({data:{name:"John",id:"100"}, dataType:"html", success:function (data, textStatus) {$("#message_board").html(data);}, type:"post", url:"\/lfg\/add"});
    return false;
});
});