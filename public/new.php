<?php include __DIR__ . '/../views/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

        <?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>

          <?php if (empty($_POST['title'])) : ?>
            <p>Message <strong>Title</strong> cannot be empty, please go back and try again</p>
          <?php exit; ?>
          <?php endif; ?>

          <?php
            $db = require __DIR__ . '/../src/db.php';

            $sql = "INSERT INTO messages (title, content, user_id) VALUES(:title, :content, :user_id);";

            $statement = $db->prepare($sql);
            $statement->bindValue(':title', $_POST['title'], SQLITE3_TEXT);
            $statement->bindValue(':content', $_POST['content'], SQLITE3_TEXT);
            $statement->bindValue(':user_id', 1, SQLITE3_INTEGER);

            $statement->execute();

            header('Location: /');
            exit;
          ?>

        <?php else : ?>
          <h3>New message </h3>
          <hr>
          <form method="post" action="/new.php" id="message_form">
            <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control" type="text" name="title" id="title">
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea rows="10" class="form-control"name="content" id="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        <?php endif; ?>

    </div>
  </div>
</div>

<?php include __DIR__ . '/../views/scripts.php'; ?>

<script>
  $(function() {
    var message_form = $('#message_form');
    var message_title = $('#title');
    var error_msg = 'Message Title cannot be empty, please try again';

    message_form.on('submit', function(event) {
      if(message_title.val() == '') {
        event.preventDefault();

        alert(error_msg);
      }
    });
  });
</script>

<?php require __DIR__ . '/../views/footer.php' ?>
