<main style="padding-top: 100px;">
  <div class="container">

    <div class="row" style="padding: 0px; padding-top: 20px;">

    	<div class="col-md-12 row" style="background-color: #ffffff; padding: 20px;">
    			<h1 class="ls-title-4" style="text-align: center; font-size: 2.5rem; color: #0F6CB9;"><?php echo $projeto->name; ?></h1>
			  <div class="row">
			    <div class="col-md-12 col-sm-12" style="text-align: right;">
			    	<p class="ls-float-none-xs">Created at: <strong><?php echo date('d/m/Y H:i:s', strtotime($projeto->created_at)); ?></strong></p>
			    	<p class="ls-float-none-xs">Updated at: <strong><?php echo date('d/m/Y H:i:s', strtotime($projeto->updated_at)); ?></strong></p>
			    </div>

			    <!-- <?php //if(isset($this->session->userdata['usuario'])){ ?> -->

				    <!-- <?php //if($classificacao){ ?> -->

				    <!-- <?php //} else { ?> -->

				    	<p style="font-size: 1rem; text-align: center;">
			        		Classification
			      		</p>

				    	<div class="col-lg-12" style="text-align: center; font-size: 30px; color: #ccc;">
					    	<span class="ls-ico-star estrela" id="1" style="cursor: pointer;"></span>
					    	<span class="ls-ico-star estrela" id="2" style="cursor: pointer;"></span>
					    	<span class="ls-ico-star estrela" id="3" style="cursor: pointer;"></span>
					    	<span class="ls-ico-star estrela" id="4" style="cursor: pointer;"></span>
					    	<span class="ls-ico-star estrela" id="5" style="cursor: pointer;"></span>
					    </div>
					    <p style="font-size: 1rem; text-align: center;" id="votos">
			        		0 votes
			      		</p>

				    <!-- <?php //} ?> -->

			    <!-- <?php //} ?> -->


			    <div class="col-md-12 col-sm-12" style="text-align: center; padding: 10px;">
			      <p style="font-size: 1.3rem;">
			        <?php echo $projeto->description; ?>
			      </p>
			    </div>
			  </div>

				<?php if($labels){ ?>
			        <div class="col-lg-12 ls-no-padding" style="text-align: center;">
			          <h6 class="card-title text-uppercase text-muted mb-2">Labels</h6>
			          <?php 
			          foreach ($labels as $l) {
			          	$url = "https://github.com/$projeto->full_name/labels/$l->nome";
			          ?>
			          	<a href="<?php echo $url; ?>" target="_blank" class="badge badge-soft-success" style="margin-left: 5px;"><?php echo $l->nome; ?></a>
			          <?php } ?>
			        </div>
			   	<?php } ?>

			<div class="ls-board-box col-lg-12">

			  <div id="sending-stats" class="row ls-box-group">
			    
			    <div class="col-sm-12 col-lg-3">
			      <div class="ls-box">
			        <div class="ls-box-head">
			          <h6 class="ls-title-4">Star</h6>
			        </div>
			        <div class="ls-box-body">
			          <strong class="ls-color-info" style="color: #0F6CB9!important;"><?php echo $projeto->stargazers_count; ?></strong>
			       
			        </div>
			      </div>
			    </div>

			    <div class="col-sm-12 col-lg-3">
			      <div class="ls-box">
			        <div class="ls-box-head">
			          <h6 class="ls-title-4">Watch</h6>
			        </div>
			        <div class="ls-box-body">
			          <strong class="ls-color-info" style="color: #0F6CB9!important;"><?php echo $projeto->watchers_count; ?></strong>
			          
			        </div>
			      </div>
			    </div>

			    <div class="col-sm-12 col-lg-3">
			      <div class="ls-box">
			        <div class="ls-box-head">
			          <h6 class="ls-title-4">Fork</h6>
			        </div>
			        <div class="ls-box-body">
			          <strong class="ls-color-info" style="color: #0F6CB9!important;"><?php echo $projeto->forks_count; ?></strong>
			          
			        </div>
			      </div>
			    </div>

			    <div class="col-sm-12 col-lg-3">
			      <div class="ls-box">
			        <div class="ls-box-head">
			          <h6 class="ls-title-4">Open Issues</h6>
			        </div>
			        <div class="ls-box-body">
			          <strong class="ls-color-info" style="color: #0F6CB9!important;"><?php echo $projeto->open_issues_count; ?></strong>
			          
			        </div>
			      </div>
			    </div>			    

			</div>
			</div>

			<h3 style="font-weight: bold; letter-spacing: .02em; text-transform: uppercase; font-size: 18px!important; border-bottom: 3px solid #0F6CB9;">Details</h3>

		    <table class="ls-table">
			  <tbody>

			    <tr>
			      <td><a href="" title="">Full Name</a></td>
			      <td class=""><?php echo $projeto->full_name; ?></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Homepage</a></td>
			      <td class=""><?php echo $projeto->homepage; ?></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Language</a></td>
			      <td class=""><?php echo $projeto->linguagem; ?></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">License Name</a></td>
			      <td class=""><?php echo $projeto->license_name; ?></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Total Contributors</a></td>
			      <td class=""><?php echo $projeto->total_contribuidores; ?><br><small><?php if($projeto->analise_numero_contribuidores){echo date('d/m/Y H:i:s', strtotime($projeto->analise_numero_contribuidores));} ?></small></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Code Lines</a></td>
			      <td class=""><?php echo $projeto->code_lines; ?><br><small><?php if($projeto->analise_code_lines){echo date('d/m/Y H:i:s', strtotime($projeto->analise_code_lines));} ?></small></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Releases</a></td>
			      <td class=""><?php echo $projeto->releases; ?><br><small><?php if($projeto->analise_maturidade){echo date('d/m/Y H:i:s', strtotime($projeto->analise_maturidade));} ?></small></td>
			    </tr>

			    <tr>
			      <td><a href="" title="">Has Wiki</a></td>
			      <td class=""><?php if($projeto->has_wiki){ echo 'Yes'; } else { echo 'No'; } ?></td>
			    </tr>
				
				<tr>
			      <td><a href="" title="">Base Insertion</a></td>
			      <td class=""><?php echo $projeto->insercao_base; ?></td>
			    </tr>

			  </tbody>
			</table>
			
			<?php if ($projeto->comentario) { ?>
			<h3 style="font-weight: bold; letter-spacing: .02em; text-transform: uppercase; font-size: 18px!important; border-bottom: 3px solid #0F6CB9;">Comment</h3>
			<div class="col-md-12 col-sm-12" style="text-align: justify; padding: 10px;">
			  <p style="font-size: 0.9rem;">
				<?php echo $projeto->comentario; ?>
				</p>
			</div>
			<?php } ?>

			<?php if ($contribuidores) { ?>
			<h3 style="font-weight: bold; letter-spacing: .02em; text-transform: uppercase; font-size: 18px!important; border-bottom: 3px solid #0F6CB9;">Main Contributors</h3>


			<table class="ls-table">
				<thead>
			    <tr style="text-transform: uppercase;">
			    	<th width="5%" style="text-align: center;">#</th>
			    	<th style="text-align: center;">Avatar</th>
			      	<th width="50%" style="text-align: center;">Contributors</th>
			      	<th width="20%" style="text-align: center;">Contributions</th>
			    </tr>
			  </thead>
			  <tbody>

			    <?php $cont = 1; foreach ($contribuidores as $value) { ?>	    	
			    	<tr>
			    		<td style="text-align: center;">#<?php echo $cont; ?></td>
			    		<td style="text-align: center;"><img src="<?php echo $value->avatar_url; ?>" width="50" style="border-radius: 50%;"></td>
			    		<td style="text-align: center;"><a href="<?php echo $value->html_url; ?>" ><?php echo $value->login; ?></a></td>
			    		<td style="text-align: center;"><?php echo $value->contributions; ?></td>
				    </tr>
				<?php $cont++; } ?>

			  </tbody>
			</table>
			<?php } ?>

  		</div>



  	<!-- </div> -->






