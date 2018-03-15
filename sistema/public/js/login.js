jQuery(function($){

    var MSCAR = window.LOAD || {};

    var host = window.location.hostname;

    // se for usar ssl //

    /*if (host == "mscar") {
        adm_path = "http://mscar/"
    } else {
        adm_path = "https://mscar.siritecnologia.com.br/"
    }*/
    
    MSCAR.mascaras = function(){

    }

    MSCAR.login = function(){

        $(".loginForm").validate({

            errorClass: "error",

            rules: {
                email: {required: true, email: true},
                senha: {required: true}
            },
            messages: {
                email: {required: 'Campo obrigatório', email: 'Digite um email válido'},
                senha: {required: 'Campo obrigatório'}
            },

            submitHandler: function(form) {

                var dados = $('.loginForm');

                $.ajax({
                    type: "POST",
                    url: '/login',
                    data: dados.serialize(),

                    beforeSend: function() {

                        $('.loginForm button').text('acessando...');

                        $('input').prop('disabled', true);

                    },

                    success: function(data) {

                        $('.response').text('');

                        if (data.status == 501) {

                            $('.responseLogin').text('Email ou senha não conferem');

                            $('.responseLogin').show();

                        } else if (data.status == 502) {

                            $('.responseLogin').text('Preencha os campos obrigatórios.');

                        } else if (data.status == 200 ) {

                            window.location.replace("clientes");

                        } else {
                            $('.responseLogin').text('Ocorreu um erro interno, tente novamente...');

                            $('.responseLogin').show();
                        }

                        
                    },

                    error:function (data){

                        $('.responseLogin').text('Ocorreu um erro interno, tente novamente...');

                        $('.responseLogin').show();
                    },

                    complete: function (data){

                        $('input').prop("disabled", false);

                        $('.loginForm button').text('acessar');

                    }


                });
            }
        });

        $(".loginForm input").click( function(){
            $('.responseLogin').hide().text();
            $('.loginForm button').prop("disabled", false);
        });

    }

    MSCAR.recuperar = function(){

        $(".recuperar").validate({

            errorClass: "error",

            rules: {
                email: {required: true, email: true}
            },
            messages: {
                email: {required: 'Campo requerido', email: 'Digite um email válido'}
            },

            submitHandler: function(form) {

                var dados = $('.recuperar');

                $('.recuperar button').text('enviando instruções...');

                $.ajax({

                    type: "POST",
                    url: '/recuperar_senha',
                    data: dados.serialize(),

                    beforeSend: function(data){
                        $('.responseRecuperar').hide();
                    },

                    success: function(data) {

                        $('.recuperar button').text('enviar instruções');

                        if (data == 503) {
                            $('.responseRecuperar').text('Esse email não existe em nossos registros.');
                        } else if (data == 502) {
                            $('.responseRecuperar').text('Preencha os campos obrigatórios.');
                        } else if (data == 200 ) {
                            
                            $('.responseRecuperar').html('<span style="color:#35DE6E;"> As instruções foram enviadas com sucesso! </span>');
                            
                            $('.recuperar button').text('Enviado!').prop("disabled", true);

                            $('.recuVoltar').text('Voltar');

                        } else {
                            $('.responseRecuperar').text('Ocorreu um erro interno, tente novamente...');
                        }
                        
                    },

                    error:function (data){

                        $('.responseRecuperar').text('Ocorreu um erro interno, tente novamente...');
                        $('.recuperar button').text('Enviar instruções');

                        $('input').prop("disabled", false);
                    },
                    
                    complete: function(data){

                        $('.responseRecuperar').show();
                        $('input').prop("disabled", false);

                    }
                    

                });

            }

        });

        $(".recuperar input").on('click', function(){

            $('.responseRecuperar').html("");

            $('.recuperar button').text('Enviar instruções').prop("disabled", false);

            $('.recuperar .recuVoltar').text('Cancelar');

        });
    
    }

    MSCAR.reset = function(){

        $(".resetForm").validate({

            errorClass: "error",

            rules: {
                nova: {required: true, maxlength: 16, minlength: 6}, 
                confirmar: { required: true, equalTo : "#nova" },
            },
            messages: {
                nova: {required: 'Campo requerido', maxlength: 'Máximo 16 caracteres', minlength: 'Mínimo 6 caracteres'},
                confirmar: { required: 'Campo requerido', equalTo : "As senhas precisam ser iguais" },
            },

            submitHandler: function(form) {

                var dados = $('.resetForm');

                $.ajax({
                    type: "POST",
                    url: '/resetar_senha',
                    data: dados.serialize(),

                    beforeSend: function(data){
                        $('.resetForm button').text('salvando...');
                    },

                    success: function(data) {

                        $('.resetForm button').text('Salvar');

                        $('.responseReset').show();

                        if (data == 503) {
                            $('.responseReset').text('Dados de autenticação inválidos.');
                        } else if (data == 502) {
                            $('.responseReset').text('Preencha os campos obrigatórios.');
                        } else if( data == 504 ){
                            $('.responseReset').text('A senha precisa ter entre 6 a 16 caracteres.');
                        } else if( data == 505 ){
                            $('.responseReset').text('Senha e confirmar senha estão diferentes.');
                        } else if (data == 200 ) {
                            $('.responseReset').html('<span style="color:#35DE6E;"> Senha atualizada com sucesso! </span>');
                        } else {
                            $('.responseReset').text('Ocorreu um erro interno, tente novamente...');
                        }

                        $('input').prop("disabled", false);

                    },

                    error:function (data) {

                        $('.responseReset').text('Ocorreu um erro interno, tente novamente...');
                        $('.resetForm button').html('mudar');

                        $('input').prop("disabled", false);
                    }

                });
            }

        });
    
    }

    MSCAR.lembrar = function(){

    }
    
    
    MSCAR.editar = function(){
        
        $(".editarForm").validate({
            errorClass: "error",

            rules: {
                nome: {required: true},
                email: {required: true}, //campo de somente leitura, pois email é uma chave candidata e não pode haver repetições no BD
                senha: {required: true}
                
                
            },
            messages: {
                nome: {required: 'Campo requirido'},
                senha: {required: 'Campo obrigatório'}
            },    
            
            submitHandler: function(form) {
                
                var dados = $('.editarForm');
                
                $.ajax({
                    type: "POST",
                    url: '/editar_perfil',
                    data: dados.serialize(),

                    beforeSend: function(data){
                        $('.editarForm button').text('editando...');
                    },
                    
                    success: function(data) {
                        
                        $('.response').text('');

                        if (data.status == 501) {

                            $('.responseEdit').text('Erro ao editar cadastro, tente novamente...');

                            $('.responseEdit').show();

                        } else if (data.status == 502) {

                            $('.responseEdit').text('Preencha os campos obrigatórios.');

                        } else if (data.status == 200 ) {

                            window.location.replace("dashboard");

                        } else {
                            $('.responseEdit').text('Ocorreu um erro interno, tente novamente...');

                            $('.responseEdit').show();
                        }
                    },
                    
                     error:function (data) {

                        $('.responseEdit').text('Ocorreu um erro interno, tente novamente...');
                        $('.editarForm button').html('editar');

                        $('input').prop("disabled", false);
                    }
                    
                });
            }
        });
    }

    /* ==================================================
    Init
    ================================================== */

    $(document).ready(function(){

        $('main[onload]').trigger('onload');

        MSCAR.mascaras();
        MSCAR.login();
        MSCAR.recuperar();
        MSCAR.reset();
        MSCAR.lembrar();

    });    

});

$(function(){
    $(".recuLink").on('click', function(){
        $(".loginForm").removeClass('recuOn');
        $(".loginForm").toggle();
        $(".recuForm").fadeIn();
        $(".recuForm").addClass('recuOn');
    });

    $(".recuVoltar").on('click', function(){
        $(".recuForm").removeClass('recuOn');
        $(".recuForm").toggle();
        $(".loginForm").fadeIn();
        $(".loginForm").addClass('recuOn');
    });
});