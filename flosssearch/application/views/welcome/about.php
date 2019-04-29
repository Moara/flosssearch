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
      background-image: -webkit-linear-gradient(150deg, #FFFFFF 10%, #0f6cb9 70%);
      height: 20px;
    }

    .bg-2{
      background-color: #F1F4F8;
      background-image: -webkit-linear-gradient(150deg, #FFFFFF 25%, #F1F4F8 25%);
    }

    .bg-3{
      background-color: #2B354F;
      background-image: -webkit-linear-gradient(150deg, #13203f 5%, #2B354F 5%);
      min-height: 650px;
    }

  </style>
</head>
<body>

  <div class="container-fluid">

      <div class="container">
        
        <div class="row">

            <div class="col" style="font-size: 3rem; padding: 20px;">
              <h1 class="text-blue"><strong>f</strong>loss <strong>s</strong>earch</h1>
            </div>
            <div class="col">
              <a class="btn btn-outline-dark float-right" style="margin-top: 25px;" href="<?php echo base_url(''); ?>" role="button">Home</a>
            </div>

        </div>

      </div>

      <div class="row bg"></div>

      <div class="" style="padding: 40px; display: flex; flex-direction: row; justify-content: center; align-items: center;">

          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
          <div style="background-color: #0c62b7; width: 5px; height: 5px; border-radius: 50%; margin: 10px; border: 1px solid #076ec1; box-shadow: 0px 0px 10px 2px rgba(15, 108, 185,0.75);"></div>
        
      </div>

      <div class="row bg-2">
        
        <div class="col-lg-8" style="min-height: 500px;">
          
          <p style="margin-top: 5.5rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            Free/Libre and Open Source Software (FLOSS) have been used for different educational purposes. However, there is a large amount and diversity of projects in software repositories, which makes it difficult to select one or more for use in the educational context.

            With this in mind, we have identified and organized 10 criteria that can be used to guide the teacher in selecting FLOSS projects.

            The identified criteria can be grouped into two categories related to the level of teacher control over the projects and activities that will be carried out by the students. They are: No control and Inside Control.
          </p>

        </div>
        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="margin-top: 1rem; margin-bottom: 2rem; text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #000000; font-size: 3.5rem;">About</h2>

        </div>

      </div>


      <div class="row bg-3">

        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #FFFFFF; font-size: 3.1rem;">Using Floss Search you can select projects by considering these two categories. Understand more:</h2>

        </div>

        <div class="col-lg-8" style="min-height: 500px;">
          
          <p style="margin-top: 4rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            <strong>Inside control</strong> - Inside control is done by branching the FLOSS code, preparing the activities / examples and assessing the students' contribution. Only after these steps, if you want to contribute to the project, will it be submitted to the approval of the community that maintains the software.
          </p>
          <p style="margin-top: 1rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            <strong>No Control</strong> - No Control, the teacher only monitors the activities performed by the students within the project. Students work with requests from the FLOSS project community and the community approves the students' contribution directly to the project source repository.
          </p>

        </div>
        
      </div>

      <div class="row">

        <div class="col-lg-12" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #000000; font-size: 4rem; padding: 0px; margin: 0px;">Meet our criteria:</h2>

        </div>

        <div class="col-lg-12" style="min-height: 500px;">
          
          <p style="margin-top: 4rem; text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Programming Language - Returns FLOSS projects that have the programming language informed as the predominant language in that project. The teacher should choose the desired programming languages ​​in the checkbox.
          </p>
          <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Number of Contributors - Returns FLOSS projects, among those available, containing a specific number of contributors, or within a specified range (minimum and maximum number of contributors). The criterion is used to quantify users who have already contributed to the project, so it counts only the number of people who have committed the project, so it is not verified if a user has committed only one or several. The teacher must inform the Range Sliders of the minimum and maximum desired number of contributors in the project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Contributor Acceptance - Returns FLOSS projects that possibly accept contributions from an external member to the project.
            The returned projects have only hints of acceptance, but actually commit acceptance can not be guaranteed. The teacher should choose whether to obtain projects that have clues that accept contributions or not.
            Note: In the GitHub page, in the tabs corresponding to Project Issues, you will find the following information: "You can also take a look at the Open Source Guide. Issues labeled help wanted can be good first contributions”. 
            Thus, a search was made for specific Labels such as: "help wanted" and/or "good first issue".
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Issue Tracker - Returns available FLOSS projects that have Issue Tracker available and displaying the location of Open Issues.
            By default, creating a project in GitHub is accompanied by the creation of a versioned repository and a corresponding Issue Tracker for the project. However, the developer can disable the Issue Tracker, making it inaccessible to users. The Issue has two possible states: OPEN and CLOSED. Therefore, the existence of the Issue Tracker and the Status of the Issues of all the projects are verified, returning those that have the OPEN status. The teacher should choose whether to get projects that have Issue Tracker with Open Issues or not.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Active Community - Returns FLOSS projects, among those available, that have indications that your community is active. Search for projects is done based on user list activity. Will be returned projects with indications that the users (new developers) will have their possible doubts answered by the most experienced developers. Recalling that they are only indications, the support of the community to new developers, in fact, can not be guaranteed. The teacher must enter a date that he considers sufficient and will be checked if, after that date, there is a comment history in the Issues. The teacher must enter a date that he considers sufficient and will be checked if, after that date, there is a comment history in the Issues.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Project Size - Returns FLOSS projects, among those available, that are within a specified range related to the number of lines of code. The teacher must inform the Range Sliders of the minimum and maximum number of lines of code in the project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Maturity - Return FLOSS projects that may or may not be evolved. Project maturity is checked by the number of releases, since projects with a consistent history of releases and releases may indicate that the remaining tasks are complex and require more student knowledge. The teacher must inform the Range Sliders of the minimum and maximum number of project releases.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Domain - Return FLOSS projects according to specified domains. The projects with the specified domains will be returned, according to the description body of each project. If the domain is not clear in the project description, it may not be returned. The teacher should enter the desired domains in the text box, separating them with a comma.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Active Project - Returns FLOSS projects, among those available, which have indications that it is active with recent contributions (for example: contributions made in the last 30 days). The evidence is based only on the frequency of contributions made in the last 30 days. It is worth remembering that the content of commits are not evaluated. Studies show that 10 commits per month are minimally acceptable and 30 commits or more per month, on average, would be favorable. But since this amount can be relative, depending on the opinion of each teacher, he must inform the amount of commit in the last 30 days that he considers as an active project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Main Contributors - This criterion differs from the others, and is therefore not a criterion that has data entry.
            It automatically applies when the teacher wants to get projects whose control level is "No Control". The main contributors of the FLOSS projects are returned and it is possible to observe if any of the main contributors returned have a known contributor or the main contributors returned, speak the same language as the students.

            </p>

        </div>
        
      </div>

  </div>

  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>