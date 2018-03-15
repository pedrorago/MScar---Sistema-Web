
<div class='modal modal-pedidos'>
    <div class='header-modal'>
        <i class='ion-android-close closeModal'></i>
        <span>
            <p class='Sources Source1'>Nome</p>
            <h4 class='Encodes Encode1'>Nome do Cliente Completo</h4>
            <p class='Sources Source1'>Carro</p>
            <h4 class='Encodes Encode1'>Corolla ABC-1234</h4>
        </span>
        <span>
            <p class='Sources Source1'>Previsão de entrega</p>
            <h4 class='Encodes Encode1'>00/00/0000</h4>
        </span>
        <a href="javascript:void(0)" class='btn-secondary btnVisuOrcamento'>Visualizar orçamentos</a>
        <a href="javascript:void(0)" class='btn-secondary btnEnviarOrcamento'>Enviar orçamento</a>
    </div>

    <div class='modal-content pedidos-checklist-content'>
        <span class='spanModalClientes checklistSpan'>
            <i class='ion-android-arrow-dropup'></i>
            <h3 class='Encodes Encode1'>Avaliações do checklist</h3>                
        </span>
        <div class='modal-container modal-pedidos-avaliacoes'>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
            </span>
        </div>

        <span class='spanModalClientes itensSpan'>
            <i class='ion-android-arrow-dropdown'></i>
            <h3 class='Encodes Encode1'>Itens complementares para revisão completa</h3>                
        </span>
        <div class='modal-container modal-pedidos-itens'>
            <label class='labelveiculo'>Veículo no chão</label>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='scanner'>
                    <input type="checkbox" id='scanner' name='scanner' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Verificar códigos de falhas via scanner</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='ultimaRevisao'>
                    <input type="checkbox" id='ultimaRevisao' name='ultimaRevisao' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Checar última revisão (Ex. Velas, filtros, óleo, correias)</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='FreioEservofreio'>
                    <input type="checkbox" id='FreioEservofreio' name='FreioEservofreio' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Freio e servofreio</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='valvulaDeRetencao'>
                    <input type="checkbox" id='valvulaDeRetencao' name='valvulaDeRetencao' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Válvula de retenção do servofreio, mangueira e coletor de admissão do motor</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>

                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <label class='labelveiculo'>Veículo no elevador</label>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>

                </div>
            </span>

            <label class='labelveiculo'>Inspeção final e teste de rodagem</label>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>


            <label class='labelveiculo'>Extensão de serviços (aprovação do cliente)</label>

            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>

                </div>

            </span>
            <span class='span-pedidosLabel'>
                <label class="switch pedidos-checklist" for='Próximo'>
                    <input type="checkbox" id='Próximo' name='Próximo' class='inputSwitch'>
                    <span class="slider round nAvaliado"></span>
                    <p id='switch' class='Encodes Encode1'>Próximo item da lista</p>
                </label>
                <i class='ion-ios-compose '></i>
                <div class='itemOrcamento-box'>
                    <span>
                        <h4 class='Encodes Encode1'>Adicionar item no orçamento</h4>
                        <div class='divDentroDoSpan'>
                            <label for='descricao' class='labelDescricaoDentro'>Descrição</label>
                            <label for='quantidade'>Quantidade</label>
                            <input type="text" name="descricao" id='descricao' placeholder='Nome do serviço' class='inputDescricaoDentro'>
                            <select name='quantidade' class='selectQuantidadeDentro'>
                                <option valuue='1'>1</option>
                            </select>
                            <a href="javascript:void(0)" class='btn-secondary btnADD'>ADD</a>

                        </div>
                    </span>
                    <span>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                        <div class='descricaoDoServicoDentro'>
                            <label>Nome do serviço</label>
                            <label>1</label>
                        </div>
                    </span>

                    <button class='btn-secondary btnPedidosServico'>SALVAR</button>
                </div>
            </span>
        </div>
    </div>

    <div class='modal-content pedidos-orcamento-content'>

        <div class='modalOrcamentoContainer'>
            <h4 class='Encodes Encode1'>Produtos</h4>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <h4 class='Encodes Encode1'>Serviços</h4>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>

            <div class='orcamentoModal-box'>
                <span>
                    <p class='Sources Source2'>Código</p>
                    <p class='Encodes Encode1'>000000</p>
                </span>

                <span class='orcamentoSpanDescricao'>
                    <p class='Sources Source2'>Descrição</p>
                    <p class='Encodes Encode1' title='Descrição completa aqui'><?php echo substr('Descrição completa', 0, 20); ?>…</p>
                </span>

                <span>
                    <p class='Sources Source2'>Garantia</p>
                    <p class='Encodes Encode1'>00/00/00</p>
                </span>

                <span>
                    <p class='Sources Source2'>Qntd.</p>
                    <p class='Encodes Encode1'>5</p>
                </span>

                <span>
                    <p class='Sources Source2'>Vl. Un. (R$)</p>
                    <p class='Encodes Encode1'>60,00 R$</p>
                </span>

                <span class='ultimoSpanOrcamento'>
                    <p class='Sources Source2'>Total(R$)</p>
                    <p class='Encodes Encode1'>300,00 R$</p>
                </span>

            </div>    
        </div>
        <h2 class='Encodes Encode3'>Total geral</h2>
        <h3 class='Encodes Encode3'>1800,00</h3>
    </div>

</div>