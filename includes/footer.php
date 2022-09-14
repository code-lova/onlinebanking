<footer class="footer-wrap bg-rock">
<div class="container">
<img src="assets/img/footer-shape-1.png" alt="Image" class="footer-shape-one">
<img src="assets/img/footer-shape-2.png" alt="Image" class="footer-shape-two">
<div class="row pt-100 pb-75">
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
<div class="footer-widget">
<a href="index.html" class="footer-logo">
<img src="assets/img/logo-white.png" alt="Image" style="width: 185px; height: 57px;">
</a>
<p class="comp-desc">
We bring financial solutions to your door step.We gurantee you that all financial related issues are safe, fast and reliable.</p>
<div class="social-link">
<ul class="social-profile list-style style1">
<li>
<a target="_blank" href="https://facebook.com/">
<i class="ri-facebook-fill"></i>
</a>
</li>
<li>
 <a target="_blank" href="https://twitter.com/">
<i class="ri-twitter-fill"></i>
</a>
</li>
<li>
<a target="_blank" href="https://linkedin.com/">
<i class="ri-linkedin-fill"></i>
</a>
</li>
<li>
<a target="_blank" href="https://instagram.com/">
<i class="ri-pinterest-fill"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
<div class="footer-widget">
<h3 class="footer-widget-title">Our Banking System</h3>
<ul class="footer-menu list-style">
<li>
<a href="about">
<i class="flaticon-next"></i>
B & M National &amp; Team 
</a>
</li>
<li>
<a href="ourservices">
<i class="flaticon-next"></i>
Our Services
</a>
</li>

<li>
<a href="investment_plan">
<i class="flaticon-next"></i>
Investment Plan
</a>
</li>
<li>
<a href="contact">
<i class="flaticon-next"></i>
Contact Us
</a>
</li>
<li>
<a href="privacy-policy">
<i class="flaticon-next"></i>
Privacy Policy
</a>
</li>
<li>
<a href="contact">
<i class="flaticon-next"></i>
Help Center
</a>
</li>
</ul>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
<div class="footer-widget">
<h3 class="footer-widget-title">Help & guidance</h3>
<ul class="footer-menu list-style">
<li>
<a href="login">
<i class="flaticon-next"></i>
Access Personal Banking
</a>
</li>
<li>
<a href="offshore_banking">
<i class="flaticon-next"></i>
Deposit Skim
</a>
</li>
<li>
<a href="app-ui">
<i class="flaticon-next"></i>
Online Payment Transfer
</a>
</li>
<li>
<a href="cards">
<i class="flaticon-next"></i>
Master Card
</a>
</li>
<li>
<a href="offshore_banking">
<i class="flaticon-next"></i>
Receive Money
</a>
</li>
<li>
<a href="loan">
<i class="flaticon-next"></i>
Loan
</a>
</li>
</ul>
</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
<div class="footer-widget">
<h3 class="footer-widget-title">Subscribe</h3>
<p class="newsletter-text">Get Only New Update from this Newsletter</p>
<form action="#" class="newsletter-form">
<input type="email" placeholder="Your Email">
<button type="button">Subscribe</button>
</form>
</div>
</div>
</div>
</div>
<div class="copyright-text">
<p> <i class="ri-copyright-line"></i><script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear())</script> B & M National. All Rights Reserved </p>
</div>
</footer>

</div>


<a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/odometer.min.js"></script>
<script src="assets/js/fancybox.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/tweenmax.min.js"></script>
<script src="assets/js/main.js"></script>

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
             align: 'center',
             allow_dismiss: true, 
        });  
</script>

<?php 
        unset($_SESSION['status']);
        }

?>



<style type="text/css">
    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
        border-color: transparent !important;
        background-color: transparent !important;
    }

    .goog-te-gadget .goog-te-combo {
        width: 184px;
        padding: 1px;
        margin-bottom: 0;
        margin-top: 0;
        font-family: Raleway;
        font-weight: bold;
        color: whitesmoke !important;
        border-radius: 5px;
        font-size: 13px;
        border-color: transparent !important;
        background-color: #050A54 !important;
    }
</style>

<script>
    var crrncy = {'EUR': {'PLN': 4.15, 'USD': 0.83}, 'USD': {'PLN': 4.26, 'EUR': 0.91}}
var btn = document.querySelector('.calculate-btn');
var baseCurrencyInput = document.getElementById('currency-1');
var secondCurrencyInput = document.getElementById('currency-2');
var amountInput = document.getElementById('amount');
var toShowAmount = document.querySelector('.given-amount');
var toShowBase = document.querySelector('.base-currency');
var toShowSecond = document.querySelector('.second-currency');
var toShowResult = document.querySelector('.final-result');

function convertCurrency(event) {
  event.preventDefault();
  var amount = amountInput.value;
  var from = baseCurrencyInput.value;
  var to = secondCurrencyInput.value;
  var result = 0;
  
  try{
    if (from == to){
      result = amount;
    } else {
     result = amount * crrncy[from][to];
  }
  }
  catch(err) {
    result = amount * (1 / crrncy[to][from]);
  }
  
  toShowAmount.innerHTML = amount;
  toShowBase.textContent = from + ' = ';
  toShowSecond.textContent = to;
  toShowResult.textContent = result; 
}

btn.addEventListener('click', convertCurrency);


</script>

</body>

<!-- Mirrored from templates.hibootstrap.com/raxa/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Mar 2022 07:21:56 GMT -->
</html>