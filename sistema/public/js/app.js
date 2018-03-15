jQuery(function($) {

    var MSCAR = window.LOAD || {};

    var host = window.location.hostname;

    // se for usar ssl //

    /*if (host == "mscar") {
        adm_path = "http://mscar/"
    } else {
        adm_path = "https://mscar.siritecnologia.com.br/"
    }*/

    MSCAR.mascaras = function() {

        var FormataNumero = function (val) {
            return val.replace(/\D/g, '').length === 9 ? '00000-0000' : '0000-00009';
        },

        Options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(FormataNumero.apply({}, arguments), options);
            }
        };

        $('.input-telefone').mask(FormataNumero, Options);

    }

    MSCAR.maxlength = function() {

        $(".js-maxlength").each(function() {
            var a = jQuery(this);
            a.maxlength({
                alwaysShow: !!a.data("always-show"),
                threshold: a.data("threshold") ? a.data("threshold") : 10,
                warningClass: a.data("warning-class") ? a.data("warning-class") : "label label-warning",
                limitReachedClass: a.data("limit-reached-class") ? a.data("limit-reached-class") : "label label-danger",
                placement: a.data("placement") ? a.data("placement") : "bottom",
                preText: a.data("pre-text") ? a.data("pre-text") : "",
                separator: a.data("separator") ? a.data("separator") : "/",
                postText: a.data("post-text") ? a.data("post-text") : ""
            });
        });

    }

    MSCAR.externas = function() {

    }

    MSCAR.jsSelect = function() {

        $(".js-select2").select2({
            "language": {
                "noResults": function(){
                    return "Nenhum resultado encontrado.";
                }
            },
        });

    }
	
	MSCAR.graficosRelatorios = function() {

    new Chart(document.getElementById("myChart"), {
      type: 'doughnut',
        data: {
          labels: ["Categoria 1", "Categoria 2", "Categoria 3"],
          datasets: [
            {
              label: "Serviços (dezenas)",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
              data: [2478,5267,734]
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Quantidade de atendimento por serviço'
          }
        }
    });


    new Chart(document.getElementById("chartLine"), {
      type: 'line',
      data: {
        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
        datasets: [{ 
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "serviço 1",
            borderColor: "#3e95cd",
            fill: false
          }, { 
            data: [282,350,411,502,635,809,947,1402,3700,5267],
            label: "serviço 2",
            borderColor: "#8e5ea2",
            fill: false
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Quantidade de serviços por venda'
        }
      }
    });


    new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
          labels: ["1900", "1950", "1999", "2050"],
          datasets: [
            {
              label: "Serviços 1",
              backgroundColor: "#3e95cd",
              data: [133,221,783,2478]
            }, {
              label: "Serviços 2",
              backgroundColor: "#8e5ea2",
              data: [408,547,675,734]
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Quantidade de serviços entregues'
          }
        }
    });



    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
          labels: ["serviço 1", "serviço 2", "serviço 3"],
          datasets: [{
            label: "Horas (H)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
            data: [2478,5267,734]
          }]
        },
        options: {
          title: {
            display: true,
            text: 'Total de horas trabalhadas'
          }
        }
    });
	}

    /* ==================================================
    
    ================================================== */

    $(document).ready(function() {

        $('main[onload]').trigger('onload');

        MSCAR.mascaras();
        MSCAR.maxlength();
        MSCAR.externas();
        MSCAR.jsSelect();
		    MSCAR.graficosRelatorios();
    });



    /* Funções */

    sidebarClick();
    menuMainClick();


    /* Funções externas */

    $(".usuario-box").on('click', function(){
        $(this).toggleClass('usuario-boxOn');
        $(this).find('.dropdown').toggleClass('dropup');
    });

    /* Produto */




    $('#visualizarProduto').on('click', function(){
      $('.content').addClass('blur');
      $(".modal-produto").fadeIn(200);
      $('.more-box').removeClass('more-boxOn');
  });





    /* Produto */

    /* Clientes */

    $('.backFormTodos').on('click', function() {

        $('.form-todosClientes').css('right', '-100%');
        $('html, body').animate({
            scrollTop: 83
        }, 'slow');
        $('.form-novosClientes').css('margin-left', '6.8em');

    });

    $(".todosClientes-box").find('.ion-more').on('click',function(){
       $(this).siblings('.more-box').toggleClass('more-boxOn');
   });

    $('#moreExcluir').on('click', function(){
       $(this).parent().parent().fadeOut();
   });


    $('.dadosPessoaisSpan').on('click',function(){
       $('.modal-cliente-dadosPessoais').slideToggle(350);
       $(this).find('i').toggleClass('arrowUp');
   });

    $('.carrosVeinculadosSpan').on('click',function(){
       $('.modal-cliente-carros').slideToggle(350);
       $(this).find('i').toggleClass('arrowUp');
   });

    $('.historicoSpan').on('click',function(){
       $('.modal-cliente-historico').slideToggle(350);
       $('.modal-cliente-historico').toggleClass('modal-cliente-historicoOn');
       $(this).find('i').toggleClass('arrowUp');
   });

    $('#moreComunicado').on('click', function(){
       $('.content').addClass('blur');
       $(".modal-cliente").fadeIn(200);
       $('.more-box').removeClass('more-boxOn');
   });

    $('.closeModal').on('click', function(){
       $('.content').removeClass('blur');
       $(".modal-cliente").fadeOut(200);
       $(".modal-pedidos").fadeOut(200);
       $(".modal-servico").fadeOut(200);
       $(".modal-orcamento").fadeOut(200);
       $(".modal-estoque").fadeOut(200);
       $(".modal-produto").fadeOut(200);
       $('.pedidos-orcamento-content').hide();
       $('.pedidos-checklist-content').show();
       $('.btnEnviarOrcamento').fadeOut();
       $('.btnVisuOrcamento').fadeIn();
   });

    /* Clientes */

    /* Processos */


    $(".inputSwitch").on('click', function() {
        if ($(this).is(':checked'))
            $(this).siblings('.valorSwitch').text('SIM');
        else
            $(this).siblings('.valorSwitch').text('NÃO');
    });


    /*$('.novaOrdem-form').find('a').on('click', function() {

        $('.processos-etapas').find('li').css('background-color', '#266CB8');
        $('.processos-etapas').find('li').css('color', '#FFF');

        $('.processos-etapas').find('#processos2').css('background-color', '#FFF');
        $('.processos-etapas').find('#processos2').css('color', 'rgba(51,63,82,0.3)');


        $('.novaOrdem-form').css('margin-left', '-81em');
        $('html, body').animate({scrollTop:79}, 'slow');

        $('.checklist-deSeguranca').css('right', '7%');
    });*/

    $('.voltarBtn').on('click', function() {

        $('.processos-etapas').find('li').css('background-color', '#266CB8');
        $('.processos-etapas').find('li').css('color', '#FFF');

        $('.processos-etapas').find('#processos1').css('background-color', '#FFF');
        $('.processos-etapas').find('#processos1').css('color', 'rgba(51,63,82,0.3)');

        $('.checklist-deSeguranca').css('right', '-100%');
        $('html, body').animate({
            scrollTop: 90
        }, 'slow');
        $('.novaOrdem-form').css('margin-left', '6.8em');

    });


    $('.deSeguranca-i').find('i').on('click', function() {
        $(this).toggleClass('deSeguranca-iOn');
        $('.deSeguranca-box').toggleClass('deSegurancaOn');
    });


    $('.deSeguranca-checklist').on('click', function() {
        $(this).find('.slider').removeClass('nAvaliado');
    });


    $('.pedidos-status').on('click', function() {
        $(this).find('.status-todos').toggle();

        $(this).find('#status-feito').on('click', function() {
            $(this).parent().parent().find('#status-atual').text('Feito');
            $(this).parent().parent().removeClass('atrasado');
            $(this).parent().parent().removeClass('emAndamento');
            $(this).parent().parent().addClass('feito');
            $(this).parent().removeClass('atrasado');
            $(this).parent().removeClass('emAndamento');
            $(this).parent().addClass('feito');
            $(this).parent().find('p').removeClass('atrasadoHover');
            $(this).parent().find('p').removeClass('emAndamentoHover');
            $(this).parent().find('p').addClass('feitoHover');

        });
        
        $(this).find('#status-andamento').on('click', function() {
            $(this).parent().parent().find('#status-atual').text('Em andamento');
            $(this).parent().parent().removeClass('atrasado');
            $(this).parent().parent().removeClass('feito');
            $(this).parent().parent().addClass('emAndamento');
            $(this).parent().removeClass('atrasado');
            $(this).parent().removeClass('feito');
            $(this).parent().addClass('emAndamento');
            $(this).parent().find('p').removeClass('atrasadoHover');
            $(this).parent().find('p').removeClass('feitoHover');
            $(this).parent().find('p').addClass('emAndamentoHover');

        });

        $(this).find('#status-atrasado').on('click', function() {
            $(this).parent().parent().find('#status-atual').text('Atrasado');
            $(this).parent().parent().removeClass('emAndamento');
            $(this).parent().parent().removeClass('feito');
            $(this).parent().parent().addClass('atrasado');
            $(this).parent().removeClass('emAndamento');
            $(this).parent().removeClass('feito');
            $(this).parent().addClass('atrasado');
            $(this).parent().find('p').removeClass('emAndamentoHover');
            $(this).parent().find('p').removeClass('feitoHover');
            $(this).parent().find('p').addClass('atrasadoHover');

        });

    });

    $('.orcamento-status').on('click', function() {

        $(this).find('.status-todos').toggle();

        $(this).find('#status-enviado').on('click', function() {
            $(this).parent().parent().find('#status-atual').text('Orçamento enviado');
            $(this).parent().parent().removeClass('emAndamento');
            $(this).parent().parent().addClass('enviado');
            $(this).parent().removeClass('emAndamento');
            $(this).parent().addClass('enviado');
            $(this).parent().find('p').removeClass('emAndamentoHover');
            $(this).parent().find('p').addClass('enviadoHover');

        });
        $(this).find('#status-aguardando').on('click', function() {
            $(this).parent().parent().find('#status-atual').text('Aguardando');
            $(this).parent().parent().removeClass('enviado');
            $(this).parent().parent().addClass('emAndamento');
            $(this).parent().removeClass('enviado');
            $(this).parent().addClass('emAndamento');
            $(this).parent().find('p').removeClass('enviadoHover');
            $(this).parent().find('p').addClass('emAndamentoHover');

        });

    });


    $('.pedidos-checklist').on('click', function(){
      $(this).find('.slider').removeClass('nAvaliado');
  });


    $('.itensCompraSpan').on('click',function(){
      $('.modal-estoque-container').slideToggle(350);
      $(this).find('i').toggleClass('arrowUp');
  });

    $('.checklistSpan').on('click',function(){
      $('.modal-pedidos-avaliacoes').slideToggle(350);
      $(this).find('i').toggleClass('arrowUp');

  });

    $('.itensSpan').on('click',function(){
      $('.modal-pedidos-itens').slideToggle(350);
      $(this).find('i').toggleClass('arrowUp');

  });

    $(".pedidos-box").find('.ion-more').on('click',function(){
      $(this).siblings('.more-box').toggleClass('more-boxOn');
  });

    $('#gerarOrcamento').on('click', function(){
      $('.content').addClass('blur');
      $(".modal-pedidos").fadeIn(200);
      $('.more-box').removeClass('more-boxOn');
  });

    $('#visualizarOrcamento').on('click', function(){
      $('.content').addClass('blur');
      $(".modal-orcamento").fadeIn(200);
      $('.more-box').removeClass('more-boxOn');
  });


    $('.span-pedidosLabel i').on('click', function(){
      $(this).toggleClass('iAtivo');
      $(this).siblings('.itemOrcamento-box').toggle();
  });

    $(".btnVisuOrcamento").on('click', function(){
      $('.pedidos-checklist-content').fadeOut();
      $('.pedidos-orcamento-content').fadeIn();

      $(this).fadeOut();
      $('.btnEnviarOrcamento').fadeIn();

  });
    /* Processos */

    $(".servico-box").find('.ion-more').on('click',function(){
       $(this).siblings('.more-box').toggleClass('more-boxOn');
   });


    $(".servicoAguardando-box").find('.ion-more').on('click',function(){
       $(this).siblings('.more-box').toggleClass('more-boxOn');
   });

    /* Serviços */

    $('#visualizarProcesso').on('click', function(){
      $('.content').addClass('blur');
      $(".modal-Ordensservico").fadeIn(200);
      $('.more-box').removeClass('more-boxOn');
  });

    $(".servicobox").find('.ion-more').on('click',function(){
      $(this).siblings('.more-box').toggleClass('more-boxOn');
  });

    $('.servicoItensSpan').on('click',function(){
      $('.modal-servico-itens').slideToggle(350);
      $(this).find('i').toggleClass('arrowUp');
  });
    $('.AvaliacoeschecklistSpan').on('click',function(){
      $('.modal-servico-avaliacoes').slideToggle(350);
      $(this).find('i').toggleClass('arrowUp');
  });

    $('.servicoAguardando').on('click', function() {
        $('.servicoAguardando-box').slideToggle(350);
        $(this).find('i').toggleClass('servicoAguardando-boxToggle');
    });

    $('.servicoProcessamento').on('click', function() {
        $('.servicoProcessamento-box').slideToggle(350);
        $(this).find('i').toggleClass('servico-boxToggle');
    });

    $('.servicoEntregues').on('click', function() {
        $('.servicoEntregues-box').slideToggle(350);
        $(this).find('i').toggleClass('servico-boxToggle');
    });

    $('.servico-status').on('click', function() {

      $(this).find('.status-todos').toggle();

      $(this).find('#status-feito').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Feito');
        $(this).parent().parent().removeClass('atrasado');
        $(this).parent().parent().removeClass('emAndamento');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().removeClass('concluido');
        $(this).parent().parent().addClass('feito');
        $(this).parent().removeClass('atrasado');
        $(this).parent().removeClass('emAndamento');
        $(this).parent().removeClass('concluido');
        $(this).parent().removeClass('aguardo');
        $(this).parent().addClass('feito');
        $(this).parent().find('p').removeClass('atrasadoHover');
        $(this).parent().find('p').removeClass('emAndamentoHover');
        $(this).parent().find('p').removeClass('concluidoHover');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('feitoHover');

    });

    $('.status-entregue').on('click', function(){

      var hidden = $('.status-entregue input').val();

      var e = $('.status-entregue input').data('id');
      
      var status = $('.status-entregue-atual').text();

      $('.status-entregue input').val(status);

      if (hidden != status) {
        $.ajax({
          type: "GET",
          url: '/ordens/entregues/atualizar?servico='+e+'&status='+status,

          beforeSend: function(){
          },

          success: function(data) {
            // solicitação sucesso
          },

          error:function (data){
            // feedback de erro
          },

          complete: function (data){
            // solicitação completada
          }

        });
      }

    });

    $('.status-processamento').on('click', function(){

      var hidden = $('.status-processamento input').val();

      var e = $('.status-processamento input').data('id');
      
      var status = $('.status-processamento-atual').text();

      $('.status-processamento input').val(status);

      if (hidden != status) {

        var comunicado_texto = $('.comunicado_texto').val();

        var comunicado_revisao = $('.comunicado_revisao').val();

        if (status == 'Concluido') {
          return false;
        }

        $.ajax({
          type: "GET",
          url: '/ordens/processamento/atualizar?servico='+e+'&status='+status,

          beforeSend: function(){
          },

          success: function(data) {
            // solicitação sucesso
          },

          error:function (data){
            // feedback de erro
          },

          complete: function (data){
            // solicitação completada
          }

        });
      }

    });

    $('.status-estoque').on('click', function(){

      var hidden = $('.status-estoque input').val();

      var e = $('.status-estoque input').data('id');
      
      var status = $('.status-estoque-atual').text();

      $('.status-estoque input').val(status);

      if (hidden != status) {

        $.ajax({
          type: "GET",
          url: '/ordens/estoque/atualizar?servico='+e+'&status='+status,

          beforeSend: function(){
          },

          success: function(data) {
            
            if (status == "Feito") {
              window.location.href = '/ordens';
            }

          },

          error:function (data){
            // feedback de erro
          },

          complete: function (data){
            // solicitação completada
          }

        });
      }

    });


    $(this).find('#status-andamento').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Em andamento');
        $(this).parent().parent().removeClass('atrasado');
        $(this).parent().parent().removeClass('feito');
        $(this).parent().parent().removeClass('concluido');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().addClass('emAndamento');
        $(this).parent().removeClass('atrasado');
        $(this).parent().removeClass('feito');
        $(this).parent().removeClass('concluido');
        $(this).parent().removeClass('aguardo');
        $(this).parent().addClass('emAndamento');
        $(this).parent().find('p').removeClass('atrasadoHover');
        $(this).parent().find('p').removeClass('feitoHover');
        $(this).parent().find('p').removeClass('concluidoHover');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('emAndamentoHover');

    });

      $(this).find('#status-atrasado').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Atrasado');
        $(this).parent().parent().removeClass('emAndamento');
        $(this).parent().parent().removeClass('feito');
        $(this).parent().parent().removeClass('emCompra');
        $(this).parent().parent().removeClass('concluido');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().addClass('atrasado');
        $(this).parent().removeClass('emAndamento');
        $(this).parent().removeClass('feito');
        $(this).parent().removeClass('emCompra');
        $(this).parent().removeClass('concluido');
        $(this).parent().removeClass('aguardo');
        $(this).parent().addClass('atrasado');
        $(this).parent().find('p').removeClass('emAndamentoHover');
        $(this).parent().find('p').removeClass('emCompraHover');
        $(this).parent().find('p').removeClass('feitoHover');
        $(this).parent().find('p').removeClass('concluidoHover');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('atrasadoHover');

    });

      $(this).find('#status-compra').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Em compra');
        $(this).parent().parent().removeClass('emAndamento');
        $(this).parent().parent().removeClass('feito');
        $(this).parent().parent().removeClass('atrasado');
        $(this).parent().parent().removeClass('concluido');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().addClass('emCompra');
        $(this).parent().removeClass('emAndamento');
        $(this).parent().removeClass('feito');
        $(this).parent().removeClass('concluido');
        $(this).parent().removeClass('aguardo');
        $(this).parent().removeClass('atrasado');
        $(this).parent().addClass('emCompra');
        $(this).parent().find('p').removeClass('emAndamentoHover');
        $(this).parent().find('p').removeClass('feitoHover');
        $(this).parent().find('p').removeClass('atrasadoHover');
        $(this).parent().find('p').removeClass('concluidoHover');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('emCompraHover');

    });
      
      $(this).find('#status-concluido').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Concluido');
        $(this).parent().parent().removeClass('emAndamento');
        $(this).parent().parent().removeClass('feito');
        $(this).parent().parent().removeClass('atrasado');
        $(this).parent().parent().removeClass('emCompra');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().addClass('concluido');
        $(this).parent().removeClass('emAndamento');
        $(this).parent().removeClass('feito');
        $(this).parent().removeClass('atrasado');
        $(this).parent().removeClass('emCompra');
        $(this).parent().removeClass('aguardo');
        $(this).parent().addClass('concluido');
        $(this).parent().find('p').removeClass('emAndamentoHover');
        $(this).parent().find('p').removeClass('feitoHover');
        $(this).parent().find('p').removeClass('atrasadoHover');
        $(this).parent().find('p').removeClass('emCompraHover');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('concluidoHover');

        $(".conclusao-box").fadeIn();

    });

      $('.closeConclusao').on('click', function(){
        $(".conclusao-box").fadeOut();
    });

      $(this).find('#status-aguardo').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Em aguardo');
        $(this).parent().parent().removeClass('emAndamento');
        $(this).parent().parent().removeClass('feito');
        $(this).parent().parent().removeClass('atrasado');
        $(this).parent().parent().removeClass('emCompra');
        $(this).parent().parent().removeClass('concluido');
        $(this).parent().parent().removeClass('entregue');
        $(this).parent().parent().addClass('aguardo');
        $(this).parent().removeClass('emAndamento');
        $(this).parent().removeClass('feito');
        $(this).parent().removeClass('atrasado');
        $(this).parent().removeClass('emCompra');
        $(this).parent().removeClass('concluido');
        $(this).parent().removeClass('entregue');
        $(this).parent().addClass('aguardo');
        $(this).parent().find('p').removeClass('emAndamentoHover');
        $(this).parent().find('p').removeClass('feitoHover');
        $(this).parent().find('p').removeClass('atrasadoHover');
        $(this).parent().find('p').removeClass('emCompraHover');
        $(this).parent().find('p').removeClass('concluidoHover');
        $(this).parent().find('p').removeClass('entregueHover');
        $(this).parent().find('p').addClass('aguardoHover');

    });

      $(this).find('#status-entregue').on('click',function(){
        $(this).parent().parent().find('#status-atual').text('Entregue');
        $(this).parent().parent().removeClass('aguardo');
        $(this).parent().parent().addClass('entregue');
        $(this).parent().removeClass('aguardo');
        $(this).parent().addClass('entregue');
        $(this).parent().find('p').removeClass('aguardoHover');
        $(this).parent().find('p').addClass('entregueHover');
    });

  });

