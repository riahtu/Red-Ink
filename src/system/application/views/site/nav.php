<script type="text/javascript">
$(document).ready(function() {
    $(".nav img.rollover").hover(function(){ this.src=this.src.replace("_1","_2") },function(){ this.src=this.src.replace("_2","_1") });
    $("#subnav img.rollover").hover(function(){ this.src=this.src.replace("_1","_2") },function(){ this.src=this.src.replace("_2","_1") });

});
</script>

<!-- START NAV -->
<div class="nav">
<div style="width:1000px; margin:0px auto; text-align:right;">
<img src="/system/application/img/nav/redink_logo.jpg" alt="Red Ink" style="float:left;"/>
<a href='#'><img src="/system/application/img/nav/blog_1.jpg" alt="Blog" class="rollover"/></a>
<a href='#'><img src="/system/application/img/nav/download_1.jpg" alt="Download" class="rollover"/></a>
<a href='#'><img src="/system/application/img/nav/documentation_1.jpg" alt="Documentation" class="rollover"/></a>
<a href='#'><img src="/system/application/img/nav/contact_1.jpg" alt="Contact" class="rollover"/></a>
<img src="/system/application/img/nav/divider.jpg"/>
<a href='#'><img src="/system/application/img/nav/logout_1.jpg" class="rollover"/></a>
</div>

</div>
<!-- END NAV -->

<?php if( $this->auth->access() ) { ?>
<!-- START SUB NAV -->
<div id="subnav">
<p><?=$email?></p>
<div class='rule'>&nbsp;</div>
<a href="#"><img src="/system/application/img/subnav/dashboard_1.jpg" class="rollover"/></a>
</div>
<!-- END SUB NAV -->
<?php } ?>