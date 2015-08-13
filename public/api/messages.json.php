<?php

$db = require __DIR__ . '/../../src/db.php';

$sql = <<<EOF
    SELECT messages.id, messages.title, messages.content, users.username
    FROM messages
    JOIN users ON(messages.user_id = users.id)
EOF;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $sql = $sql . ' WHERE messages.id=:id LIMIT 1';

    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);

    $result = $statement->execute();
    $data = $result->fetchArray(SQLITE3_ASSOC);
} else {
    $results = $db->query($sql);
    $data = [];

    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
