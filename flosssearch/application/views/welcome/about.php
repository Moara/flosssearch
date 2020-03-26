<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <title>FlossSearch.Edu</title>

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
              <h1 class="text-blue"><strong>FlossSearch</strong>.Edu</h1>
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
            Free/Libre and Open Source Software (FLOSS) have been used for different educational purposes. However, there is a large amount and diversity of projects in software repositories, which makes hard the selection of projects to use in the educational context.
			Our tool identifies and organizes 10 criteria that can be used to guide the teacher in this selection process of FLOSS projects.
			The  criteria can be grouped into two categories related to the level of teacher control over the projects and activities that will be carried out by the students. They categories are: No control and Inside Control. Using Floss Search assists you to select projects considering these two categories.
          </p>

        </div>
        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="margin-top: 1rem; margin-bottom: 2rem; text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #000000; font-size: 3.5rem;">About</h2>

        </div>

      </div>


      <div class="row bg-3">

        <div class="col-lg-4" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #FFFFFF; font-size: 3.1rem;">Understand more</h2>

        </div>

        <div class="col-lg-8" style="min-height: 500px;">
          
          <p style="margin-top: 4rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            <strong>Inside control</strong> - Inside control is done by branching the FLOSS code, preparing the activities / examples and assessing the students' contribution. After these steps, if you want to contribute to the project, it will be submitted for approval request of the community that maintains the software;
          </p>
          <p style="margin-top: 1rem; text-align: justify; font-size: 1.8rem; line-height: 3rem; color: #9CADC5; font-weight: 300; padding: 10px;">
            <strong>No Control</strong> - For the No Control category, the teacher only monitors the activities performed by the students within the project. Students work with requests from the FLOSS project community and the community approves the students' contribution directly from the project source repository.
          </p>

        </div>
        
      </div>

      <div class="row">

        <div class="col-lg-12" style="margin: 0 auto; text-align: center; margin-top: 7rem;">
          
          <h2 style="text-align: center; line-height: 1.2; letter-spacing: .07em; font-weight: 300; color: #000000; font-size: 4rem; padding: 0px; margin: 0px;">Our 10 criteria:</h2>

        </div>

        <div class="col-lg-12" style="min-height: 500px;">
          
          <p style="margin-top: 4rem; text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Programming Language - It returns the FLOSS projects that have the programming language as the predominant language in that project. The teacher should select the desired programming languages.
          </p>
          <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Number of Contributors - It returns the FLOSS projects that contain the entered number of contributors or a range of minimum and maximum number of contributors. This criterion is used to quantify the users who have already contributed to the project, and to accomplish that it counts only the number of users that have done commits to the project. Therefore, it does not verify if a user has committed only one or several times. The teacher must inform in the Range Sliders the minimum and maximum number of contributors in the project he wants.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Contributor Acceptance - It returns the FLOSS projects that potentially accept contributions from an external member of the project.
			The resulting projects have only evidence of acceptance, but actually commit acceptance can not be guaranteed. The teacher should choose whether to obtain projects that have clues that accept contributions or not.
			Note: In the GitHub page, under the tabs about the Project Issues, you can find the following information: "You can also take a look at the Open Source Guide. Issues labeled help wanted can be good first contributions”. 
			Thus, a search was made for specific Labels such as: "help wanted" and/or "good first issue".
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Issue Tracker - It returns the FLOSS projects that have Issue Tracker available and displays the location of the Open Issues.
			By default, the creation of a project in GitHub is accompanied by the creation of a versioned repository and a corresponding Issue Tracker for the project. However, the developer can disable the Issue Tracker, making it inaccessible to users. The Issue has two possible status: OPEN and CLOSED. We verify the existence of the Issue Tracker and the status of the issues of all the project and return those projects that have OPEN status. This way the teacher can choose whether to get projects that have Issue Tracker with Open Issues or not.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Active Community - It returns the available FLOSS projects that have clues of being an active community. The search is based on the user list activity. It returns the projects that have users (new developers) being answered in the community by the most experienced developers about any doubts. It is worth to mention that the assistance to new developers in the community can not be guaranteed. The teacher needs to enter a date that he wants to consider and the tool will check, from that date, if there are any comment history in the Issues.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Project Size - It returns the available FLOSS projects that are within a specified range of numbers of lines of code. The teacher needs to inform the Range Sliders of the minimum and maximum number of lines of code in the project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Maturity - It checks the number of releases of a project, since projects with a large amount of version history and release may indicate that the tasks under progress are complex and require more knowledge from the students. The teacher needs to inform the Range Sliders of the minimum and maximum number of releases for the project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Domain - It returns the FLOSS projects related to specific domains based on to the description of the projects. However, it the domain is not clear in the project description, it may not be returned. The required input is the following: the teacher needs to enter the desired domains in the text box, separating them by comma.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Active Project - It returns the available FLOSS projects that have recent contributions. This criteria is based on the frequency of contributions in the last 30 days. It is worth to mention that the content of commits are not evaluated. Studies show that 10 commits per month are minimally acceptable and 30 commits or more per month, on average, is good enough to be considered as an active project. However, since this opinion depends on the opinion of each teacher, he needs to inform the amount of commits in the last 30 days that he wants to consider as an active project.
            </p>
            <p style="text-align: justify; font-size: 1.5rem; color: #000000; font-weight: 300; padding: 10px;">
            Main Contributors - This criterion differs from the others and so that does not require data entry. It is applied when the teacher chooses to get projects whose control level is "No Control". The main contributors of FLOSS projects are returned and with that it is possible to identify if among the resulting contributors have any contributor who speaks the same language of the students or even if there is any well known contributor.
            </p>

        </div>
        
      </div>

  </div>

  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>