/* Serviços */


/* Relatorios */

$(".relatorios-etapas").find('li').on('click', function(){
  $(".relatorios-etapas").find('li').css('background-color', '#fff');
  $(".relatorios-etapas").find('li').css('color', 'rgba(51,63,82,0.3)');
  $(this).css('background-color', '#266CB8');
  $(this).css('color', '#fff');
});

$("#relatorios1").on('click', function(){
  $('.orcamento-container').fadeOut();
  $('.relatorio-container').fadeOut();
  $('.orcamento-container').removeClass('containerOn');
  $('.relatorio-container').removeClass('containerOn');
  $('.processamentos-container').fadeIn();
  $('.processamentos-container').addClass('containerOn');
});

$("#relatorios2").on('click', function(){
  $('.processamentos-container').fadeOut();
  $('.relatorio-container').fadeOut();
  $('.processamentos-container').removeClass('containerOn');
  $('.relatorio-container').removeClass('containerOn');
  $('.orcamento-container').fadeIn();
  $('.orcamento-container').addClass('containerOn');
});

$("#relatorios3").on('click', function(){
  $('.processamentos-container').fadeOut();
  $('.orcamento-container').fadeOut();
  $('.processamentos-container').removeClass('containerOn');
  $('.orcamento-container').removeClass('containerOn');
  $('.relatorio-container').fadeIn();
  $('.relatorio-container').addClass('containerOn');
});

});


