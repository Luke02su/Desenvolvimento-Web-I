//$(document).ready(function(){

$(function(){
    $(".imgPeq").mouseover(function(){
        $(".imgPeq").removeClass("imgSelecionado");
        $(this).addClass("imgSelecionado");

        let arq = $(this).attr("src");

        $("#principal").attr("src", arq);
    });
})