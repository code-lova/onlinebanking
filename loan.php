<?php include('includes/header.php'); ?>

<?php include('includes/navbarheader.php'); ?>




<div class="content-wrapper">

<div class="breadcrumb-wrap bg-spring">
<img src="assets/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
<img src="assets/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
<img src="assets/img/breadcrumb/br-shape-3.png" alt="Image" class="br-shape-three moveHorizontal sm-none">
<img src="assets/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-7 col-md-8 col-sm-8">
<div class="breadcrumb-title">
<h2>Apply Loan</h2>
<ul class="breadcrumb-menu list-style">
<li><a href="index">Home </a></li>
 <li>Apply Loan</li>
</ul>
</div>
</div>
<div class="col-lg-5 col-md-4 col-sm-4 xs-none">
<div class="breadcrumb-img">
<img src="assets/img/breadcrumb/br-shape-5.png" alt="Image" class="br-shape-five animationFramesTwo">
<img src="assets/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
<img src="assets/img/breadcrumb/breadcrumb-3.png" alt="Image">
</div>
</div>
</div>
</div>
</div>


<section class="personal-loan-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="personal-loan-content">
<h3>What is a personal loan?</h3>
<p>A personal loan is a form of credit that can help you make a big purchase or consolidate high-interest debts. Because personal loans typically have lower interest rates than credit cards, they can be used to consolidate multiple credit card debts into a single, lower-cost monthly payment.</p>
<p>A personal loan is a loan that does not require collateral or security and is offered with minimal documentation. You can use the funds from this loan for any legitimate financial need. Like any other loan, you must repay it accordance to the agreed terms with the bank.</p>
<ul class="personal-loan-list">
<li><i class="flaticon-check"></i> We offer the best rate.</li>
<li><i class="flaticon-check"></i> We give the best offer.</li>
<li><i class="flaticon-check"></i> Reply within 24 Hours</li>
</ul>
</div>
</div>
<div class="col-lg-6">
<div class="personal-loan-image">
	<img src="assets/img/personal-loan.jpg">
</div>
</div>
</div>
</div>
</section>


<section class="types-loan-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="types-loan-image">
	<img src="assets/img/types-loan.jpg">
</div>
</div>
<div class="col-lg-6">
<div class="types-loan-content">
<h3>Types of personal loans</h3>
<div class="types-loan-inner-content">
<div class="number">

</div>
<h4>Standard personal loans</h4>
<p>Loan amounts can range from $1,000 to $100,000, while loan terms range from 12 months to 84 months. A longer loan term will result in lower monthly payments, but higher interest costs.</p>
</div>
<div class="types-loan-inner-content">
<div class="number">

</div>
<h4>Online lenders</h4>
<p>In its broadest sense, online lending is any kind of loan that's not directly from a traditional bank. A number of online lenders are often referred to as an online lender because they are an alternative to a traditional bank.</p>
</div>
<div class="types-loan-inner-content">
<div class="number">

</div>
<h4>Specialized lenders</h4>
<p>In terms of SBA lending, a specialized lender is a bank or other financial institution that meets the SBA's criteria for offering SBA loan products.</p>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="apply-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="apply-content">
<h3>How do I apply for a loan</h3>
<div class="apply-inner-content">
<div class="number">

</div>
<h4>Learn the processing from us</h4>
<p>If you are a client/customer with us and you have no experience on how to get a loan, send a message on the contact page or give us or call or alternatively write us on our email, we will educate and put you through on the process. Its quite easy within minutes.</p>
</div>
<div class="apply-inner-content">
<div class="number">

</div>
<h4>Apply within 30 minutes</h4>
<p>Fill out the loan online form and wait within 24hrs to get a feedback from our customer care agent or loan officers.</p>
</div>
<div class="apply-inner-content">
<div class="number">

</div>
<h4>We will make a decision within 24 hours</h4>
<p>We get in touch ASAP with or without an approval.</p>
</div>

</div>
</div>
<div class="col-lg-6">
<div class="apply-image">
	<img src="assets/img/apply.jpg">
</div>
</div>
</div>
</div>
</section>



<section class="account-wrap ptb-100">
<div class="container">
<div class="section-title style1 text-center mb-40">
<span>Loan Form</span>
<h2>Apply For Loan</h2>
</div>
<form action="loan_script.php" method="post" class="account-form">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="fname">Full name</label>
<input type="text" id="fname" name="name" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="phone">Mobile Number</label>
<input type="number" id="phone" name="mobile" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="email">Email Address</label>
<input type="email" id="email" name="email" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="dob">Date Of Birth</label>
<input type="date" id="dob" name="dob" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="gender">Gender</label>
<select name="gender" id="gender" required>
<option value="">Gender</option>
<option value="Male">Male </option>
<option value="Female">Female </option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="marry_type">Marital Status</label>
<select name="marital_status" id="marry_type">
<option value="">Married</option>
<option value="Married">Married</option>
<option value="Unmarried">Unmarried</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="nation">Country</label>
<input type="text" id="country" name="country">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="ocupation">Ocupation</label>
<input type="text" id="ocupation" name="ocupation">
</div>
</div>


<div class="col-md-12">
<h4>Loan</h4>
</div>
<div class="col-md-6">
<div class="form-group">
 <label for="purpose">Purpose of loan</label>
<input type="text" name="purpose" id="purpose">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="gender">Loan Amount</label>
<select name="amount" required>
<option value="5000 - 10,000">$5000 - 10,000</option>
<option value="15,000 - 25,000">15,000 - 25,000</option>
<option value="25,000 - 50,000">25,000 - 50,000</option>
<option value="50,000 - 60,000">50,000 - 60,000</option>
<option value="60,000 - 70,000">60,000 - 70,000</option>
<option value="70,000 - 80,000">70,000 - 80,000</option>
<option value="80,000 - 90,000">80,000 - 90,000</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Loan term</label>
<select name="term" required>
<option value="1 months">1 months</option>
<option value="5 months">5 months</option>
<option value="8 months">8 months</option>
<option value="9 months">9 months</option>
<option value="10 months">10 months</option>
<option value="11 months">11 months</option>
<option value="12 months">12 months</option>
</select>
</div>
</div>

<div class="col-md-12">
<button class="btn style1 w-100 d-block" type="submit" name="loan_btn">Submit</button>
</div>
</div>
</form>
</div>
</section>

</div>



<?php include('includes/footer.php'); ?>