<!-- <div class="container"> -->
	<div class="row" style="width: 100%;">
		<div class="col-lg-12 ls-box ls-board-box">
			<header class="ls-info-header">
				<h2 class="ls-title-3">Posts</h2>
			</header>

<?php if(isset($this->session->userdata['usuario'])){ ?>

			<div class="row">
				<label class="ls-label" style="width: 100%; padding: 20px; ">
					<span class="ls-label-text" style="margin-bottom: 10px;">Leave a message here for the community: </span>
			   		<textarea rows="4" id="comentario"></textarea>
				</label>
			</div>

	  		<button type="button" id="save" class="ls-btn-primary ls-float-right">Save</button>
		<br>
		<hr>

<?php } ?>



		<div class="col-lg-12" id="mensagens">

			<?php foreach ($comentarios as $b) { ?>

			      <div class="row">
			      	<div class="col-lg-10"><p><strong><?php echo date('d/m/Y H:i:s', strtotime($b->data_cadastro)) .' - '.$b->nome; ?></strong></p></div>
				      
				    <?php if(isset($this->session->userdata['usuario'])){ ?>
				    <?php if($b->id_usuario == $this->session->userdata['usuario']['id']){ ?>
				    <div class="col-lg-2" style="color: red; text-align: right; padding: 0px 30px; cursor: pointer; font-size: 20px;"><span class="ls-ico-remove ls-ico-right" onclick="remover_comentario(<?php echo $b->id; ?>)"></span></div>
					<?php }} ?>

			      </div>
			      <div class="row">
			      	<div class="col-lg-12">
			      		<p class="ls-break-text" style="text-align: justify;"><?php echo $b->comentario; ?></p>
			      		<hr>
			      	</div>
			      </div>

			<?php } ?>
		</div>

	</div>
	</div>
	

