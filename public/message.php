<?php include __DIR__ . '/../views/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Message</h3>
            <hr>

            <h1 id="message-title"></h1>
            <small>Written by: <span id="user-username"></span></small>
            <hr>
            <p id="message-content"></p>

        </div>
    </div>
</div>

<?php include __DIR__ . '/../views/scripts.php'; ?>

<script>
    $(function () {
        $.getJSON('/api/messages.json.php?id=<?php echo $_GET['id']; ?>', function (data) {
            $('#user-username').html(data['username']);
            $('#message-title').html(data['title']);
            $('#message-content').html(data['content']);
        });
    });
</script>
<?php include __DIR__ . '/../views/footer.php'; ?>
