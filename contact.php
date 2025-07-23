<form   action = "contact.php"  method = "post">
  <div  class = "elem-group">
    <label  for = "name">Name</label>
    <input  type = "text"   id = "name" name = "visitor_name"   placeholder = "Florin Mircea"   pattern = [A-Zsa-z]{3,20}   required>
  </div>
  <div class="elem-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="visitor_email" placeholder = "florin.mircea1974@gmail.com" required>
  </div>  
  <div class="elem-group">
    <label for="title">Reason For Contacting Us</label>
    <input type="text" id="title" name="email_title" required placeholder="" pattern=[A-Za-z0-9s]{8,60}>
  </div>
  <div class="elem-group">
    <label for="message">Write the message</label>
    <textarea id="message" name="visitor_message" placeholder="Say whatever you want." required></textarea>
  </div>
  <button type="submit">Send Message</button>
</form>


<?php

    print   "Contact";
    add_form_7( $atts );   //shortcode
?>

<?php
    
?>