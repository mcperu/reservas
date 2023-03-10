<?php
require_once("Config/Config.php");

if (isset($_GET['lang'])){
    $languague = $_GET['lang'];
  $languague_ = trim($languague);

  $_SESSION['languague_'] = $languague_;
}else{
    $lang = "es";
}
if(isset($_SESSION['languague_'])){
    $lang = $_SESSION['languague_'];
    //session_destroy();
}

?>
<?php require_once(__DIR__.'./templates/first_header.php'); ?>

    <!-- ************************************************************** -->
    <!-- *************************  portada  ************************* -->
    <!-- ************************************************************** -->

    <div class="portada">
        <div id="layerUp">
          <div class="layerUp">
            <h1>"<?= $lang == 'es' ? PORT_TIT_ES : PORT_TIT_EN ?>"</h1>
          </div>
          <div class="layerDown">
            <div class="month">
              <div class="mup">
                <span><?= $lang == 'es' ? BTN_MONTH_ES : BTN_MONTH_EN ?></span>
              </div>
              <div class="mdown">
                <select class="optMonth" name="optMonth" id="optMonth">
                  <?= $lang == 'es' ? MONTHS_OF_THE_YEAR_SELECTION_ES : MONTHS_OF_THE_YEAR_SELECTION_EN ?>
                </select>
              </div>
            </div>
            <div class="year">
              <div class="yup">
                <span><?= $lang == 'es' ? BTN_YEAR_ES : BTN_YEAR_EN ?></span>
              </div>
              <div class="ydown">
                <select class="optYear" name="optYear" id="optYear">
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                </select>
              </div>

            </div>
            <div class="search">
              <input id="btnSearch" type="button" value="<?= $lang == 'es' ? BTN_SEAR_ES : BTN_SEAR_EN ?>">
            </div>
          </div>
        </div>
        <video id="video" width="100%"  autoplay muted>
          <source src="img/Video2.mp4" type="video/mp4">
          <source src="img/video2.wmv" type="video/wmv">
        Your browser does not support the video tag.
        </video>
      </div>

    <!-- ************************************************************** -->
    <!-- *************************  /portada  ************************* -->
    <!-- ************************************************************** -->
    <script src="js/inicio.js"></script>   
<?php require_once(__DIR__.'./templates/first_static_information.php'); ?>
<?php require_once(__DIR__.'./templates/first_footer.php'); ?>
