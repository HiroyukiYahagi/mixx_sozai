  <div class="uk-section">
    <div class="uk-container uk-container-small">
    <?= get_page_list([]) ?>
    </div>
  </div>
  <div class="uk-position-relative uk-height-small uk-background-cover uk-flex" style="background-image:url('<?= get_template_url(null) ?>/images/bg.jpg');">
  </div>
    
  <footer class="uk-section uk-section-small">
    <div class="uk-container uk-text-center">
      <div class="uk-margin-small">
        <a class="uk-link-reset" href="https://mixx.jp">
          <img class="uk-width-small" src="<?= get_template_directory_uri() ?>/images/logo.svg" />
        </a>
      </div>
      <div class="uk-margin-small">
        <a href="<?= home_url() ?>" target="_blank" class="uk-button uk-button-text uk-margin-small-right uk-margin-small-left">
          アフィリアイター様向けサイト
        </a>
        <a href="https://mixx.jp" target="_blank" class="uk-button uk-button-text uk-margin-small-right uk-margin-small-left">
          mixx.jp
        </a>
        <a href="https://favo.tokyo/" target="_blank" class="uk-button uk-button-text uk-margin-small-right uk-margin-small-left">
          運営会社
        </a>
      </div>
      <div class="uk-margin-small">
        <small>© 2018 mixx ALL RIGHTS RESERVED.</small>
      </div>
    </div>
  </footer>  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js"></script>

  <?php wp_footer(); ?>

  <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      window.$('#download_button').on('click', function(e){

          // 初期化処理
          var file_count = $(".download_file").length;  // ダウンロード数
          var try_count = 0;
          var err_file = [];

          $('.download_file').each(function() {

              var href = $(this).attr('href');
              var filename = $(this).data('download-file');

              loadFile(href, function (responce) {
  　　　　　　　　　// 経過処理
                  try_count++;
                  if (responce!=null){
                      downloadAsFile(filename,responce);
                  }else{
                      err_file.push(filename);
                  }
                  if (file_count==try_count){
                      // 終了処理
                      if (err_file.length!=0){
                          // エラー処理
                      }
                  }
              });
          });
      });
    });

    // サーバーからブラウザにロード
    var loadFile = function(href, cb) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 ){
                if ( this.status == 200) {
                    cb(this.response);
                }else{
                    cb(null);
                }
            }
        }
        xhr.open('GET', href, true);
        xhr.responseType = 'blob';
        xhr.send(null);
    }

    // ブラウザからPCにダウンロード
    var downloadAsFile = function(filename, blob) {
        var objectURL = window.URL.createObjectURL(blob);
        var link = document.createElement("a");
        document.body.appendChild(link);
        link.href = objectURL;
        link.download = filename;
        link.click();
        document.body.removeChild(link);
    };
  </script>
</body>
</html>