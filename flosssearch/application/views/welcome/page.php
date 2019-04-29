<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <title>Hello, world!</title>

  <style type="text/css">
    .text-blue {
      color: #0f6cb9!important;
    }
    h1 a:hover{
      text-decoration: none;
    }

    .bg{
      background-color: #0f6cb9;
      background-image: -webkit-linear-gradient(150deg, #FFFFFF 35%, #0f6cb9 35%);
      min-height: 200px;
    }

    .bg-2{
      background-color: #F1F4F8;
      background-image: -webkit-linear-gradient(-150deg, #F1F4F8 75%, #FFFFFF 10%);
      min-height: 200px;
    }

    .bg-3{
      background-color: #2B354F;
      background-image: -webkit-linear-gradient(150deg, #13203f 5%, #2B354F 5%);
    }

  </style>
</head>
<body>

  <div class="container-fluid">

    <!-- <div class="row align-items-center"> -->

      <div class="container">
        
        <div class="row">

            <div class="col" style="font-size: 3rem; padding: 20px; background-color:;">
              <h1 class="text-blue"><strong>f</strong>loss <strong>s</strong>earch</h1>
            </div>
            <div class="col" style="background-color:;">
              <a class="btn btn-outline-dark float-right" style="margin-top: 25px;" href="<?php echo base_url('about'); ?>" role="button">About</a>
            </div>

        </div>

      </div>

      <div class="row bg">
        
        <div class="col-lg-8" style="min-height: 500px;">
          <h2 style="margin-top: 7rem; margin-bottom: 2rem; text-align: center; line-height: 1.2; letter-spacing: -.02em; font-weight: 300; color: #FFFFFF;">Welcome to <span style="color: #FFFFFF; font-weight: 400;"><strong>f</strong>loss <strong>s</strong>earch</span>. Support in the process of choosing open source projects.</h2>
          
          <p style="text-align: center; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300;">
            Through FLOSS SEARCH, we seek to support the teacher in the process of choosing open source projects, hosted in GitHub, for use in software engineering education.
          </p>

          <div class="col-lg-12" style="text-align: center;">
            <a class="btn btn-outline-light" style="background-color: #0f6cb9; color: #ffffff; padding: 10px;" href="<?php echo base_url('search'); ?>" role="button">Start Selection <img src="<?php echo base_url('assets/images/arrow-right.svg'); ?>"></a>
          </div>

        </div>

        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <img src="<?php echo base_url('assets/images/detective.svg'); ?>" class=" img-fluid" width="200">

        </div>

      </div>

      <div class="" style="padding: 40px; display: flex; flex-direction: row; justify-content: center; align-items: center;">

          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
        
      </div>

      <div class="row bg-2">
        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="margin-top: 1rem; margin-bottom: 2rem; text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #000000; font-size: 3.5rem;">Understand <br>our <br>tool!</h2>

        </div>
        <div class="col-lg-8" style="min-height: 500px;">
          
          <p style="margin-top: 5.5rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            Because there is a growing diversity of projects available in software repositories, finding those that have the desired features for integration into a discipline may not be an easy task. With this in mind, we have identified criteria that have already been used in project selection and have built a beta version of a tool that helps you search for open source projects for use in the teaching-learning process.
          </p>

        </div>
      </div>


      <div class="row bg-3">

        <div class="col-lg-8" style="min-height: 500px;">
          
          <p style="margin-top: 5rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            All projects available here are hosted on GitHub.
            We used the Open Hub to identify the lines of code of the projects, and version 3 of the GitHub API to implement the scripts of the other criteria. Because of the limitations of this API, we run the deployed scripts on a set of projects chosen for convenience, and we store the results locally.
            When you run Floss Search, you will be referred to our local information base and not real-time information directly from GitHub.
            But do not worry, we update this information about the projects constantly.

          </p>

        </div>

        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="margin-top: 1rem; margin-bottom: 2rem; text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #FFFFFF; font-size: 3.5rem;">Learn more about our scripts and our database!</h2>

        </div>
        
      </div>

  </div>


  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>