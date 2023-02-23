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
                alert('erro!'+response)
            }
        });     
        return false;
    });


    //MENU LATERAL
    $('.fechar_menu').click(function(){
        $('.ul_menu_lateral').toggle();
    });
    $('.menu_lateral ul li ul').mouseover(function(){
        $(this).parent().css({
            'background-color':'#2326295b'
        })
    });
    $('.menu_lateral ul li ul').mouseout(function(){        
        $(this).parent().css({
            'background-color':'#313A46'
        })
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





    // /usuarioApi teste de api
    $('.btn_test').click( function(){   
        $.ajax({
            type: "get",
            data: {
                'id':2
            },
            url: '/api/usuarioApi',
            success: function(response){               
                var usuario = JSON.parse(response)
                console.log(response)    
                for (let index = 0; index < usuario.length; index++) {
                    const element = usuario[index];
                    console.log(element)                    
                }
                // alert(usuario.nome)
            },
            error: function(){
                alert('erro no teste!')
            }
        });     
    });




    // ADD AJUDANTE
    $('#Add_Ajudante').click(function(){
        $('#Div_Add_Ajudante').append('<div><select name="Ajudantes[]" class="ajudantes" required>'
        +'<option value="">Selecione o Ajudante</option>'
        +'<option value="1">1</option>'
        +'<option value="2">2</option>'
        +'<option value="3">3</option>'
        +'<option value="4">4</option>'
        +'<option value="5">5</option>'
        +'</select><a href="" class="fecha_select_ajudante">X</a></div>')
        
        return false
    });
    $('.fecha_select_ajudante').click(function(){        
        $(this).siblings('select').remove()
        $(this).remove()
        $('#Area_Ajudantes').append('<label>Sem Ajudante? </label><input type="checkbox" name="SemAjudante"/>')
        return false
    })
    //delegacao de eventos
    $('#Div_Add_Ajudante').on('click','a',function(){
        $(this).siblings('select').remove()
        $(this).remove()
        return false;
    });
});

