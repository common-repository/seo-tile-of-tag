<style type="text/css">

.container-unit .subcategories .navi span {
    cursor: pointer;
    color: <?= $unit_rel_active_color ?>;
    text-decoration: dotted underline;
    font-size: 14px;
}
.container-unit .subcategories .navi span:hover {
    color: <?= $unit_rel_hover_color ?>;
}

.container-unit .sub-links-2 a {
    color: <?= $unit_rel_active_color ?>;
    border: <?= $unit_border_active_color ?> solid 1px;
    padding: 2px 9px;
    border-radius: 5px;
    display: inline-block;
}
.container-unit .sub-links-2 a:hover {
    color: <?= $unit_rel_hover_color ?>;
    border: <?= $unit_border_hover_color ?> solid 1px;
}

</style>

<div class="container-unit">
    <div class="subcategories">
        <ul class="tag-slider sub-links-2 row1">
            <?php foreach($links as $link){ 
            ?>
                <li>
                <a href="<?= $link->link ?>"><?= $link->anchor ?></a>
                </li>
            <?php } ?>
        </ul>
        <div class="navi">
            <span id="show-nav-element" class="open"><?= $show_all?></span>
            <span hidden="" id="toogle-nav-element" class="close"><?= $close_all?></span>
        </div>
    </div>
</div>
<br>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var shownav = document.getElementById('show-nav-element');
  var tooglenav = document.getElementById('toogle-nav-element');
  var tagslider = document.getElementsByClassName('tag-slider')[0];

  shownav.addEventListener('click', function(e) {
    e.preventDefault();
    tagslider.classList.add('open');
    shownav.hidden =true;
    tooglenav.hidden =false;
  });  

  tooglenav.addEventListener('click', function(e) {
    e.preventDefault();
    tagslider.classList.remove('open');
    shownav.hidden =false;
    tooglenav.hidden =true;
  });

});

</script>



