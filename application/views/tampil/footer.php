<script type="text/javascript" src="<?=base_url()?>assets/new/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/new/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/new/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/new/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?=base_url()?>assets/new/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?=base_url()?>assets/new/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?=base_url()?>assets/new/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?=base_url()?>assets/new/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?=base_url()?>assets/new/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="<?=base_url()?>assets/new/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/new/js/script.js"></script>
<script type="text/javascript " src="<?=base_url()?>assets/new/js/SmoothScroll.js"></script>
<script src="<?=base_url()?>assets/new/js/pcoded.min.js"></script>
<script src="<?=base_url()?>assets/new/js/demo-12.js"></script>
<script src="<?=base_url()?>assets/new/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- select2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
</body>

</html>