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