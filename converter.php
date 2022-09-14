<?php include('includes/header.php'); ?>

<?php include('includes/navbarheader.php'); ?>

<br>
<br>
<div class="service-charge-wrap bg-stratos ptb-100">
<div class="container">
<div class="row justify-content-center">
<form class="account-form">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<input type="number" id="amount" required placeholder="Enter Amount">
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<select id="currency-1" required>
<option>PLN</option>
<option>EUR</option>
<option>USD</option>
</select>
</div>
</div>
<div class="col-md-1">
<div class="form-group">
<p>ConvertTo:</p>
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<select id="currency-2" required>
<option>EUR</option>
<option>USD</option>
<option>PLN</option>
</select>
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<button class="btn style1 w-100 d-block calculate-btn">Show me result!</button>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <p>
        <span class="given-amount"></span> 
        <span class="base-currency"></span>
        <span class="final-result"></span> 
        <span class="second-currency"></span>
      </p>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <p><span>$5.50</span> Transition Fees</p>
<p>By clicking continue, I am agree with <a href="terms-of-service" class="link style1">Terms & Policy</a></p>
</div>
</div>

</form>
</div>
</div>



<script>
	var crrncy = {'EUR': {'PLN': 4.15, 'USD': 0.83}, 'USD': {'PLN': 3.45, 'EUR': 1.2}}
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


<?php include('includes/footer.php'); ?>