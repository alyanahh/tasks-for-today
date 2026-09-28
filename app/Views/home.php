<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tasks for Today</title>

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

    <section class="hero">
        <h1>Tasks for Today</h1>
        <p><?= esc($today) ?></p>
    </section>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($tasks)): ?>

                <?php foreach ($tasks as $task): ?>

                    <tr>
                        <td><?= esc($task['title']) ?></td>

                        <td>
                            <span class="badge">
                                <?= esc(ucfirst($task['status'])) ?>
                            </span>
                        </td>

                        <td><?= esc($task['task_date']) ?></td>
                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="3">No tasks scheduled for today.</td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

<footer class="footer">
    Tasks for Today Management System | IT0049
</footer>

</body>
</html>