/* Relatorios */

function sidebarClick() {

    $('.item-menu').on('click', function() {
        $('.active-menu').fadeOut(300);
        $('.item-menu').find('.icone-menu').css('color', '#c5c9ce');
        $(this).find('.active-menu').fadeIn(300);
        $(this).find('.icone-menu').css('color', '#4DA1FF');

        // if($(this).attr('id') == 'item1')
        // {
        //     $('section').fadeOut();
        //     $('#newClientes').fadeIn();
        //     $('#newClientes').css('position','relatives');
        //     $('.clientesMenu').fadeIn();
        //     $('.clientesMenu').css('display', 'flex');
        //     $('.menuMain-link').css('color', '#8B8B8B');
        //     $('.menuMain-link').css('border-bottom', 'none');
        //     $('#link1').css('color','#4DA1FF');
        //     $('#link1').css('border-bottom', '3px solid rgb(77, 161, 255)');
        // }
    });

}

function menuMainClick() {

    $(".menuMain-link").on('click', function() {
        $('.menuMain-link').css('color', '#8B8B8B');
        $('.menuMain-link').css('border-bottom', 'none');
        $(this).css('color', '#4DA1FF');
        $(this).css('border-bottom', '3px solid rgb(77, 161, 255)');
    });

    $("#link1").on('click', function() {
        $("#todosClientes").fadeOut();
        $("#newClientes").fadeIn();
    });
    $("#link2").on('click', function() {
        $("#newClientes").fadeOut();
        $("#todosClientes").fadeIn();
    });
}

