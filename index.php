<?php
//quotes beg
//displays random quotes
function loadMessagesFromFile($file)
{
    if(!file_exists($file))
    {
        return false;
    }

    $fh       = fopen($file, 'r');
    $messages = array();

    while($data = fgets($fh))
    {
        $messages[] = $data;
    }

    fclose($fh);

    return $messages;
}

$messages_from_file = loadMessagesFromFile('news.txt');
$key = array_rand($messages_from_file);
//quotes end

?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="https://moneygment.xyz">
    <img src="img/brand.png" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="https://moneygment.xyz" >
                Home
            </a>
        </li>
    </ul>

    
    <a class="btn btn-outline-primary mr-2" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>    
    <a class=" btn btn-primary text-white" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>
    </div>
</nav>
<title>Join. Monitor. Save. | Moneygment</title>





<div class="container-fluid text-center  ">
    <div class="row bg-success p-3 align-items-center">        
        <div class="container col-sm ">
            <img src="img/brand.png" width="50" height="50" alt=""> <h1 style="display:inline" class="text-white">Moneygment</h1>
            <h3 class=" text-white p-3">We’ll help you reach your savings goals.</h3>
            <a href="register.php" class="btn btn-light text-success p-3">Try it for FREE!</a>
        </div>

        <div class="col-sm    ">
            <img class="img-fluid maxwidth: 100%; height: auto;" src="img/monitor.png" >
            <p class=" text-white">Join. Monitor. Save.</p>
        </div>
    </div>
    <div class="row bg-white pt-5">        
        <div class="container col-sm ">
            <h4>With Moneygment you can:</h4>
        </div>
    </div>
    <div class="row bg-white pt-4 pb-5">        
        <div class="container col-sm ">
            <img src="img/SEO_042-dashboard-report-analytics-chart-512.png" height="150" width="150">
            <h3>See the whole picture</h3>
            <p>Dashboard to see how your Cash flows.</p>
        </div>
        <div class="container col-sm ">
            <img src="img/icons-500x500px-cash-management.png" height="150" width="150" >
            <h3>Manage your cash</h3>  
            <p>Moneygment helps you plan and anticipate every move. </p>
        </div>
        <div class="container col-sm ">
            <img src="img/privacyprotection.png" height="150" width="150">
            <h3>Use Your Data Your Way</h3>
            <p>Moneygment never sells customer data to anyone.</p>
        </div>
    </div>

    <div class="row bg-primary align-items-center">        
        <div class="container col-sm  p-3">
            <h4 class=" text-white">For a BETTER Life</h4>
            <p class="p-5 text-white">
                <strong class="lead "><i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo ucfirst($messages_from_file[$key]);?> <i class="fa fa-quote-right" aria-hidden="true"></i></strong>
            </p>
        </div>
        <div class="container col-sm ">
            <img class="img-fluid maxwidth: 100%; height: auto;" src="img/piggy-bank.png" >
            
        </div>
    </div>

    <div class="row bg-white pt-5">        
        <div class="container col-sm">
            <h2>Own Your Future with Moneygment</h2>
        </div>
    </div>

    <div class="row bg-white pt-5 pb-5">        
        <div class="container col-sm">
            <img src="img/question_mark_PNG56.png" width="130" height="130">
            <h5>Ask the Questions</h5>
            <p>Where does my money go?</p>
        </div>
        <div class="container col-sm">
            <img src="img/Big-Data.png" width="130" height="130">
            <h5>See the data</h5>
            <p>Unlock key insights.</p>
        </div>
        <div class="container col-sm">
            <img src="img/Goals.png" width="130" height="130" >
            <h5>Have the  answers</h5>
            <p>Anytime. Anywhere.</p>
        </div>
    </div>

    <div class="row bg-success pt-5 pb-5">        
        <div class="container col-sm">
            <h1 class=" text-white">Let Moneygment Work for You: Try it Free</h1>
            <a href="register.php" class="btn btn-dark p-3 m-5 img-fluid max-width: 100%; height: auto;"><i class="fa fa-desktop" aria-hidden="true"></i> Register</a><br>
            <img class="p-5 img-fluid maxwidth: 100%; height: auto;" src="img/Save-Money.png">
        </div>
    </div>
</div>

<footer class="footer bg-white">
    <div class="container text-center">
        <div class="row">
            <div class="col footer-copyright  py-3">
                <small>
					<a class="text-reset" href="contactus.php">Contact Us</a>&nbsp;
                    <a class="text-reset" href="privacy.php">Privacy</a>&nbsp;
                    <a class="text-reset" href="faqs.php">FAQs</a>&nbsp;
                    <a class="text-reset" href="about.php">About</a>
                    Copyright &copy; <?php echo date("Y");?> Made with <i class="text-danger icon ion-heart"></i> by <a class=" text-reset text-muted" target="_blank" href="http://fb.me/renzthegeek">Lorence</a>
                </small>
            </div>
        </div>
    </div>
</footer>