<?php

include("dbConnection.php");
include("common_backend.php");   //including necessary php files

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Eco-Farming.DOA.lk</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />


  <link rel="stylesheet" href="commonstyles.css" type="text/css" />
  <link rel="stylesheet" href="formstyles.css" type="text/css" />
  <style>
    #logo-container img {
      align-self: center;
      width: 100%;
      height: 100px;
      object-fit: contain;
    }

    #logo-container {
      position: absolute;
      margin-left: 30%;
      margin-top: 80px;
      background-color: #fdfefe;
      width: 40%;
      padding: 0;
      border-radius: 100px;
      z-index: 1;
    }

    #first-view {
      position: relative;
    }

    #first-view h1 {
      width: 98%;
      position: absolute;
      z-index: 1;
      bottom: 5%;
      left: 1%;
      color: white;
      font-size: 3em;
      font-weight: 100;
      backdrop-filter: blur(8px);
      border-radius: 100px;
      text-align: center;
    }

    #topImg {
      margin-top: 30px;
      width: 100%;
      height: 630px;
      background-size: cover;
    }

    #product-gallery-box {
      margin-top: 30px;
      margin-top: 30px;
      margin-left: 5%;
      padding: 20px;
      width: 90%;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 30px;
      box-shadow: 20px 20px 20px;
      overflow-y: scroll;
      max-height: 500px;
      height: fit-content;
    }

    .product-gallery {
      width: 260px;
      height: 270px;
      background-color: white;
      margin: 10px;
      border: 5px solid white;
      border-radius: 30px;
      box-shadow: 10px 10px 10px;
    }

    .product-gallery:hover {
      cursor: pointer;
      border: 5px solid #023020;
    }

    #product-gallery-box::-webkit-scrollbar {
      display: none;
    }

    .product-gallery p {
      text-align: center;
    }

    #product-gallery-box .product-gallery img {
      width: 250px;
      height: 200px;
      padding: 15px;
    }

    #product-gallery-box .product-gallery p {
      font-size: 1.3em;
      font-weight: 500;
      margin: 0 auto 15px;
      text-align: center;
    }
  </style>

</head>

