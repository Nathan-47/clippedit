# Clippedit
This project was created using xampp to host a local server that allows users to sign up to create an account and then sign in using their details. The main focus of this project was to create a login system that works and alerts or backs users out when input fields are wrongly filled in.
<br />

## Localhost Requirement
- [xampp](https://www.apachefriends.org/index.html)


## Setup
### PROJECT INSTALLATION
 *A local host server preferably xampp must be installed for project to be initiated.
 
 1. **Download** the project zip folder. `Code -> download zip`
 2. When file is downloaded, open the recently downloaded folder and extract the files within it.
 3. Place the extracted files into xampp folder which should lead to a directory folder called **htdocs**.
 
  `documents -> xampp -> htdocs`
  
 4. Open index.html and project will boot up. View in browser at `https://localhost:8080`
 
<br />

### What I learnt
- As I am still in the process of understanding forms within PHP, I came across something new which was using the function of filter_validate_email(FVE). It is imperative that FVE is used as it checks if the email that the user has entered is valid. For the function to act this out I had to use (!filter_var($email, FILTER_VALIDATE_EMAIL)). The $email is equal to the form parameter ‘mail’ as this is the input field that the user will type their email address and thus the field can be read by the function to see if the email is not valid. 

- Understand that the (?) placeholders are used when using a sql statement that runs within the database to prevent code being written into the username input.

- I wanted to get a grasp of how passwords are matched with a user. Throughout the project i researched that a boolean that contains a $password string links back to the form password input field and the collection of arrays found within the pwdUsers row within the database to are then matched together to see if they are both equal to each other. 

### Skills showcased
- In this project I have showcased the ability to create a login system that alerts users with an error message when incorrect inputs have been made, empty input fields and sql related issues.
