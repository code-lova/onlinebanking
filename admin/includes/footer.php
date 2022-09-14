


<!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto">
            <div class="row justify-content-between">
                <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                    <ul class="list-dot list-inline mb-0">
                        <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                        <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                        <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-lg text-center mb-3 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-twitter-alt"></i></a></li>
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-facebook"></i></a></li>
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-github"></i></a></li>
                    </ul>
                </div>

                <div class="col-lg text-center text-lg-right">
                    &copy; 2019 Dash UI. All Rights Reserved.
                </div>
            </div>
        </footer>









<!-- Scripts -->
    <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/feather-icons/dist/feather.min.js"></script>
<script src="assets/libs/prismjs/components/prism-core.min.js"></script>
<script src="assets/libs/prismjs/components/prism-markup.min.js"></script>
<script src="assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<!-- clipboard -->
<script src="../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

<!-- Bootstrap Growl-->
<script src="assets/js/jquery.bootstrap-growl.min.js"></script>

<?php
    if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
        {
?>    

<script>
    $.bootstrapGrowl('<?php echo $_SESSION['status']; ?>',{  
            type: '<?php echo $_SESSION['status_code']; ?>',  
            delay: 4000, 
            width: 330,
             offset: {from: 'top', amount: 20},
             align: 'right',
             allow_dismiss: true, 
        });  
</script>

<?php 
        unset($_SESSION['status']);
        }

?>



  </body>

<!-- Mirrored from codescandy.com/dashui/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 21:21:39 GMT -->
</html>