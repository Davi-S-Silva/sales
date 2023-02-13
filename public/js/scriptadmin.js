$(document).ready(function (){
    $('#Div_Login_Admin').css({
        // 'min-height':'100%',
        'min-height':window.innerHeight,
        // 'background-color':'#050505',
        'display':'flex',
        'flex-direction':'column',
        'justify-content':'center'
    });
    $('#Form_Login_Admin').css({
        'top':(window.innerHeight/2)- 100
    });
    var respostaAjax = $("#RespostaAjax");
    respostaAjax.hide();
    //FAZER LOGIN
    $('#Form_Login_Admin').submit( function(){   
        $.ajax({
            type: "post",
            data: $(this).serialize(),
            url: '/logar',
            success: function(response){
                var successclass = 'alert-success'
                var dangerclass = 'alert-danger'                
                var msg = ''
                respostaAjax.show();
                if(response==1){
                    respostaAjax.removeClass(dangerclass)
                    respostaAjax.addClass(successclass)
                    msg = "usuario logado com sucesso!"
                    respostaAjax.text(msg).fadeOut(5000);
                    window.location="/admin";
                }else{
                    respostaAjax.removeClass(successclass)
                    respostaAjax.addClass(dangerclass)
                    respostaAjax.text(response).fadeOut(5000);
                }
                
                // alert(response)
            },
            error: function(response){
                alert(response)
            }
        });     
        return false;
    });


    //MENU LATERAL
    $('.fechar_menu').click(function(){
        $('.ul_menu_lateral').toggle();
    });

   
    
    $('.toggle_user_top').mouseover(function(){
        $('.user_top ul').show();
    })
    $('.user_top ul').mouseover(function(){
        $(this).show();
    });
    $('.user_top ul').mouseout(function(){
        $(this).hide();
    });
});