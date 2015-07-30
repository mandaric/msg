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
          <h3>MessageBoard</h3>
          <hr>

          <div class="list-group" id="message-board">
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script id="message-template" type="template/html">
      <a href="{link}" class="list-group-item">
        <h4 class="list-group-item-heading">{title}</h4>
        <p class="list-group-item-text">{author}</p>
      </a>
    </script>

    <script>
      $(function () {
        var message_board = $('#message-board');

        $.getJSON('/messages.json.php', function (data)
        {
          $.each(data, function(idx, message)
          {
            var message_template = $('#message-template').html();

            message_template = message_template.replace('{title}', message['TITLE']);
            message_template = message_template.replace('{author}', message['AUTHOR']);
            message_template = message_template.replace('{link}', '/message.php?id=' + message['ID']);

            message_board.append(message_template);
          });
        });
      });
    </script>
  </body>
</html>
