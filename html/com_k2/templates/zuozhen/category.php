<?php
/**
 * @package   uneedo_j3
 * @author    arrowthemes http://www.arrowthemes.com
 * @copyright Copyright (C) arrowthemes
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

/**
 * @package        K2
 * @author        GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div id="k2Container">
    <div id="zuozhenbiao">
        <?php
        $keshis = $this->leading;
        ?>
        <h4 style="margin-top: 0;"><em class="fa fa fa-hospital-o"></em>市南院区</h4>
        <dl class="dl-horizontal">
            <dt>内科</dt>
            <dd>
                <ul class="list-inline">
                    <?php for ($k = 0; $k <= 10; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>外科</dt>
            <dd>
                <ul class="list-inline">
                    <?php for ($k = 11; $k <= 26; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>妇产儿科</dt>
            <dd>
                <ul class="list-inline">
                    <?php for ($k = 27; $k <= 32; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>


        <dl class="dl-horizontal">
            <dt>五官</dt>
            <dd>
                <ul class="list-inline">
                    <li><a href="<?php echo $keshis[43]->link; ?>"
                           target="_blank"><?php echo $keshis[43]->title; ?></a></li>
                    <li><a href="<?php echo $keshis[44]->link; ?>"
                           target="_blank"><?php echo $keshis[44]->title; ?></a></li>
                    <?php for ($k = 33; $k <= 37; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>神经系统</dt>
            <dd>
                <ul class="list-inline">
                    <?php for ($k = 38; $k <= 42; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>其他</dt>
            <dd>
                <ul class="list-inline">
                    <?php for ($k = 45; $k <= 55; $k++): ?>
                        <li><a href="<?php echo $keshis[$k]->link; ?>"
                               target="_blank"><?php echo $keshis[$k]->title; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </dd>
        </dl>

        <h4><em class="fa fa fa-hospital-o"></em>崂山院区</h4>
        <dl class="dl-horizontal">
            <dt></dt>
            <dd>
                <ul class="list-inline">
                    <li><a href="<?php echo $keshis[56]->link; ?>"
                          target="_blank"><?php echo $keshis[56]->title; ?></a></li>
                </ul>
            </dd>
        </dl>


        <h4><em class="fa fa fa-hospital-o"></em>西海岸院区</h4>
        <dl class="dl-horizontal">
            <dt></dt>
            <dd>
                <ul class="list-inline">
                    <li><a href="<?php echo $keshis[57]->link; ?>"
                           target="_blank"><?php echo $keshis[57]->title; ?></a></li>
                </ul>
            </dd>
        </dl>

        <h4><em class="fa fa fa-hospital-o"></em>市北院区</h4>
        <dl class="dl-horizontal">
            <dt></dt>
            <dd>
                <ul class="list-inline">
                    <li><a href="<?php echo $keshis[58]->link; ?>"
                           target="_blank"><?php echo $keshis[58]->title; ?></a></li>
                </ul>
            </dd>
        </dl>
        <script type="text/javascript">
            var $K2hit = jQuery.noConflict();
            $K2hit(document).ready(function () {
                $K2hit.ajax({
                    url: "/nslocal/index.php?option=com_k2&view=item&task=hit&format=raw&itemID=3248",
                    type: 'get',
                    success: function (response) {
                        $K2hit('#totalcount').html(response);
                    }
                });
            });
        </script>
        <div style="text-align: right;margin-top: 20px;"><a class="btn btn-primary" style="border-radius: 4px;" href="#">访问 <span id="totalcount" class="badge">42</span>次</a></div>
    </div> <!--// itemlistLeading-->
</div><!--// container-->