function busca_cep(e){

    var cep = e.replace(/[^0-9]/, "");

    if(cep.length != 8){
        return false;
    }

    var url = "https://viacep.com.br/ws/"+cep+"/json/";

    $.getJSON(url, function(dadosRetorno){

        try{

            $(".endereco").val(dadosRetorno.logradouro).removeClass('error');
            $(".bairro").val(dadosRetorno.bairro).removeClass('error');
            $(".cidade").val(dadosRetorno.localidade).removeClass('error');
            $('.uf option[value='+dadosRetorno.uf+']').attr('selected','selected');
            $('.uf').removeClass('error');
            $('.spanCEP input').removeClass('error');
            //$(".lugar").val(dadosRetorno.localidade+'/'+dadosRetorno.uf);

        } catch(ex){

        }

    });

}

function tipo_pessoa(e){
    if (e == 1) {
        $('.spanCPF').show();
        $('.spanCNPJ').hide();
    } else {
        $('.spanCPF').hide();
        $('.spanCNPJ').show();
    }

}

function proximo(e, a){

    $('.'+e+' input').removeClass('error');
    $('.'+e+' select').removeClass('error');
    $('.'+e+' textarea').removeClass('error');

    var error = false;

    var values = $('.'+e+' .required').map(function(idx, elem) {

        elemento = $(elem).val();

        if (elemento == "") {
            $(elem).addClass('error');
            error = true;
        }
        
        return $(elem).val();

    }).get();

    if (error != true) {

        $('.'+e).css('margin-left', '-90em');
        $('html, body').animate({scrollTop: 0}, 'slow');
        $('.'+a).css('right', '7%');

    }

    $('.'+e).on("keypress", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });

    $('.'+e).on("change", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });
    
}

