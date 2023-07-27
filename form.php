<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'process_form.php';
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $elaboration=$_POST['elaboration'];

  $sql="insert into `customer_enquiries`(first_name, last_name, email, subject, elaboration)
  values('$first_name', '$last_name', '$email', '$subject', '$elaboration')";
  $result=mysqli_query($conn,$sql);

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="fonts.css" />
    <title>Form</title>
    <script>
      function validateForm() {
        var firstName = document.forms["myForm"]["first_name"].value;
        var lastName = document.forms["myForm"]["last_name"].value;
        var email = document.forms["myForm"]["email"].value;
        var subject = document.forms["myForm"]["subject"].value;
        var elaboration = document.forms["myForm"]["elaboration"].value;

        if (
          firstName === "" ||
          lastName === "" ||
          email === "" ||
          subject === "" ||
          elaboration === ""
        ) {
          alert("All fields are required");
          return false;
        }
      }
    </script>
  </head>
  <body>
    <form
      name="myForm"
      onsubmit="return validateForm()"
      method="post"
      action="form.php"
    >
      <ul class="form-style-1">
        <li>
          <label>Full Name <span class="required">*</span></label
          ><input
            type="text"
            name="first_name"
            class="field-divided"
            placeholder="First Name"
          />
          <input
            type="text"
            name="last_name"
            class="field-divided"
            placeholder="Last Name"
          />
        </li>
        <li>
          <label>Email <span class="required">*</span></label>
          <input type="email" name="email" class="field-long" />
        </li>
        <li>
          <label>Subject</label>
          <select name="subject" class="field-select">
            <option value="password">Change Online password</option>
            <option value="online-banking">
              Request Online Banking Credentials
            </option>
            <option value="ATM-card">ATM card request</option>
          </select>
        </li>
        <li>
          <label>Elaborate <span class="required">*</span></label>
          <textarea
            name="elaboration"
            id="field5"
            class="field-long field-textarea"
          ></textarea>
        </li>
        <li>
          <input type="submit" value="Submit" />
        </li>
      </ul>
    </form>
  </body>
</html>
