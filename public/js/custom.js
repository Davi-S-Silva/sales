// tirar foto
// https://www.youtube.com/watch?app=desktop&v=CBWkMNo6px8&ab_channel=Jo%C3%A3oTinti
// alert('oi')
const video = document.querySelector('#video');
const specs = {video:{width:1080, aspectRatio:21/9}}
navigator.mediaDevices.getUserMedia(specs)
.then(stream => {
    video.srcObject= stream;
    
})
.catch();

document.querySelector('button').addEventListener('click', () => {
    var canvas = document.querySelector('canvas');
    canvas.height = specs.video.height;
    canvas.width = specs.video.width;
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0);
    var link = document.createElement('a');
    link.download = 'foto.png';
    link.href = canvas.toDataURL();
    link.textContent = 'Clique para baixar a imagem';
    document.body.appendChild(link);    
    console.log(link.href)   
    // link.click()
});

// alert('ola');
// Carregar o espaço para o preview da imagem
var redimensionar = $('#preview').croppie({
    // Ativar a leitura de orientação para renderizar corretamente a imagem
    enableExif: true,
    // Ativar orientação personalizada
    enableOrientation: true,
    // O recipiente interno do coppie. A parte visível da imagem
    viewport: {
        width: 700,
        height:150,
        type: 'square'
    },
    // O recipiente externo do cortador
    boundary: {
        width: 800,
        height: 200
    }
});

// Executar a instrução quando o usuário selecionar uma imagem
$('#imagem').on('change', function () {

    // FileReader para ler de forma assincrona o conteúdo dos arquivos
    var reader = new FileReader();

    // onload - Execute após ler o conteúdo
    reader.onload = function (e) {
        redimensionar.croppie('bind', {
            // Recuperar a imagem base64
            url: e.target.result
        });
    }

    // O método readAsDataURL é usado para ler o conteúdo do tipo Blob ou File
    reader.readAsDataURL(this.files[0]);
});

// Executar a instrução quando o usuário clicar no botão enviar
$('.btn-upload-imagem').on('click', function () {
    
    redimensionar.croppie('result', {
        type: 'canvas', // Tipo de arquivos permitidos - base64, html, blob
        size: 'viewport' // O tamanho da imagem cortada
    }).then(function (img){
        $('form[name="loadFoto"]').submit(function(){
            var dados = $(this).serializeArray();
            dados.push({name: "imagem", value: img});
            $.ajax({
                type: "post", // Método utilizado para enviar os dados
                data: $.param(dados),
                url: "/admin/upload", // Enviar os dados para o arquivo upload.php
                success: function(response){
                    // sweetalert - https://celke.com.br/artigo/como-usar-sweetalert-no-formulario-com-javascript-e-php
                    alert(response);
                    window.location="/admin";
                },
                error:function(){
                    alert('erro')
                }
            });
            return false;
        })
        // alert('ola')
        // Enviar os dados para um arquivo PHP
       
    });
});