<?php 
    require_once '../private/init.php';
    include_once PRIVATE_PATH . 'generatable.php';
    include_once SHARED_PATH . 'head.php';

    echo '<link rel="stylesheet" href="' . CSS_PATH . 'about_me.css">';

    // Title is set in page_header.php
    $title = "About Caiden Pyle";
    include_once SHARED_PATH . 'page_header.php';
    $terminal_text = 'git checkout about-me';
    include SHARED_PATH . 'terminal_text.php';
?>
    <div class="page-heading top-level-container">
      <div class="profile-picture">
        <img src="profile_picture.jpg" alt="Caiden">
      </div>
      <div class="current-info">
        <h1>Caiden Pyle - Vulnerability Analysis \ Quality Assurance.</h1>
      </div>
    </div>

    <?php 
        $terminal_text = 'sudo apt-get install -y kali-root-login';
        include SHARED_PATH . 'terminal_text.php';
    ?>

    <div class="top-level-container">
      <h1 class="title blue-text">Areas of Expertise</h1>
      <div class="expertise-container">
      <?php
          $areas = array(
              'Agile Software Development',
              'Scrum & Agile Methodologies',
              'Consuming REST APIs',
              'Software Development Lifecycle',
              'Web Application Design & Development',
              'Software Testing',
              'Socket Programming'
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
        <h2 class="job-title">Vulnerability Analysis / Quality Assurance</h2>
        <h3 class="company">NetApp E-Series</h3>
        <h4 class="work-dates">04/2020&nbsp;&ndash;&nbsp;present</h4>
        <div class="technical-skills-container">
        <?php
            $skills = array(
                'Python',
                'C++',
                'Scrum & Agile methodologies',
                'Debian Linux',
                'Git',
                'Pip',
                'Nessus',
                'REST APIs',
                'Jenkins',
                'Pytest',
                'Selenium',
                'Jira',
                'Confluence',
                'HTTP'
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
                'Scrum & Agile methodologies',
                'Debian Linux',
                'HTML5',
                'CSS3',
                'MySQL',
                'VMware',
                'Git',
                'Pip',
                'PowerShell',
                'REST APIs',
                'Pytest',
                'Jira',
                'Confluence',
                'HTTP'
            );

            foreach ($skills as $skill) {
                echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
            }
        ?>
        </div>
        <ul>
          <li class="job-task-bullet">Created Python library that 100% automated managing vCenter servers and virtual machines for testing new releases of software through consuming the vCenter REST API.</li>
          <li class="job-task-bullet">Created and maintained internal websites with PHP, HTML, MySQL, and CSS.</li>
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
              'Scrum & Agile methodologies',
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
              'Nessus',
              'REST APIs',
              'Make',
              'G++',
              'Jenkins',
              'Pytest',
              'Selenium',
              'Jira',
              'Confluence',
              'TCP/IP',
              'HTTP',
              'Windows Administration'
          );

          foreach ($skills as $skill) {
              echo '<div class="technical-skill-all"><p>' . $skill . '</p></div>';
          }
      ?>
      </div>
    </div>

    <div class="top-level-container extra-experience">
      <div class="volunteer-work">
        <h1 class="title blue-text">Volunteer Work</h1>

        <div class="extra-experience-container volunteer-container">
          <div class="volunteer-experience-flex">
            <h2 class="volunteer-org">Microsoft TEALs</h2>
            <h3 class="volunteer-title blue-text">Computer Science teaching assistant</h3>
            <h4 class="volunteer-dates">08/2022&nbsp;&ndash;&nbsp;present</h3>
          </div>
        </div>

      </div>

      <div class="personal-projects">
        <h1 class="title blue-text">Personal Projects</h1>

        <div class="extra-experience-container github-project">
          <div class="github-project-container-flex">
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
                    'Apache server II'
                );

                foreach ($skills as $skill) {
                    echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
                }
            ?>
            </div>
          </div>
        </div>
        
        <div class="extra-experience-container github-project">
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
        </div>
        
        <div class="extra-experience-container github-project">
          <div class="github-project-container-flex">
            <h2 class="github-repo-name">dspy</h2>
            <p class="github-repo-description">Well documented data structures</p>
            <a href="https://github.com/caidenceus/dspy" target="_blank" class="github-link">GitHub</a>
            <div class="technical-skills-container">
            <?php
                $skills = array(
                    'Python',
                    'PyCharm',
                    'Pytest',
                    'Data Structures'
                );

                foreach ($skills as $skill) {
                    echo '<div class="technical-skill blue-background"><p>' . $skill . '</p></div>';
                }
            ?>
            </div>
          </div>
        </div>
        
      </div>
    </div>

<?php include_once SHARED_PATH . 'page_footer.php'; ?>