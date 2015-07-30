<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MessageBoard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Message</h3>
          <hr>

          <h1 id="message-title"></h1>
          <p id="message-content"></p>

        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      $(function () {
        $.getJSON('/messages.json.php?id=<?php echo $_GET['id']; ?>', function (data)
        {
            $('#message-title').html(data['TITLE']);
            $('#message-content').html(data['CONTENT']);
        });
      });
    </script>
  </body>
</html>
