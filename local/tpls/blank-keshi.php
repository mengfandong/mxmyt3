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

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >

<head>
    <jdoc:include type="head" />
    <?php $this->loadBlock('head') ?>
    <?php $this->addCss('layouts/university') ?>
    <?php $this->addCss('layouts/qdfy') ?>
    <?php $this->addCss('k2') ?>
</head>

<body class="home-university t3-qdfy">

<div class="t3-wrapper">
    <?php $this->loadBlock('header') ?>
    <div class="container t3-mainbody">
        <div class="row">
    <?php $this->loadBlock('home') ?>
        </div>
    </div>

    <?php $this->loadBlock('footer') ?>

</div>

</body>

</html>