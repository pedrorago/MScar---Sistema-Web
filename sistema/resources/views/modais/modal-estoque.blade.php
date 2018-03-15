
<div class="modal modal-servico modal-estoque">
    <div class="header-modal">
        <i class="ion-android-close closeModal"></i>
        <span>
            <p class="Sources Source1">Cliente</p>
            <h4 class="Encodes Encode1 nome-cliente"></h4>
        </span>
        <span>
            <p class='Sources Source1'>Carro</p>
            <h4 class='Encodes Encode1 modelo-carro'></h4>
        </span>
        <span>
            <p class='Sources Source1'>Previsão de entrega</p>
            <h4 class='Encodes Encode1 previsao'></h4>
        </span>
    </div>

    <div class='modal-content  modal-estoque-content'>

        <span class='spanModalClientes itensCompraSpan'>
            <i class='ion-android-arrow-dropup'></i>
            <h3 class='Encodes Encode1'>Itens para comprar</h3>                
        </span>

        <div class='modal-container  modal-estoque-container'></div>


        <div class='deSeguranca-i'>
            <span class='deSeguranca-box'>

                <div class='deSeguranca-info'>

                    <label class="switch deSegurancaInfo-switch" >
                        <input type="checkbox" class='inputSwitch' disabled="disabled">
                        <span class="slider round"></span>
                        <p class='Encodes Encode1 deSeguranca-label'>Item não comprado</p>
                    </label>

                    <label class="switch">
                        <input type="checkbox" class='inputSwitch' checked="checked" disabled="disabled">
                        <span class="slider round"></span>
                        <p class='Encodes Encode1 deSeguranca-label'>Comprado</p>
                    </label>

                </div>
                <i class="ion-information-circled infoIcone"></i>
            </span>
        </div>

    </div>

</div>