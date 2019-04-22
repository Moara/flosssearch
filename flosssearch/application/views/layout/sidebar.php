<link rel="stylesheet" href="<?php echo base_url('assets/css/ion.rangeSlider.min.css'); ?>"/>
<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.tagsinput-revisited.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.tagsinput-revisited.min.css'); ?>">


<aside class="ls-sidebar">

    <div class="ls-txt-center ls-lg-margin-top">
        <img src="<?php echo base_url('assets/images/detective.svg'); ?>" class=" img-fluid" width="100">
    </div>
    <h1 class="ls-brand-name bg-white">
        <a href="<?php echo base_url(''); ?>" class="text-blue"><strong>f</strong>loss <strong>s</strong>earch</a>
    </h1>

    <div class="col-lg-12 ls-txt-center">
        <p class="ls-label-text filtro">NÍVEL DE CONTROLE</p>
    </div>

    <div class="ls-box col-lg-12 ls-txt-center" style="border-bottom: 2px solid #ccc; border-radius: 0px;">
        <div data-ls-module="switchButton" class="ls-switch-btn">
            <input type="checkbox" id="controle" value="1">
            <label class="ls-switch-label" for="controle" name="label-controle"><span></span></label>
        </div>
        <p class="ls-label-text"><small id="nivel_controle">NENHUM CONTROLE</small></p>
    </div>

    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro">LINGUAGEM</p>
        <div class="ls-custom-select">
            <?php
            echo form_dropdown(array('id'=>'linguagem', 'class'=>'ls-select', 'placeholder'=>''), $linguagens, '', '');
            ?>
        </div>
    </label>

    <!-- NUMERO DE CONTRIBUIDORES - ranger slider -->
    <label class="ls-label col-lg-12 controle">
        <p class="ls-label-text filtro">NÚMERO DE CONTRIBUIDORES</p>
        <input type="text" class="js-range-slider" id="numero_contribuidores" value="" data-type="double" data-grid="true" data-min="0" data-max="1000" data-from="0" data-to="1000" data-step="1" data-skin="round" />
    </label>

    <!-- ACEITACAO DE CONTRIBUIDOR - labels - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">ACEITA CONTRIBUIÇÃO</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="aceita_contribuicao" class="check">
            <label class="ls-switch-label" for="aceita_contribuicao" name="label-aceita_contribuicao"><span></span></label>
        </div>
    </div>
    <!-- ISSUE TRACKER - open issues - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">ISSUE TRACKER</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="issue_tracker" class="check">
            <label class="ls-switch-label" for="issue_tracker" name="label-issue_tracker"><span></span></label>
        </div>
    </div>
    <!-- COMUNIDADE ATIVA - comentarios - 30 dias - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">COMUNIDADE ATIVA</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="comunidade_ativa" class="check">
            <label class="ls-switch-label" for="comunidade_ativa" name="label-comunidade_ativa"><span></span></label>
        </div>
    </div>

    <!-- TAMANHO DO PROJETO - OPEN - ranger slider -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro">TAMANHO DO PROJETO</p>
        <input type="text" class="js-range-slider" id="tamanho_projeto" value="" data-type="double" data-grid="true" data-min="0" data-max="100000" data-from="0" data-to="100000" data-step="1" data-skin="round" data-prettify-enabled="true" data-prettify-separator="."/>
    </label>

    <!-- MATURIDADE (RELEASES) - ranger slider -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro">MATURIDADE</p>
        <input type="text" class="js-range-slider" id="maturidade" value="" data-type="double" data-grid="true" data-min="0" data-max="1000" data-from="0" data-to="1000" data-step="1" data-skin="round" />
    </label>

    <!-- PROJETO ATIVO (qtd commits) - ranger slider -->
    <label class="ls-label col-lg-12 controle">
        <p class="ls-label-text filtro">PROJETO ATIVO</p>
        <input type="text" class="js-range-slider" id="projeto_ativo" value="" data-type="double" data-grid="true" data-min="0" data-max="1000" data-from="0" data-to="1000" data-step="1" data-skin="round" />
    </label>

    <!-- DOMÍNIO - text -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro">DOMÍNIO</p>
        <p class="ls-label-info">Utilize "," para registrar as tags</p>
        <input id="dominio" name="dominio" type="text" value=""/>
    </label>

</aside>

<script type="text/javascript">
    $(".js-range-slider").ionRangeSlider({
        onChange: function (data) {
            pesquisar();
        }
    });

    $('#dominio').tagsInput({
        placeholder: 'Adicionar palavras chaves',
    });

    var control = 2;
    
    $(document).ready(function() {

        $('#controle').change(function() {
             if ($(this).is(':checked')) {
                $('.controle').fadeOut();
                $('#nivel_controle').html('CONTROLE INTERNO');
                control = 1;
            } else {
                $('.controle').fadeIn();
                $('#nivel_controle').html('NENHUM CONTROLE');
                control = 2;
          }
        });

        $('#linguagem').change(function() {
            console.log('linguagem');
            pesquisar();
        });
        

        $('.check').change(function() {
            pesquisar();
        });

    });

    $(document).on('blur', "#dominio_tag" , function () {
        pesquisar();
        // console.log($('#dominio').val());
    });

function pesquisar(){

    let dados = {};

    if (control == 1) {
        let linguagem = $('#linguagem').val();
        let tamanho_projeto = $('#tamanho_projeto').val();
        let maturidade = $('#maturidade').val();
        let dominio = $('#dominio').val();

        // console.log('linguagem: '+linguagem);
        // console.log('tamanho_projeto: '+tamanho_projeto);
        // console.log('maturidade: '+maturidade);
        // console.log('dominio: '+dominio);

        dados = { controle: control, linguagem: linguagem, tamanho_projeto: tamanho_projeto, maturidade: maturidade, dominio: dominio };        

    } else {

        let linguagem = $('#linguagem').val();
        let tamanho_projeto = $('#tamanho_projeto').val();
        let maturidade = $('#maturidade').val();
        let dominio = $('#dominio').val();

        let aceita_contribuicao = $('#aceita_contribuicao').is(':checked') ? 1 : '';
        let issue_tracker = $('#issue_tracker').is(':checked') ? 1 : '';
        let comunidade_ativa = $('#comunidade_ativa').is(':checked') ? 1 : '';
        let numero_contribuidores = $('#numero_contribuidores').val();
        let projeto_ativo = $('#projeto_ativo').val();

        dados = { controle: control, linguagem: linguagem, tamanho_projeto: tamanho_projeto, maturidade: maturidade, dominio: dominio, aceita_contribuicao: aceita_contribuicao, issue_tracker: issue_tracker, comunidade_ativa: comunidade_ativa, numero_contribuidores: numero_contribuidores, projeto_ativo: projeto_ativo };
    }

    $.ajax({
        url: '<?php echo base_url('search/pesquisar'); ?>',
        type: 'POST',
        dataType : "json",
        data: dados,
        success: function(data){
          // console.log(data);
          $('#titulo-pesquisa').css('visibility','visible');
          $('#repositorios').html('');
          $('#repositorios').html(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            // console.log(textStatus);
        } 
    });

}


</script>