function required(){

  $('.forms').on("keypress", ".required", function () {
    if ($(this).hasClass("error")){
      $(this).removeClass("error");
    }
  });

  $('.forms').on("change", ".required", function () {
    if ($(this).hasClass("error")){
      $(this).removeClass("error");
    }
  });

  $('.alert').hide();

  $('input').removeClass('error');
  $('select').removeClass('error');
  $('textarea').removeClass('error');

  $('form > button').text('Salvando...');

  var error = false;

  var values = $('.required').map(function(idx, elem) {

    elemento = $(elem).val();

    if (elemento == "") {
      $(elem).addClass('error');
        error = true;
      }
        
      return $(elem).val();

  }).get();

  if (error == true) {
        
        // preencher campos obrigatórios

        $('form > button').text('Salvar');
        
        return false;

  } else {
        
        $('form > button').text('Salvar');

        $('form').submit();
  }
    
}

function salvar_cliente(){

    $('.dados-carros input').removeClass('error');
    $('.dados-carros select').removeClass('error');
    $('.dados-carros textarea').removeClass('error');

    var error = false;

    var values = $('.dados-carros .required').map(function(idx, elem) {

        elemento = $(elem).val();

        if (elemento == "") {
            $(elem).addClass('error');
            error = true;
        }
        
        return $(elem).val();

    }).get();

    if (error != true) {

        var dados = $('.formCliente').serialize();

        $.ajax({
            type: "POST",
            url: '/clientes/novo',
            data: dados,

            beforeSend: function(){
            },

            success: function(data) {

              if (data == 200) {
                window.location.href = '/clientes/todos';
              } 

            },

            error:function (data){

            },

            complete: function (data){

            }

        });

    }

    $('.dados-carros').on("keypress", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });

    $('.dados-carros').on("change", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });

}

