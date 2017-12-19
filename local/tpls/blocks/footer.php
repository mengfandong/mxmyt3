<?php
/**
 * ------------------------------------------------------------------------
 * Uber Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die;

?>

<!-- BACK TOP TOP BUTTON -->
<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
  <button class="btn btn-primary" title="Back to Top"><i class="fa fa-arrow-up"></i></button>
</div>
<!-- BACK TO TOP BUTTON -->

<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">
	<section class="t3-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-8 copyright <?php $this->_c('copyright') ?>">
					<span>© 1898-<?php echo date(Y); ?>   青岛大学附属医院 版权所有. 鲁ICP备09015660号</span> | <span><script src="http://s15.cnzz.com/stat.php?id=5209140&web_id=5209140&online=2" language="JavaScript"></script></span>
				</div>
                <div class="col-md-4 hidden-sm hidden-xs text-left">
       <ul id="footer-social" class="list-inline">
<li><a title="欢迎关注我们的微信" id="foot-social"  role="button" data-toggle="popover" data-trigger="hover"  data-placement="top"><i class="fa fa-wechat"></i></a></li>

<li><a title="欢迎关注我们的微博" href="http://weibo.com/qdumh" target="_blank"><i class="fa fa-weibo"></i></a></li>

       </ul>
                </div>
			</div>
		</div>
	</section>
</footer>
<!-- //FOOTER -->

<script type="text/javascript">
    (function($) {
        // Back to top
        $('#back-to-top').on('click', function(){
            $("html, body").animate({scrollTop: 0}, 500);
            return false;
        });

        // 弹出框
        $('#foot-social').popover({
            //placement: 'top',
            //trigger: 'click',   //鼠标以上时触发弹出提示框
            container: 'body',
            html: true,         //开启html 为true的话，data-content里就能放html代码了
            content: "<img src='/nslocal/images/headers/wx_qr_code.jpg'>",
            // delay: { "show": 500, "hide": 100 },
        });
    })(jQuery);



</script>