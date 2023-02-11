<?php 
    require_once '../private/init.php';
    include_once PRIVATE_PATH . 'generatable.php';
    include_once SHARED_PATH . 'head.php';

    echo '<link rel="stylesheet" href="' . CSS_PATH . 'about_me.css">';

    // Title is set in page_header.php
    $title = "About Caiden Pyle";
    include_once SHARED_PATH . 'page_header.php';
?>
    <div class="page-heading top-level-container">
      <div class="profile-picture">
        <img src="profile_picture.jpg" alt="Caiden">
      </div>
      <div class="current-info">
        <h1 id="current-title">Caiden Pyle, CISSP, AWS Solutions Architect - Software Developer II.</h1>
        <p>Full-stack software engineer with 6+ years of experience developing 
        high-performance software applications and solutions. Highly experienced
        in all aspects of the software development lifecycle, as well as designing
        and implementing AWS cloud solutions.
        </p>
      </div>
    </div>

    <div class="top-level-container expertise">
      <h1 class="title blue-text">Areas of Expertise</h1>
      <div class="expertise-container">
      <?php
          $areas = array(
              'Amazon Web Services (AWS)',
              'Python',
              'Scrum & Agile Methodologies',
              'Software Development Lifecycle',
              'Continuous Integration'
          );
          
          foreach ($areas as $area) {
              echo '<div class="expertise-area"><p>' . $area . '</p></div>';
          }
      ?>
      </div>
    </div>

    <div class="top-level-container work-experience">
      <h1 class="title blue-text">Work Experience</h1>
      
      <div class="job">
        <h2 class="job-title">Software Developer II</h2>
        <h3 class="company">Novacoast</h3>
        <h4 class="work-dates">02/2023&nbsp;&ndash;&nbsp;present</h4>
        <div class="technical-skills-container">
        <?php
            $skills = array(
                'Python',
                'Go',
                'Scrum & Agile Methodologies',
                'Docker',
                'Kubernetes',
                'Git',
                'GitHub Actions',
                'Continuous Integration'
            );

            foreach ($skills as $skill) {
                echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
            }
        ?>
        </div>
        <ul>
        </ul>
      </div>

      <div class="job">
        <h2 class="job-title">Vulnerability Analysis / Quality Assurance</h2>
        <h3 class="company">NetApp E-Series</h3>
        <h4 class="work-dates">04/2020&nbsp;&ndash;&nbsp;02/2023</h4>
        <div class="technical-skills-container">
        <?php
            $skills = array(
                'Python',
                'Docker',
                'AWS (EC2, S3, EFS)',
                'Scrum & Agile Methodologies',
                'Debian Linux',
                'Git',
                'Continuous Integration',
                'Nessus',
                'REST APIs',
                'Jenkins',
                'Pytest',
                'Selenium',
                'Playwright',
                'Jira',
                'Confluence'
            );

            foreach ($skills as $skill) {
                echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
            }
        ?>
        </div>
        <ul>
          <li class="job-task-bullet">Created Python testing framework to reach near 100% code test coverage across all our REST APIs.</li>
          <li class="job-task-bullet">Created Python library to add Nessus and Invicti vulnerability scanning to several continuous integration pipelines including firmware builds, REST API definitions, and web proxy builds.</li>
          <li class="job-task-bullet">Designed, developed, and deployed testing techniques for new features and defect patches.</li>
        </ul>
      </div>

      <div class="job">
        <h2 class="job-title">Software Engineer in Test</h2>
        <h3 class="company">NetApp SolidFire</h3>
        <h4 class="work-dates">01/2019&nbsp;&ndash;&nbsp;04/2020</h4>
        <div class="technical-skills-container">
        <?php
            $skills = array(
                'Python',
                'PHP',
                'Scrum & Agile Methodologies',
                'Continuous Integration',
                'Debian Linux',
                'HTML5',
                'CSS3',
                'MySQL',
                'Git',
                'PowerShell',
                'REST APIs',
                'Pytest',
                'Jira',
                'Confluence'
            );

            foreach ($skills as $skill) {
                echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
            }
        ?>
        </div>
        <ul>
          <li class="job-task-bullet">Created Python library that 100% automated managing vCenter servers and virtual machines for testing new releases of software through consuming the vCenter REST API.</li>
          <li class="job-task-bullet">Created and maintained internal websites with PHP, JavaScript, MySQL, HTML, and CSS.</li>
          <li class="job-task-bullet">Designed, developed, and deployed testing techniques for new features and defect patches.</li>
        </ul>
      </div>

      <div class="job">
        <h2 class="job-title">Information Technology</h2>
        <h3 class="company">Textron Aviation</h3>
        <h4 class="work-dates">10/2017&nbsp;&ndash;&nbsp;/2019</h4>
        <div class="technical-skills-container">
        <?php
            $skills = array(
                'PowerShell',
                'Windows Administration',
                'HTML5',
                'CSS3',
                'Git',
                'Pip',
                'TCP/IP',
                'HTTP'
            );

            foreach ($skills as $skill) {
                echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
            }
        ?>
        </div>
        <ul>
          <li class="job-task-bullet">Utilized PowerShell to manage active directory objects.</li>
          <li class="job-task-bullet">Supported Textron employees in person by configuring and fixing software and hardware.</li>
        </ul>
      </div>
    </div>
    
    <div class="top-level-container technical-skills">
      <h1 class="title blue-text">All Technical Skills</h1>
      <div class="all-technical-skills-container">
      <?php
          $skills = array(
              'Python',
              'Docker',
              'Go',
              'GitHub Actions',
              'C++',
              'PHP',
              'Debian Linux',
              'HTML5',
              'CSS3',
              'MySQL',
              'SQL',
              'Git',
              'GitHub',
              'PowerShell',
              'Pip',
              'REST APIs',
              'Jenkins',
              'Pytest',
              'Selenium',
              'Jira',
              'Confluence'
          );

          foreach ($skills as $skill) {
              echo '<div class="technical-skill-all"><p>' . $skill . '</p></div>';
          }
      ?>
      </div>
    </div>

    <div class="top-level-container">
      <h1 class="title blue-text">Certifications</h1>

      <div class="cert-container">
        <div class="left-column">
          <div class="cert">
            <div class="flex-container">
              <div class="cert-icon flex-child">
                <img src="awsccp.jpg" alt="AWS" class="icon-img">
              </div>
              <div class="cert-description flex-child">
                <h2 class="tile-title">AWS Certified Cloud Practitioner</h2>
                <h3 class="tile-sub-title blue-text">Amazon</h3>
                <h4 class="cert-date">02/28/2023</h4>
              </div>
            </div>
          </div>
          <div class="cert">
            <div class="flex-container">
              <div class="cert-icon flex-child">
                <img src="awscsaa.jpg" alt="AWS" class="icon-img">
              </div>
              <div class="cert-description flex-child">
                <h2 class="tile-title">AWS Certified Solutions Architect - Associate</h2>
                <h3 class="tile-sub-title blue-text">Amazon</h3>
                <h4 class="cert-date">04/28/2023</h4>
              </div>
            </div>
          </div>
          <div class="cert">
            <div class="flex-container">
              <div class="cert-icon flex-child">
                <img src="awscd.jpg" alt="AWS" class="icon-img">
              </div>
              <div class="cert-description flex-child">
                <h2 class="tile-title">AWS Certified Developer</h2>
                <h3 class="tile-sub-title blue-text">Amazon</h3>
                <h4 class="cert-date">05/28/2023</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="right-column">
          <div class="cert">
            <div class="flex-container">
              <div class="cert-icon flex-child">
                <img src="awscsa.jpg" alt="AWS" class="icon-img">
              </div>
              <div class="cert-description flex-child">
                <h2 class="tile-title">AWS Certified SysOps Administrator</h2>
                <h3 class="tile-sub-title blue-text">Amazon</h3>
                <h4 class="cert-date">06/28/2023</h4>
              </div>
            </div>
          </div>
          <div class="cert">
            <div class="flex-container">
              <div class="cert-icon flex-child">
                <img src="cissp.jpg" alt="CISSP" class="icon-img">
              </div>
              <div class="cert-description flex-child">
                <h2 class="tile-title">CISSP</h2>
                <h3 class="tile-sub-title blue-text">ISC</h3>
                <h4 class="cert-date">12/28/2023</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="top-level-container">
      <h1 class="title blue-text">Volunteer Work</h1>

      <div class="volunteer-experience flex-container">
        <div class="flex-child volunteer-icon">
          <img src="microsoft.jpg" alt="TEALs" class="icon-img">
        </div>
        <div class="flex-child left-padding-30px">
          <h2 class="volunteer-org">Microsoft TEALs</h2>
          <h3 class="volunteer-title blue-text">Computer Science teaching assistant</h3>
          <h4 class="volunteer-dates">08/2022&nbsp;&ndash;&nbsp;present</h3>
        </div>
      </div>

    </div>

    <div class="top-level-container">
      <div class="personal-projects">
        <h1 class="title blue-text">Personal Projects</h1>

        <div class="github-project-container-flex">
          <h2 class="github-repo-name">cpprequest</h2>
          <p class="github-repo-description">Cross-platform HTTP request library</p>
          <a href="https://github.com/caidenceus/cpprequest" target="_blank" class="github-link">GitHub</a>
          <div class="technical-skills-container">
          <?php
              $skills = array(
                  'C++',
                  'Make',
                  'TCP/IP',
                  'HTTP',
                  'Socket Programming',
                  'Visual Studio'
              );

              foreach ($skills as $skill) {
                  echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
              }
          ?>
          </div>
        </div>

        <div class="extra-experience-container github-project">
          <h2 class="github-repo-name">dspy</h2>
          <p class="github-repo-description">Python data scructures with CI/CD pipeline</p>
          <a href="https://github.com/caidenceus/dspy" target="_blank" class="github-link">GitHub</a>
          <div class="technical-skills-container">
          <?php
              $skills = array(
                  'Python',
                  'Unittest',
                  'Pytest',
                  'Data Structures',
                  'GitHub Actions'
              );

              foreach ($skills as $skill) {
                  echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
              }
          ?>
          </div>
        </div>

        <div class="extra-experience-container github-project">
          <h2 class="github-repo-name">nimda</h2>
          <p class="github-repo-description">Source code for this website</p>
          <a href="https://github.com/caidenceus/nimda" target="_blank" class="github-link">GitHub</a>
          <div class="technical-skills-container">
          <?php
              $skills = array(
                  'PHP',
                  'HTML5',
                  'CSS3',
                  'JavaScript',
                  'MySQL',
                  'Docker',
                  'GitHub Actions'
              );

              foreach ($skills as $skill) {
                  echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
              }
          ?>
          </div>
        </div>
        
      </div>
    </div>

<?php include_once SHARED_PATH . 'page_footer.php'; ?>