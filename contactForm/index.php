<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <main>
      <p>SEND E-MAIL</p>
      <form class="contact-form" action="contactForm.php" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="mail" placeholder="Your e-mail">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit" name="submit">Send e-mail</button>
      </form>
    </main>
  </body>
</html>
