<ul class="links-language">
    <?php 
    $translations = pll_the_languages(array('raw'=>1));
    foreach ($translations as $key => $language) :
        $lang_url = $language["url"];
        $lang_slug = $language["slug"];
        ?>
        <li class="menu-nav__item">
            <a href="<?php echo $lang_url ?>">
                <?php echo $lang_slug == "zh" ? "中文" : $lang_slug;?>
            </a>
        </li>
        <?php
    endforeach; ?>
</ul>