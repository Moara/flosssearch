<style type="text/css">
  .pulse-icon {
    /*position: relative;*/
    width: 100px;
    height: 100px;
    border: none;
    box-shadow: 0 0 0 0 rgba(15, 108, 185, 0.7);
    border-radius: 50%;
    background-color: #0f6cb9;
    -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    -ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    margin: 0 auto;
    margin-top: 120px;
    text-align: center;
    padding-top: 25px;
    font-size: 50px;
    color: #FFFFFF;
  }

  @-webkit-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(15, 108, 185, 0);}}
  @-moz-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(15, 108, 185, 0);}}
  @-ms-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(15, 108, 185, 0);}}
  @keyframes pulse {to {box-shadow: 0 0 0 45px rgba(15, 108, 185, 0);}}
</style>

<main class="ls-main">
  <div class="container-fluid">

    <div class="row" style="text-align: center; visibility: hidden;" id="botoes">

        <div class="ls-box col-lg-12 ls-txt-center" style="margin: 10px 0px; padding: 20px;">
            <!-- <div class="col-lg-6">
              <div data-ls-module="switchButton" class="ls-switch-btn">
                <input type="checkbox" id="information" value="1" checked>
                <label class="ls-switch-label" for="information" name="label-information"><span></span></label>
            </div>
            <p class="ls-label-text filtro"><small id="text-information">COMPLETE INFORMATION</small></p>
            </div> -->
        <!-- </div> -->

        <div class="col-lg-12">
          <p class="ls-label-text filtro" style="font-size: 18px!important; margin: 10px!important; color: #CCC;">Evaluated on FlossSearch.Edu for use in the educational context</p>
        </div>

        <div class="col-lg-6">
          <div class="col-lg-12" style="padding-right: 6px;">
            <p class="ls-label-text filtro" style="display: inline;">CLASSIFIED</p>

              <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
                  <input type="checkbox" id="classified" class="check" checked>
                  <label class="ls-switch-label" for="classified" name="label-classified"><span></span></label>
              </div>
          </div>

          <div class="col-lg-12" style="padding-right: 6px;">
            <p class="ls-label-text filtro" style="display: inline;">NOT CLASSIFIED</p>

              <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
                  <input type="checkbox" id="not-classified" class="check" checked>
                  <label class="ls-switch-label" for="not-classified" name="label-not-classified"><span></span></label>
              </div>
          </div>
</div>

          <div class="col-lg-6">
            <div class="col-lg-12" style="padding-right: 6px;">
            <p class="ls-label-text filtro" style="display: inline;">COMMENTED</p>

              <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
                  <input type="checkbox" id="commented" class="check" checked>
                  <label class="ls-switch-label" for="commented" name="label-commented"><span></span></label>
              </div>
          </div>

          <div class="col-lg-12" style="padding-right: 6px;">
            <p class="ls-label-text filtro" style="display: inline;">NOT COMMENTED</p>

              <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right">
                  <input type="checkbox" id="not-commented" class="check" checked>
                  <label class="ls-switch-label" for="not-commented" name="label-not-commented"><span></span></label>
              </div>
          </div>
          </div>

        </div>

    </div>

    <h1 class="ls-title-intro ls-ico-list2 ls-no-bg" id="titulo-pesquisa" style="visibility: hidden;">Results</h1>

    <div class="row" id="repositorios">

      <!-- <div class="col-lg-12">
        <div class="ls-pagination-filter">
          <ul class="ls-pagination">
            <li><a href="#">&laquo; Anterior</a></li>
            <li class="ls-active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><span class="ls-gap">...</span></li>
            <li><a href="#">Próximo &raquo;</a></li>
          </ul>
        </div>
      </div> -->

      <div class="pulse-icon ls-ico-search"></div>

      
      

    </div>

  </div>
</main>