<?php include __DIR__.'/../views/header.php'; ?>
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

    <?php include __DIR__ . '/../views/scripts.php'; ?>

    <script id="message-template" type="template/html">
      <a href="{link}" class="list-group-item">
        <h4 class="list-group-item-heading">{title}</h4>
        <p class="list-group-item-text">{username}</p>
      </a>
    </script>

    <script>
      $(function () {
        var message_board = $('#message-board');

        $.getJSON('/api/messages.json.php', function (data)
        {
          $.each(data, function(idx, message)
          {
            var message_template = $('#message-template').html();

            message_template = message_template.replace('{title}', message['title']);
            message_template = message_template.replace('{username}', message['username']);
            message_template = message_template.replace('{link}', '/message.php?id=' + message['id']);

            message_board.append(message_template);
          });
        });
      });
    </script>
<?php include __DIR__ . '/../views/footer.php'; ?>