<body>

  <div>
    <header class="navbar"> <!--  navigation  bar for go to different sections of the page-->
      <ul>
        <li><a href="#home_section" >Home</a></li>
        <li><a href="#About-us-section" >About us</a></li>
        <li><a href="#Services-section" >Our sevices</a></li>
        <li><a href="#Products-section">Our products</a></li>
        <li><a href="#Contact-section" >Contact us</a></li>
        <button id="btnPopUP" onclick="openForm('loginForm')">Login</button>
      </ul>
    </header>
  </div>

  <div id="home_section">
    <div id="first-view">
      <div id="logo-container">
        <img src="images/logo.JPEG" alt="Department logo" />
      </div>
      <h1>
        Sustainable Agriculture in Sri Lanka: Nurturing Ecological Farming
      </h1>
      <img id="topImg" src="images/organic-farming.jpg" alt="main-topic-img" />
    </div>
  </div>

  <div class="section" id="First-content-section">
    <h2>Ecological Farming for a Sustainable Future</h2>
    <p>
      Ecological Farming, often referred to as eco-farming, is at the heart of
      our agricultural philosophy. It represents a vision for a sustainable
      future where farming practices are harmonized with nature. This approach
      ensures not only healthy farming but also healthy food for today and
      generations to come. By prioritizing the protection of soil, water, and
      climate, eco-farming promotes biodiversity and steers clear of
      contaminating our environment with harmful chemical inputs or genetic
      engineering.
    </p>
    <h2>Why Ecological Farming Matters</h2>
    <p>
      Ecological farming, often referred to as eco-farming, is a holistic
      approach that ensures the well-being of both farmers and consumers. By
      steering clear of harmful chemical inputs and genetic engineering, we
      safeguard our environment while simultaneously producing healthy,
      nutritious food. This commitment to ecological farming aligns with our
      vision for a sustainable future, where agriculture flourishes in harmony
      with the natural world.
    </p>
    <h2>Embracing the Organic Revolution</h2>
    <p style="width: 33.55%">
      A sign of the expanding understanding of the advantages of ecological
      and sustainable agriculture is the rising demand for organic food items
      in Sri Lanka right now. Farmers and customers alike are becoming more
      and more interested in organic farming methods, demonstrating a shared
      commitment to a healthier and more environmentally responsible
      future.The food business in the nation is changing as a result of this
      trend, which is also generating a sense of need to protect the
      environment. This change encourages living sustainably.
    </p>
    <img src="images/food.png" alt="Food-image" />
    <h2>Explore Our Website</h2>
    <p>
      We invite you to explore our website to learn more about our efforts in
      promoting ecological farming practices in Sri Lanka, the sustainable
      agricultural technologies we champion, and the organic revolution that
      is sweeping across our nation. Together, we can cultivate a future where
      agriculture and the environment coexist harmoniously, ensuring not only
      food security but also the well-being of our planet.
    </p>
    <p>
      Join us in nurturing a sustainable agricultural legacy for Sri Lanka,
      where healthy farming yields healthy food for today and a brighter
      tomorrow.
    </p>
  </div>

  <div class="section" id="About-us-section">
    <h1>About us</h1>
    <div class="about-us-content">
      <table class="about-us-table">
        <tr>
          <td>
            <img src="images/DOA.jpg" alt="DOA" height="300px" />
          </td>
          <td>
            <h2>Department of Agriculture</h2>
            <p style="padding-left: 30px">
              The Department of Agriculture (DOA) in Sri Lanka stands as a
              venerable institution at the forefront of the nation's
              agricultural landscape. Operating under the esteemed Ministry of
              Agriculture, the DOA is one of the largest government
              departments, boasting a distinguished cadre of agricultural
              scientists and a vast network of research institutes. Our
              dedication to the agricultural sector is unwavering, and our
              mission is clear: to drive sustainable agricultural development
              and food security across Sri Lanka.
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <h2>Ecological Farming Section</h2>
            <p>
              In recognition of the evolving needs of our agricultural sector
              and the pressing importance of ecological sustainability, the
              DOA introduced the Ecological Farming section several years ago.
              This pioneering initiative signifies our commitment to
              cultivating a more environmentally conscious and resilient
              agricultural landscape. Our Ecological Farming section is
              dedicated to promoting farming practices that harmonize with
              nature. By adopting sustainable approaches that prioritize soil
              health, water conservation, and the preservation of our climate,
              we aim to protect the environment for generations to come.
            </p>
          </td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="section" id="Services-section">
    <h1>Our Services</h1>
    <p>Discover a world of sustainable farming at the Ecological Farming Section. We provide a range of services
      designed to empower farmers and agricultural stakeholders in Sri Lanka. From access to a wealth of ecological
      farming resources to personalized consultations with field officers, our platform is your gateway to
      environmentally friendly and productive agriculture. Whether you're seeking knowledge, support, or practical
      solutions, we're here to help you embark on a journey toward healthier, eco-conscious farming practices</p>

    <div id="gallery-box">
      <div class="service-gallery online" onclick="openForm('registerForm')">
        <img src="images/community.jpg" alt="community">
        <div class="description">
          <h3>Online Registration for Farmers</h3>
          <p>Join our community of eco-conscious farmers. Register to access exclusive resources and personalized
            assistance.</p>
        </div>
      </div>
      <div class="service-gallery online" onclick="openForm('login-required')">
        <a>
          <img src="images/Enquiring.jpeg" alt="">
        </a>
        <div class="description">
          <h3>Query Submission</h3>
          <p>Have questions about ecological farming? Ask our experts</p>
        </div>
      </div>
      <div class="service-gallery onsite" onclick="openForm('onsite')">

        <img src="images/fertilizers.jpg" alt="fertilizers">

        <div class="description">
          <h3>Provide Organic fertilizers</h3>
          <p>Boost your crops sustainably with our organic fertilizers. Nourish your soil and harvest healthier,
            eco-conscious yields effortlessly.</p>
        </div>
      </div>
      <div class="service-gallery online" onclick="openForm('login-required')">
        <a>
          <img src="images/consulting.jpg" alt="consulting">
        </a>
        <div class="description">
          <h3>Service Requests and Consultations</h3>
          <p>Get one-on-one guidance from our field officers. Request services and consultations tailored to your
            farming
            needs.</p>
        </div>
      </div>
      <div class="service-gallery workshop" onclick="openForm('workshop')">
        <img src="images/workshop.jpg" alt="workshop">
        <div class="description">
          <h3>Online Workshops and Training Programs</h3>
          <p>Elevate your farming skills with our online workshops and training. Join fellow farmers on the path to
            sustainable agriculture.</p>
        </div>
      </div>
      <div class="service-gallery online" onclick="openForm('login-required')">
        <img src="images/products.jpeg" alt="Showcase">
        <div class="description">
          <h3>Add Your Organic Product to the Showcase</h3>
          <p>Promote your organic products to a wider audience. Showcase your produce on our platform and connect with
            eco-conscious consumers.</p>
        </div>
      </div>
    </div>

    <div class="popup-form" id="login-required">
      <span class="close-button" onclick="closeForm('login-required')">X</span>
      <h3>You have to login as a farmer to use this service</h3>
      <button id="btn-login-required" onclick="closeForm('login-required');openForm('loginForm');">
        Click here to login
      </button>
    </div> <!--Login required popping up-->

    <div class="popup-form" id="onsite">
      <span class="close-button" onclick="closeForm('onsite')">X</span>
      <h3>You have to come to your nearest reigional eco farming centre to get this service</h3>
    </div>

    <div class="popup-form" id="workshop">
      <span class="close-button" onclick="closeForm('workshop')">X</span>
      <h3>If you are a registered user,You will be notified about our upcoming workshops and training programs</h3>
    </div>
  </div>

  <div class="section" id="Products-section">

    <h1>Organic products</h1>

    <p>Discover our carefully picked selection of organic goods that our enthusiastic and committed farmers have
      lovingly shared. Immerse yourself in the pure essence of locally sourced, sustainable goodness as it makes its way
      from the farm to your plate. Every product in our collection reveals the devotion to environmental preservation
      and eco-conscious farming. Enjoy the flavors of fresh, pesticide-free fruit and take pleasure in artisanal works
      of art that honor the wealth of nature. Supporting our platform helps ensure that Sri Lankan agriculture has a
      brighter, more sustainable future while also nourishing your body with natural deliciousness.</p>

    <p>On our platform, you can find a wide range of superb organic items that each perfectly capture the spirit of
      regional, sustainable farming. You have the option to adopt these offerings if you are drawn to them. To purchase
      these treasures and enjoy the benefits of environmentally friendly farming, just stop by one of our regional
      branches. This will definitely elevate your farm-to-table experience.</p>

    <div id="product-gallery-box">
      <?php
      viewProductGallery($conn);  //product gallery function invoking
      ?>
    </div>
  </div>
  <div class="section" id="Contact-section">
    <table id="contact-table">
      <tr>
        <td>
          <form action="" id="ask-form" method="POST">
            <h2>Ask from us</h2>
            <h3>* Please fill out this form to submit your inquires *</h3>
            <div class="contact-inputs">
              <input type="text" name="name" placeholder="Enter your name" required />
            </div>
            <div class="contact-inputs">
              <input type="text" name="contact" placeholder="Enter your Contact number" required />
            </div>
            <div class="contact-inputs">
              <input type="email" name="email" placeholder="Enter your Email" required />
            </div>
            <div class="contact-inputs">
              <textarea name="question" id="question" cols="50" rows="10" placeholder="Enter your message here (max 250 characters)"></textarea>
            </div>
            <input type="submit" id="question-submit" value="Send" name="question-submit" />
          </form>
        </td>
        <td>
          <div class="contact-info">
            <h2>Contact info</h2>
            <div class="contact-content">
              <div class="text">
                <h3>Adress</h3>
                <p>
                  <a href="https://www.google.com/maps/place/Department+of+Agriculture+Head+Office/@7.2613123,80.5938304,17z/data=!3m1!4b1!4m6!3m5!1s0x3ae368d106310661:0x6e023feae69d62d7!8m2!3d7.261307!4d80.5964053!16s%2Fg%2F11hcq5y0g0?entry=ttu" target="_blank">
                    Eco Farming section-Department of Agriculture,</a><br />
                  P.O.Box. 1,<br />
                  Peradeniya,<br />
                  Sri Lanka
                </p>
              </div>
              <div class="text">
                <h3>Phone</h3>
                <p>+94 812 3845332 / 33 / 34</p>
              </div>
              <div class="text">
                <h3>Email</h3>
                <a href="mailto:ecofarming.doa@gmail.com">ecofarming.doa@gmail.com</a>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="overlay" id="overlay"></div>
  <!--Empty container to load popup form-->

  <form action="" class="popup-form" id="loginForm" method="POST">
    <span class="close-button" onclick="closeForm('loginForm')">X</span>
    <h2>Login</h2>
    <div class="input-box">
      <input type="text" name="L_username" required id="L_username" />
      <label>Username</label>
    </div>
    <div class="input-box">
      <input type="password" name="L_password" required id="L_password" />
      <label>Password</label>
    </div>
    <div class="remember-forgot">
      <label><input type="checkbox" name="remember_me" id="remember_me" /> Remember me</label>
      <button type="button" id="btn-forgot-password" onclick="closeForm('loginForm');openForm('email-submit');">
        Forgot Password
      </button>
    </div>
    <input type="submit" class="btn" value="Login" name="loginButton">
    <div class="login-register">
      <p>
        Don't have an account?
        <button type="button" id="btn-login-register" onclick="closeForm('loginForm');openForm('registerForm');">
          Register Now
        </button>
      </p>
    </div>
  </form>

  <form action="" class="popup-form" id="registerForm" method="POST" onsubmit="return formValidation();">
    <span class="close-button" onclick="closeForm('registerForm')">X</span>
    <h2>Registration</h2>
    <div class="input-box">
      <input type="text" name="user_reg_username" required id="userName" />
      <label>Username</label>
    </div>
    <div class="input-box">
      <input type="password" name="user_reg_password" id="password" required />
      <label>Password</label>
    </div>
    <div class="input-box">
      <input type="password" name="user_reg_confirmpassword" id="confirmPassword" required />
      <label>Confirm Password</label>
    </div>
    <div style="margin-top: 5px">
                <span style="margin:0 0 0 10px; font-size: small; color: red;" 
                id="error-message"></span>
                </div>
    <div class="iagree">
      <label><input type="checkbox" name="user_reg_agree" required /> I agree to
        the terms & conditions</label>
    </div>
    <span id="username_error"></span>
    <input type="submit" class="btn" value="Register" name="registerButton">
    <div class="login-register">
      <p>
        Already have an account?
        <button type="button" id="btn-register-login" onclick="closeForm('registerForm');openForm('loginForm');">
          Login
        </button>
      </p>
    </div>
  </form>

  <form action="" class="popup-form" id="email-submit" method="POST">
    <span class="close-button" onclick="closeForm('email-submit')">X</span>
    <span class="btnback" onclick="backToPrevious('email-submit')">Back</span>
    <h2>Reset Password</h2>
    <div class="input-box">
      <input type="email" name="user_email_submit" required />
      <label>Email</label>
    </div>
    <input type="submit" class="btn" value="Next" name="email_submit_button">
  </form>
  <div id="footerDiv">
    <footer>
      Copyright © 2023 <a href="home.php">Ecological Farming Section</a> of
      <a href="https://doa.gov.lk/home-page/" target="_blank">Department of Agriculture</a>
      Sri Lanka -
      <a href="https://www.agrimin.gov.lk/" target="_blank">Ministry of Agriculture</a>. All rights reserved.
    </footer>
  </div>

  <script src="script.js"></script>

</body>

</html>

<?php
mysqli_close($conn);
?>