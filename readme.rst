## Webcam Project - Capture and Save Multiple Images in MySQL using CodeIgniter

![Webcam Project Logo](project_logo.png)

The Webcam Project is a web application developed using the CodeIgniter framework, designed to enable users to capture multiple images through their webcams and securely store them in a MySQL database. This project provides a user-friendly interface for users to interact with their webcams and manage the captured images efficiently.

### Features

- Multiple Image Capture: Users can capture multiple images with ease by clicking a dedicated capture button. The project ensures real-time responsiveness, allowing users to capture moments quickly and effortlessly.

- CodeIgniter MVC Architecture: The project follows the Model-View-Controller (MVC) architectural pattern, ensuring clean code separation and maintainability.

- Secure Database Storage: CodeIgniter's powerful database libraries are utilized to securely store the captured images in a MySQL database. The application focuses on data integrity and implements image compression techniques to optimize storage.


###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Codeigniter Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

### Installation and Setup 

1. Clone the repository:

```
git clone https://github.com/MeghaRao15/WebCam_Mini_Project.git
```

2. Configure Database: Create a MySQL database and import the provided SQL file (`database.sql`) to set up the required table for storing images.

3. Update Configuration: Modify the `application/config/database.php` file with your database credentials.

4. Deploy: Upload the project files to your web server or use a local development environment (e.g., XAMPP, WAMP, etc.).

### Usage

1. Access the application through your web browser.

2. Click the "Allow" button to grant the application access to your webcam.

3. Use the capture button to capture multiple images.

4. The captured images will be automatically saved to the MySQL database.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
