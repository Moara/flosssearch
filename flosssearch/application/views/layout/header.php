<div class="ls-topbar ls-topbar-gray">

    <!-- Barra de Notificações -->
    <div class="ls-notification-topbar">

      <!-- Links de apoio -->
        <div class="ls-alerts-list">
          <a href="<?php echo base_url('welcome/about'); ?>" target="_blank" class="ls-btn" style="margin-top: 13px; margin-right: 20px;"><span>About</span></a>
        </div>

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

<!-- Nome do produto/marca com sidebar -->
<!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>