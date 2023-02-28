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
        // var $clone = $('.ajudantes').clone()
        // $('.ajudantes').addClass('_ajd_js')
        // $('#Div_Add_Ajudante').append('<div></div>')
        // // alert('aqui')
        // $('#Div_Add_Ajudante div').append($clone)
        // $('#Div_Add_Ajudante div').append('<a href="" class="fecha_select_ajudante">X</a>')
        // $(this).hide()
        // $('#Div_Add_Ajudante').append('<div><x-SelectColaborador :ajudantes=$ajudantes /> <a href="" class="fecha_select_ajudante">X</a></div>')        
        // $('#Div_Add_Ajudante').append('<div><select name="Ajudantes[]" class="ajudantes _ajd_js" required>'
        // +'<option value="">Selecione o Ajudante</option>'
        // +'@foreach ($ajudantes as $ajudante)'
        //                     +'<option value="{{$ajudante->id}}">{{$ajudante->nome}}</option>'
        //                 +'@endforeach'
        // +'</select><a href="" class="fecha_select_ajudante">X</a></div>')        
        return false
    });
    
    $("#Area_Ajudantes .div_ajudantes > div a").click(function(){
        $('#Ajudante').attr('disabled','disabled')
        return false
    })
    $('#Add_Ajudante_1').on('click',function(){
        // $('#Area_Ajudantes .area_sem_ajudante .sem_ajudante').remove()   
        // alert('ola ajudante 2')    
        $('.ajudante1 select').removeAttr('disabled')
        return false 
    })
    $('#Add_Ajudante_2').on('click',function(){
        // $('#Area_Ajudantes .area_sem_ajudante .sem_ajudante').remove()   
        // alert('ola ajudante 2')    
        $('.ajudante2 select').removeAttr('disabled')
        return false 
    })
    $('#Add_Ajudante_3').on('click',function(){
        // $('#Area_Ajudantes .area_sem_ajudante .sem_ajudante').remove()   
        // alert('ola ajudante 2')    
        $('.ajudante3 select').removeAttr('disabled')
        return false 
    })

    $('.ajudante1 .fecha_select_ajudante').click(function(){  
        // $('#Add_Ajudante').show()      
        // $(this).siblings('select').remove()
        // $(this).remove()
        // myElement = document.querySelector("._ajd_js")
        // var exist = document.body.contains(myElement)
        // if(!exist){
        //     $('#Area_Ajudantes .area_sem_ajudante').html('<label class="sem_ajudante">Sem Ajudante? </label><input type="checkbox" name="SemAjudante" class="sem_ajudante" required/>')
        // }
        $('.ajudante1 select').attr('disabled','disabled')
        return false
    })

    $('.ajudante2 .fecha_select_ajudante').click(function(){  
        // $('#Add_Ajudante').show()      
        // $(this).siblings('select').remove()
        // $(this).remove()
        // myElement = document.querySelector("._ajd_js")
        // var exist = document.body.contains(myElement)
        // if(!exist){
        //     $('#Area_Ajudantes .area_sem_ajudante').html('<label class="sem_ajudante">Sem Ajudante? </label><input type="checkbox" name="SemAjudante" class="sem_ajudante" required/>')
        // }
        $('.ajudante2 select').attr('disabled','disabled')
        return false
    })
    $('.ajudante3 .fecha_select_ajudante').click(function(){  
        // $('#Add_Ajudante').show()      
        // $(this).siblings('select').remove()
        // $(this).remove()
        // myElement = document.querySelector("._ajd_js")
        // var exist = document.body.contains(myElement)
        // if(!exist){
        //     $('#Area_Ajudantes .area_sem_ajudante').html('<label class="sem_ajudante">Sem Ajudante? </label><input type="checkbox" name="SemAjudante" class="sem_ajudante" required/>')
        // }
        $('.ajudante3 select').attr('disabled','disabled')
        return false
    })



    //delegacao de eventos
    $('#Div_Add_Ajudante').on('click','a',function(){
        // $('#Add_Ajudante').show()
        // $(this).siblings('select').remove()
        // $(this).remove()
        // myElement = document.querySelector("._ajd_js")
        // var exist = document.body.contains(myElement)
        // if(!exist){
        //     $('#Area_Ajudantes .area_sem_ajudante').html('<label class="sem_ajudante">Sem Ajudante? </label><input type="checkbox" name="SemAjudante" class="sem_ajudante" required/>')
        // }
        // return false;
    });

    $('input[name="DigitarNotas"]').click(function(){
        // alert($(this).filter(':checked').val())
        if($(this).filter(':checked').val()=='on'){
            $('input[name="Notas[]"]').attr('disabled','disabled')
            $('textarea[name="NotasManual"]').removeAttr('disabled').attr('required','required').focus()
        }else{
            $('input[name="Notas[]"]').removeAttr('disabled')
            $('textarea[name="NotasManual"]').attr('disabled','disabled')
        }
    })
    //=============FORM ENTREGA==========================
    $('form[name="InsertAS"]').submit(function(){
        var NumeroAS = $('input[name="NumeroAS"]')
        var DestinoAS = $('input[name="DestinoAS"]')
        // var Ajudantes = $('input[name="Ajudantes[]"]')
        var Ajudantes = document.querySelectorAll('[name="Ajudantes[]"]')

        if(NumeroAS.val().length<8){
            console.log('o numero da AS digitado deve ter no minimo 8 digitos');
            return false
        }
        if(DestinoAS.val().length<3){
            console.log('o nome de destino digitado deve ter no minimo 3 digitos');
            return false
        }

        //==ajudantes
        
        // console.log(Ajudantes)
        var i=0
        Ajudantes.forEach(element => {
            if(element.disabled==true){
                i++
                // console.log(element)
            }else{
                console.log('ativo')
                console.log(element.value)
            }
        });
        if(i==3){
            console.log('confirmar sem ajudante.')
            console.log(confirm('confirmar sem ajudante?'));
        }
        // alert($ajudantes)
        // return false
    })
});

