<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>All Tasks</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

<nav class="navbar">
    <a href="/" class="logo">TASKS FOR TODAY</a>

    <div class="nav-links">
        <a href="/">Today</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </div>
</nav>

<main class="container">

    <div class="page-header">
        <h1>All Tasks</h1>
        <p>Complete list of tasks stored in the database.</p>
    </div>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($tasks as $task): ?>

                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>

                    <td>
                        <span class="badge">
                            <?= esc(ucfirst($task['status'])) ?>
                        </span>
                    </td>

                    <td><?= esc($task['task_date']) ?></td>
                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</main>

<footer class="footer">
    Tasks for Today Management System | IT0049
</footer>

</body>
</html>