<!DOCTYPE html>
<html>
<title>Inventory Management</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4 {
        font-family: "Lato", sans-serif
    }
    
    .mySlides {
        display: none
    }
    
    .w3-tag,
    .fa {
        cursor: pointer
    }
    
    .w3-tag {
        height: 15px;
        width: 15px;
        padding: 0;
        margin-top: 6px
    }
    .iris {
        background-image: url("images/pencil.jpg");
        background-repeat: no-repeat;
        height: 150vh;
        background-size: cover;
    }
</style>

<body class="iris">

    <!-- Links (sit on top) -->
    <div class="w3-top">
        <div class="w3-row w3-large w3-white">
            <div class="w3-col s3 ">
                <a href="#" class="w3-button w3-block" style="color: #000">Home</a>
            </div>
            <div class="w3-col s3">
                <a href="#about" class="w3-button w3-block" style="color: #000">About</a>
            </div>
            <div class="w3-col s3">
                <a href="#contact" class="w3-button w3-block" style="color: #000">Contact</a>
            </div>
            <div class="w3-col s3">
                <a href="login.php" class="w3-button w3-block" style="color: #000">Login</a>
            </div>
        </div>
    </div>
    <!--
    <div class="w3-row w3-container">
        <div class="w3-center w3-padding-64">
            <span  class="w3-xlarge w3-bottombar w3-border-black w3-padding-16">Login or sign up for experiencing a better world for inventory management</span>
        </div>
        <div class="w3-center w3-padding-32" style="background-color: #000;">
            <span  class="w3-xlarge  w3-padding-8"><a href="/logintestapp/login/"><b style="color: #fff">Login / Sign Up</b></a></span>
        </div>
    </div>
    -->

    <!-- Grid -->
    <div class="w3-row w3-container">
        <div class="w3-center w3-padding-64">
            <span class="w3-xlarge w3-bottombar w3-border-black w3-padding-16">What We Offer</span>
        </div>
        <div class="w3-col l3 m6 w3-light-grey w3-container w3-padding-16">
            <h3>Objective of Management</h3>
            <p>Almost 90% of the working capital of a business is invested in inventories. The management should do proper planning on how to purchase, handle, store, and account with an inventory management system.

The main aim of an inventory management system is to keep the stock in such a way that it is neither overstock nor under stock.</p>
        </div>

        <div class="w3-col l3 m6 w3-grey w3-container w3-padding-16">
            <h3>who we are</h3>
            <p>Inventory Management is a process of ordering, storing, and using inventories. This stock management includes generating the lead on raw materials, components, and finished products, along-side warehousing and processing of such items in your company.</p>
        </div>

        <div class="w3-col l3 m6 w3-dark-grey w3-container w3-padding-16">
            <h3>A Good Management</h3>
            <p>We provides the best environment to our user to deal with the management of the stock.We let them know the status of every item.We provide every operations on the stock by which user can manage it very well.</p>
        </div>

        <div class="w3-col l3 m6 w3-black w3-container w3-padding-16">
            <h3>Consulting with user</h3>
            <p>We consults with the user and ask about the service which we are providing.And taking every meaningful feedback from them and improvise ourselves more efficient.</p>
        </div>

    </div>

    <!-- Grid -->


    <!-- Grid -->
    <div class="w3-row-padding" id="about">
        <div class="w3-center w3-padding-64">
            <span class="w3-xlarge w3-bottombar w3-border-black w3-padding-16">Who We Are</span>
        </div>

        <div class="w3-third w3-margin-bottom">
            <div class="w3-card-4" style="background-color: white;">
                <!--<img src="/w3images/team1.jpg" alt="John" style="width:100%">-->
                <div class="w3-container">
                    <h3>Jwalit Shah</h3>
                    <p class="w3-opacity">Developer</p>
                    <p>Developer of this management website</p>
                    <p>Contact</p>
                    <p>Email : jwalitshah2q@gmail.com<br>Mobile : 9427921800</p>
                </div>
            </div>
        </div>

        <div class="w3-third w3-margin-bottom" >
            <div class="w3-card-4" style="background-color: white;">
                <!--<img src="/w3images/team2.jpg" alt="Mike" style="width:100%">-->
                <div class="w3-container">
                    <h3>Ayan Shaikh</h3>
                    <p class="w3-opacity">Developer</p>
                    <p>Developer of this management website</p>
                    <p>Contact</p>
                    <p>Email : mahammadayan18@gmail.com<br>Mobile : 6355156937</p>
                    <!--<p><button class="w3-button w3-light-grey w3-block">Contact</button></p>-->
                </div>
            </div>
        </div>
    </div>

    <!--<div>
         Contact 
        <div class="w3-center w3-padding-64" id="contact">
            <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Contact Us</span>
        </div>

        <form class="w3-container" action="/admin/contact/" target="_blank">
            <div class="w3-section">
                <label>Name</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
            </div>
            <div class="w3-section">
                <label>Email</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
            </div>
            <div class="w3-section">
                <label>Subject</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
            </div>
            <div class="w3-section">
                <label>Message</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required>
            </div>
            <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>

    </div>
    -->

    <!-- Footer -->

    <div id="contact" class="w3-container w3-padding-32 w3-center">
        <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <div class="w3-xlarge w3-section">
            <a class="fa fa-facebook-official w3-hover-opacity" href="../facebook/"></a>
            <a class="fa fa-instagram w3-hover-opacity" href="../instagram/"></a>
            <a class="fa fa-twitter w3-hover-opacity" href="../twitter/"></a>
            <!--<i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>-->
        </div>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">jwalit and ayan</a></p>
    </div>

</body>

</html>