function carros_cliente(e){

    $.ajax({
        type: "GET",
        url: '/busca_carros?cliente='+e,

        beforeSend: function(){

            $('#carro').empty();
        },

        success: function(data) {

            if (e == "") {
                $('#carro').append('<option value="" class="label">Selecione o cliente...</option>');
            } else if(data == ""){
                $('#carro').append('<option value="" class="label">Nenhum resultado encontrado</option>');
            }

            for (var i = 0; i < data.length; i++) {
                $('#carro').append('<option value="'+data[i].id+'">'+data[i].modelo+'</option>');
            }

        },

        error:function (data){

        },

        complete: function (data){

        }

    });

}

$('.box-add-fotos input').on('change', function(){

    var name_class= $(this).attr('id');

    if ($(this).val() != "") {

        $('.'+name_class).text('Adicionadas');

    } else {

        $('.'+name_class).text('Adicionar Fotos');

    }

});

function destroy(){
  $('.alert').remove();
}

function visualizarChecklist(id){

  $.ajax({
    type: "GET",
    url: '/ordens/estoque/checklist?id='+id,

    beforeSend: function(){
    },

    success: function(data) {
      $('.nome-cliente').text(data.dados.cliente);
      $('.modelo-carro').text(data.dados.carro);
      $('.previsao').text(data.dados.previsao);

      for (var i = 0; i < data.produtos.length; i++) {

        if (data.produtos[i].status == 1) {
          checked = 'checked';
        } else {
          checked = '';
        }

        $('.modal-estoque-container').append(
          '<span class="span-pedidosLabel">'+
            '<label class="switch pedidos-checklist" for="cod'+data.produtos[i].id+'">'+
              '<input type="checkbox" id="cod'+data.produtos[i].id+'" name="cod_'+data.produtos[i].id+'" class="inputSwitch" '+checked+' onchange="atualiza_checklist_produto('+data.produtos[i].id+', '+data.produtos[i].status+')">'+
              '<span class="slider round"></span>'+
              '<p id="switch" class="Encodes Encode1">'+data.produtos[i].nome+'</p>'+
            '</label>'+
          '</span>'
        );
      }
    },

    error:function (data){

    },

    complete: function (data){

    }

  });

  $('.content').addClass('blur');
  $(".modal-estoque").fadeIn(200);
  $('.more-box').removeClass('more-boxOn');

}

function atualiza_checklist_produto(id, status){

  $.ajax({
    type: "GET",
    url: '/ordens/estoque/produto/atualizar?id='+id+'&status='+status,

    success: function(data) {
    
    }

  });
  
}

function criar_ordem(){

    $('.novaOrdem-form input').removeClass('error');
    $('.novaOrdem-form select').removeClass('error');
    $('.novaOrdem-form textarea').removeClass('error');

    var error = false;

    var values = $('.novaOrdem-form .required').map(function(idx, elem) {

        elemento = $(elem).val();

        if (elemento == "") {
            $(elem).addClass('error');
            error = true;
        }
        
        return $(elem).val();

    }).get();

    if (error != true) {

        var dados = $('.novaOrdem-form').serialize();

        $.ajax({
            type: "POST",
            url: '/ordens/criar',
            data: dados,

            beforeSend: function(){
            },

            success: function(data) {

              if (data == 200) {
                window.location.href = '/pedidos';
              } 

            },

            error:function (data){

            },

            complete: function (data){

            }

        });

    }

    $('.dados-carros').on("keypress", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });

    $('.dados-carros').on("change", ".required", function () {
        if ($(this).hasClass("error")){
            $(this).removeClass("error");
        }
    });

}