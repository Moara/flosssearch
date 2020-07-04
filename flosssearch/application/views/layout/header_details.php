<div class="ls-topbar">
  
    <div class="ls-notification-topbar">

    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
          <?php if(!isset($this->session->userdata['usuario'])){ ?>

          <a href="#" class="ls-ico-user login">
            <span class="ls-name">Login</span>
          </a>

          <nav class="ls-dropdown-nav ls-user-menu">
              <ul>
                <li><a href="<?php echo base_url('usuario'); ?>">Sign in</a></li>
                <li><a href="<?php echo base_url('usuario/cadastrar'); ?>">Sign up</a></li>
               </ul>
            </nav>

          <?php } else { ?>
            <a href="#" class="ls-ico-user">
              <!-- <img src="" alt="" /> -->
              <span class="ls-name"><?php echo $this->session->userdata['usuario']['nome']; ?></span>
              (<?php echo $this->session->userdata['usuario']['email']; ?>)
            </a>

            <nav class="ls-dropdown-nav ls-user-menu">
              <ul>
                <li><a href="<?php echo base_url('usuario/logout'); ?>">Exit</a></li>
               </ul>
            </nav>
          <?php } ?>
      </div>
      
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  <a href="<?php echo base_url('search'); ?>" class="ls-go-next"><span class="ls-text">Voltar para tela de pesquisa</span></a>

    <h1 class="ls-brand-name">
      <a href="<?php echo base_url(''); ?>" class="ls-ico-search">
        <strong>FlossSearch</strong>.Edu
      </a>
    </h1>

  <span class="ls-show-notifications ls-ico-question"></span>

</div>