<link rel="stylesheet" href="<?php echo base_url('assets/css/ion.rangeSlider.min.css'); ?>"/>
<script src="<?php echo base_url('assets/js/ion.rangeSlider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.tagsinput-revisited.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.tagsinput-revisited.min.css'); ?>">


<aside class="ls-sidebar">

    <div class="ls-txt-center ls-lg-margin-top">
        <img src="<?php echo base_url('assets/images/detective.svg'); ?>" class=" img-fluid" width="100">
    </div>
    <h1 class="ls-brand-name bg-white">
        <a href="<?php echo base_url(''); ?>" class="text-blue"><strong>FlossSearch</strong>.Edu</a>
    </h1>

    <div class="col-lg-12 ls-txt-center" style="display: none;" id="buttons">
        <!-- <p class="ls-label-text filtro">LEVEL OF CONTROL</p> -->
        <!-- <button class="button-format download ls-ico-cloud-download"></button> -->
        <button id="download" class="ls-tag-success button-format"><span class="ls-ico-cloud-download"></span>Download Selection</button>

        <!-- <button class="button-format clean ls-ico-remove"></button> -->
        <button id="clear" class="ls-tag-danger button-format"><span class="ls-ico-remove"></span>Clear Selection</button>
    <hr>
    </div>


    <div class="col-lg-12 ls-txt-center">
        <p class="ls-label-text filtro">LEVEL OF CONTROL</p>
    </div>

    <div class="ls-box col-lg-12 ls-txt-center" style="border-bottom: 2px solid #ccc; border-radius: 0px;">
        <div data-ls-module="switchButton" class="ls-switch-btn">
            <input type="checkbox" id="controle" value="1">
            <label class="ls-switch-label" for="controle" name="label-controle"><span></span></label>
        </div>
        <p class="ls-label-text"><small id="nivel_controle">NO CONTROL</small></p>
    </div>

    <label class="ls-label col-lg-12" style="display: inline-block!important; width: 100%;">
        <p class="ls-label-text filtro"> <span title="Programming language predominant in that project.">PROGRAMMING LANGUAGE</span></p>
        <div class="ls-custom-select">
            <?php
            echo form_dropdown(array('id'=>'linguagem', 'class'=>'ls-select', 'placeholder'=>''), $linguagens, '', '');
            ?>
        </div>
    </label>

    <!-- NUMERO DE CONTRIBUIDORES - ranger slider -->
    <label class="ls-label col-lg-12 controle">
        <p class="ls-label-text filtro"><span title="Criterion is used to quantify the users who have already contributed to the project.">NUMBER OF CONTRIBUTORS</span></p>
        
        <div class="col-lg-6 ls-no-padding-right ls-no-padding-left">
            <input type="number" id="numero_contribuidores_min" value="" placeholder="MIN" />
        </div>
        <div class="col-lg-6 ls-no-padding-left ls-no-padding-right">
            <input type="number" id="numero_contribuidores_max" value="" placeholder="MAX" />
        </div>

        <!-- <fieldset>
        <label class="ls-label col-md-4 col-xs-12">
            <b class="ls-label-text">MIN.:</b>
            <input type="text" name="nome" placeholder="Primeiro nome" class="ls-field" required>
        </label>
        <label class="ls-label col-md-4 col-xs-12">
            <b class="ls-label-text">MAX.:</b>
            <input type="text" name="nome" placeholder="Sobrenome" class="ls-field" required>
        </label>
    </fieldset> -->

    </label>

    <!-- ACEITACAO DE CONTRIBUIDOR - labels - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">CONTRIBUTOR'S ACCEPTANCE</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="aceita_contribuicao" class="check" title="It returns the FLOSS projects that potentially accept contributions from an external member of the project.">
            <label class="ls-switch-label" for="aceita_contribuicao" name="label-aceita_contribuicao"><span></span></label>
        </div>
    </div>
    <!-- ISSUE TRACKER - open issues - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">ISSUE TRACKER</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="issue_tracker" class="check" title="It returns the FLOSS projects that have Issue Tracker available and displays the location of the Open Issues.">
            <label class="ls-switch-label" for="issue_tracker" name="label-issue_tracker"><span></span></label>
        </div>
    </div>
    <!-- COMUNIDADE ATIVA - comentarios - 30 dias - switch -->
    <div class="ls-box col-lg-12 controle" style="padding-right: 6px;">
      <p class="ls-label-text filtro" style="display: inline;">ACTIVE COMMUNITY</p>

        <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
            <input type="checkbox" id="comunidade_ativa" class="check" title="It returns the available FLOSS projects that have clues of being an active community.">
            <label class="ls-switch-label" for="comunidade_ativa" name="label-comunidade_ativa"><span></span></label>
        </div>
    </div>

    <!-- TAMANHO DO PROJETO - OPEN - ranger slider -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro"><span title="It returns the available FLOSS projects that are within a specified range of numbers of lines of code.">PROJECT SIZE</span></p>
        <!-- <input type="text" class="js-range-slider" id="tamanho_projeto" value="" data-type="double" data-grid="true" data-min="0" data-max="500000" data-from="0" data-to="500000" data-step="1" data-skin="round" data-prettify-enabled="true" data-prettify-separator="."/> -->
        <div class="col-lg-6 ls-no-padding-right ls-no-padding-left">
            <input type="number" id="tamanho_projeto_min" value="" placeholder="MIN" />
        </div>
        <div class="col-lg-6 ls-no-padding-left ls-no-padding-right">
            <input type="number" id="tamanho_projeto_max" value="" placeholder="MAX" />
        </div>    
    </label>

    <!-- MATURIDADE (RELEASES) - ranger slider -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro"><span title="It checks the number of releases of a project.">MATURITY</span></p>
        <input type="text" class="js-range-slider" id="maturidade" value="" data-type="double" data-grid="true" data-min="0" data-max="100" data-from="0" data-to="1000" data-step="1" data-skin="round" />
    </label>

    <div class="ls-box" style="text-align: center;">
      <h2 class="ls-title-5 ls-display-inline-block">MATURITY - OVER 100</h2>
      <br>
      <div data-ls-module="switchButton" class="ls-switch-btn">
        <input type="checkbox" id="switch_maturidade" class="check">
        <label class="ls-switch-label" for="switch_maturidade" name="label-teste" ls-switch-off="Disabled" ls-switch-on="Activated"><span></span></label>
      </div>
    </div>

    <!-- PROJETO ATIVO (qtd commits) - ranger slider -->
    <label class="ls-label col-lg-12 controle">
        <p class="ls-label-text filtro"><span title="It returns the available FLOSS projects that have recent contributions.">ACTIVE PROJECT</span></p>
        <input type="text" class="js-range-slider" id="projeto_ativo" value="" data-type="double" data-grid="true" data-min="0" data-max="100" data-from="0" data-to="1000" data-step="1" data-skin="round" />
    </label>

    <div class="ls-box controle" style="text-align: center;">
      <h2 class="ls-title-5 ls-display-inline-block">ACTIVE PROJECT - OVER 100</h2>
      <br>
      <div data-ls-module="switchButton" class="ls-switch-btn">
        <input type="checkbox" id="switch_projeto_ativo" class="check">
        <label class="ls-switch-label" for="switch_projeto_ativo" name="label-teste" ls-switch-off="Disabled" ls-switch-on="Activated"><span></span></label>
      </div>
    </div>


    <!-- DOMÍNIO - text -->
    <label class="ls-label col-lg-12">
        <p class="ls-label-text filtro"><span title="It returns the FLOSS projects related to specific domains based on to the description of the projects.">DOMAIN</span></p>
        <p class="ls-label-info">Use "," to register the tags</p>
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
        placeholder: 'Add key words',
    });

    var control = 2;
    
    $(document).ready(function() {

        $('#controle').change(function() {
             if ($(this).is(':checked')) {
                $('.controle').fadeOut();
                $('#nivel_controle').html('INSIDE CONTROL');
                control = 1;
            } else {
                $('.controle').fadeIn();
                $('#nivel_controle').html('NO CONTROL');
                control = 2;
          }
        });

        $('#linguagem').change(function() {
            // console.log('linguagem');
            pesquisar();
        });
        

        $('.check').change(function() {
            pesquisar();
        });


        var typingTimer;
        var doneTypingInterval = 1000;

        $('#numero_contribuidores_min').keyup(function() {
          clearTimeout(typingTimer);
            typingTimer = setTimeout(pesquisar, doneTypingInterval);
        });

        $('#numero_contribuidores_max').keyup(function() {
          clearTimeout(typingTimer);
            typingTimer = setTimeout(pesquisar, doneTypingInterval);
        });

        $('#tamanho_projeto_min').keyup(function() {
            console.log('buscando...');
          clearTimeout(typingTimer);
            typingTimer = setTimeout(pesquisar, doneTypingInterval);
        });

        $('#tamanho_projeto_max').keyup(function() {
          clearTimeout(typingTimer);
            typingTimer = setTimeout(pesquisar, doneTypingInterval);
        });

    });

    $(document).on('blur', "#dominio_tag" , function () {
        pesquisar();
        // console.log($('#dominio').val());
    });

