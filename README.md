# Clippedit
This project is a site built with a working login system that will allow users to sign up and their data be recorded into the database. 

<br />

## Table of Contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Status](#status)
* [Inspiration](#inspiration)


## General info
### What is the project about and why was it made?
The concept of this site is users can upload clips that they have recorded via their game consoles, which they can enter into a category such as action, thriller etc and then for said clip to be voted by the Clippedit community to potentially win IRL console currency such as Microsoft Points, PS Store wallet cards etc. I made this site to show that I can create a site that has user interactivity and the ability to use localhost databases to implement a login system (PHP).

### What did I learn making this project?
Creating this project, I learnt a lot within the PHP world and looking forward to learning more to increase my skills within the web development scene.
<br />

- Preg_match and filter validate email processes -<br />
As I am still in the process of understanding forms within PHP, I came across something new which was using the function of filter_validate_email(FVE). It is imperative that FVE is used as it checks if the email that the user has entered is valid. For the function to act this out I had to use (!filter_var($email, FILTER_VALIDATE_EMAIL)). The $email is equal to the form parameter ‘mail’ as this is the input field that the user will type their email address and thus the field can be read by the function to see if the email is not valid. 

- How to implement an error message and how to tell the database that fields on the form are empty -<br /> 
Of course, when users are completing a form most of the time the user will either type the wrong username, email or password or completely forget about completing a field within the form. Therefore, an error message is essential so that it can inform users on what area of the form hasn’t been filled in. The user is given the error message via the URL tab with the source of the problem that led to the error to help the user understand what the issue is. 

 An example of the code;
 
 header("location: ../signup.php?error=invaliduid&mail=".$email);

<br />

- Password match checks and creation of sessions -<br />
As users will have different passwords there will need to be a function that will be able to check if the password a user has typed in matches exactly to the password in the database. To do this the function used was

 $pwdCheck = password_verify($password, $row['pwdUsers']);
 
The password check is a bool that contains the $password string that links back to the form password input field and the collection of arrays found within the pwdUsers row within the database to match them together to see if they both equal each other. 

if ($pwdCheck == false)<br /> 
Once checked the user will need to be directed to another page if the password check is false or true. If false, the user will have an error message and taken to the form with a resubmission option.  


else if ($pwdCheck == true) {<br />
session_start();<br />
$_SESSION['userId'] = $row['idUsers'];<br />
$_SESSION['userUid'] = $row['uidUsers'];<br />
header("location:../userpage.php?login=success");<br />

If true, then the user will be taken to website logged in on their account with the message login success. Then once user has logged in a session will be created to save information that the user has opted for. Found in the logout file it will have a session end script that will run once the user logouts the site.  

- ? is used as placeholders for security reasons -<br /> 
I learnt that the (?) placeholders are used when using a sql statement that runs within the database to prevent code being written into the username input, which would lead to said code destroying the database.


<br />

## Technologies
### What technologies are used in this project?
Project created with:
* 
* 
* 
* 
* 
* 

### What skills have I showcased in this project?


<br />

## Setup
### Use of local server or libraries in project?


### Instructions on how to access and open the doc for localhost?
Below is a guide that shows how to open the project.
*	
*	
*	
*	
* 

### Instructions when on site
*	
*	


<br />

## Status
### Is the project finished, does it need time to finish, what is the current progress?
The project has started and is currently in the planning stage.

<br />

## Inspiration
### What inspired you to create a certain design or structure of the site?
When looking around for inspiration on how to design the site I took notice of many designs that caters towards factors such as the target audience, language and tone of voice. Listed below are sites that would aid the design idea for the project.

Plink – https://useplink.com/en/ 

•	I like the whole design and layout of this site as it is easy to understand and has minimal writing so the user can read and move onto the next thing right after with no time wasted. BIG and BOLD characters are used for subheadings for information that must be read and with the BOLD characters users will be drawn to reading that first than anything else on the page. What I would like to implement into this project from plink, is the use of colour and interaction for the different sections of the site as it makes the site pop out and unique to other sites and instantly creates an attraction to the user.

IKEA - https://www.ikea.com/gb/en/

•	Ikea has great spacing allowing the user to look around the site without feeling clustered with too much information. The main element that makes IKEA a good inspiration is the icons and font that they use. The font that IKEA use comes across as family friendly and clear whilst the icons also feel family friendly and give IKEA online users a feel of home and comfort when using the site.

Fortnite - https://www.epicgames.com/fortnite/en-US/home

•	 As fortnite caters their content towards younger audiences I noticed that they know what will attract them by using simple and clear tones with big and bold quotes and bright colours. What also emphasises and makes the site jump out towards the user is the fortnite characters that help entice the user to explore through the site more and the use of images and box elements being expanded whilst being overlapped to create a pop-up book feel.