</div>

</main>

<script type="text/javascript">
	var validacao = true;

	if("<?php echo $votou; ?>" == 'S'){
		validacao = false;          		
	}


	$(document).ready(function() {
		valida_classificacao();
	});
	
	$(document).on('mouseover', ".estrela" , function () {

		if(validacao){
			for (var i = 1; i <= $(this).attr('id'); i++) { 
				$('#'+i).css('color', '#f9ca24');
			}
		}

	});

	$(document).on('mouseout', ".estrela" , function () {
		if(validacao){
			$('.estrela').css('color', '#ccc');
		}
	});

	$(document).on('click', ".estrela" , function () {
		if(validacao){
			var pontuacao = $(this).attr('id');
			validacao = false;
			// console.log(pontuacao);
			
			$.ajax({
		        url: '<?php echo base_url('search/classificacao'); ?>',
		        type: 'POST',
		        dataType : "json",
		        data: { id: <?php echo $projeto->id; ?>, pontuacao : pontuacao },
		        success: function(data){
		        	// TRAZER A NOVA MÉDIA E PINTAR AS ESTRELAS
		        	if(data){
		        		var pontos = Math.round(data.pontuacao);

			        	$('.estrela').css('color', '#ccc');
		          		
		          		for (var i = 1; i <= pontos; i++) { 
							$('#'+i).css('color', '#f9ca24');
						}

			        	$('#votos').html('');
		          		$('#votos').html(data.votos);
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown) {
		            // console.log(textStatus);
		        } 
		    });
		}
	});

	
	$(document).on('click', "#save" , function () {
		
		var comentario = $('#comentario').val();

	    if(comentario){

	   	 $.ajax({
	        url: '<?php echo base_url('search/comentario'); ?>',
	        type: 'POST',
	        dataType : "json",
	        data: { id: <?php echo $projeto->id; ?>, comentario : comentario },
	        success: function(data){

	        	$('#comentario').val('');

	            $('#mensagens').html('');
          		$('#mensagens').html(data);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            // console.log(textStatus);
	        } 
	    });
	   }

	});

	function remover_comentario(id){

		if(id){

	   	 $.ajax({
	        url: '<?php echo base_url('search/remover_comentario'); ?>',
	        type: 'POST',
	        dataType : "json",
	        data: { id: id, id_projeto: <?php echo $projeto->id; ?> },
	        success: function(data){
	        	console.log(data);

	            $('#mensagens').html('');
          		$('#mensagens').html(data);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            // console.log(textStatus);
	        } 
	    });
	   }


	}

	function valida_classificacao(){
			
		// console.log(validacao);

		$.ajax({
	        url: '<?php echo base_url('search/valida_classificacao'); ?>',
	        type: 'POST',
	        dataType : "json",
	        data: { id: <?php echo $projeto->id; ?> },
	        success: function(data){

	        	// console.log(validacao);
	        	
	        	if(data){
	        		var pontos = Math.round(data.pontuacao);

		        	$('.estrela').css('color', '#ccc');
	          		
	          		for (var i = 1; i <= pontos; i++) { 
						$('#'+i).css('color', '#f9ca24');
					}

		        	$('#votos').html('');
	          		$('#votos').html(data.votos+' votes');
	        	}

          		if("<?php echo $user; ?>" == 'N'){
          			validacao = false;
          		}
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            // console.log(textStatus);
	        } 
	    });
	}

</script>