function pesquisar(){

    // console.log('pesquisando');
    // console.log($('#tamanho_projeto_min').val());

    var linguagem = '';
    var tamanho_projeto_min = '';
    var tamanho_projeto_max = '';
    var maturidade = '';
    var dominio = '';
    var switch_maturidade = '';
    var switch_maturidade = '';
    var switch_projeto_ativo = '';

    var linguagem = '';
    var tamanho_projeto_min = '';
    var tamanho_projeto_max = '';
    var maturidade = '';
    var dominio = '';

    var aceita_contribuicao = '';
    var issue_tracker = '';
    var comunidade_ativa = '';
    var numero_contribuidores_min = '';
    var numero_contribuidores_max = '';
    var projeto_ativo = '';

    dados = {};

    if (control == 1) {
        linguagem = $('#linguagem').val();
        tamanho_projeto_min = $('#tamanho_projeto_min').val();
        tamanho_projeto_max = $('#tamanho_projeto_max').val();
        maturidade = $('#maturidade').val();
        dominio = $('#dominio').val();
        switch_maturidade = $('#switch_maturidade').is(':checked') ? 1 : '';

        // console.log('linguagem: '+linguagem);
        // console.log('tamanho_projeto: '+tamanho_projeto);
        // console.log('maturidade: '+maturidade);
        // console.log('dominio: '+dominio);

        dados = { controle: control, linguagem: linguagem, tamanho_projeto_min: tamanho_projeto_min, tamanho_projeto_max: tamanho_projeto_max, maturidade: maturidade, dominio: dominio, switch_maturidade: switch_maturidade };        

    } else {

         
        switch_maturidade = $('#switch_maturidade').is(':checked') ? 1 : '';
        switch_projeto_ativo = $('#switch_projeto_ativo').is(':checked') ? 1 : '';

        linguagem = $('#linguagem').val();
        tamanho_projeto_min = $('#tamanho_projeto_min').val();
        tamanho_projeto_max = $('#tamanho_projeto_max').val();
        maturidade = $('#maturidade').val();
        dominio = $('#dominio').val();

        aceita_contribuicao = $('#aceita_contribuicao').is(':checked') ? 1 : '';
        issue_tracker = $('#issue_tracker').is(':checked') ? 1 : '';
        comunidade_ativa = $('#comunidade_ativa').is(':checked') ? 1 : '';
        numero_contribuidores_min = $('#numero_contribuidores_min').val();
        numero_contribuidores_max = $('#numero_contribuidores_max').val();
        projeto_ativo = $('#projeto_ativo').val();

        dados = { controle: control, linguagem: linguagem, tamanho_projeto_min: tamanho_projeto_min, tamanho_projeto_max: tamanho_projeto_max, maturidade: maturidade, dominio: dominio, aceita_contribuicao: aceita_contribuicao, issue_tracker: issue_tracker, comunidade_ativa: comunidade_ativa, numero_contribuidores_min: numero_contribuidores_min, numero_contribuidores_max: numero_contribuidores_max, projeto_ativo: projeto_ativo, switch_maturidade: switch_maturidade, switch_projeto_ativo: switch_projeto_ativo };
    }
    
    // console.log('...');
    // console.log(numero_contribuidores_min);

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

let projetos = [];

$(document).on('click', ".add" , function () {
    console.log($(this).attr("id"));

    if($(this).attr('click') == 0){
        $(this).html('<span class="ls-ico-radio-checked">Selected Project</span>');
        $(this).attr("click", 1);

        projetos.push($(this).attr("id"));
        console.table(projetos);

        if(projetos.length == 1){
            $('#buttons').css('display', 'inline');
        }

    } else {
        $(this).html('<span class="ls-ico-radio-unchecked">Select Project</span>');
        $(this).attr("click", 0);

        projetos.splice($.inArray($(this).attr("id"), projetos), 1);
        console.table(projetos);

        if(projetos.length == 0){
            $('#buttons').css('display', 'none');
        }
    }
});

function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}

$(document).on('click', "#download" , function () {
    // console.log(projetos);
    $.ajax({
        url: '<?php echo base_url('search/projetos_selecionados'); ?>',
        type: 'POST',
        dataType : "json",
        data: { projetos: projetos },
        success: function(data){
            // console.table(data);
            download('project.txt', 'PARÂMETROS: '+JSON.stringify(dados)+'\n\n\nPROJETOS: '+JSON.stringify(data));
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            // console.log(textStatus);
        } 
    });

});

$(document).on('click', "#clear" , function () {

    $('.add').html('<span class="ls-ico-radio-unchecked">Select Project</span>');
    $('.add').attr("click", 0);

    console.table(projetos);

    console.table('limpando...');
    $('#buttons').css('display', 'none');
    projetos = [];
});

</script>