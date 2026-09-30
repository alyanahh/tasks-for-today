<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>All Tasks</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

<nav class="navbar">
    <a href="<?= site_url('/') ?>" class="logo">TASKS FOR TODAY</a>

    <div class="nav-links">
        <a href="<?= site_url('/') ?>">Today</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>

        <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= site_url('logout') ?>">Logout</a>
        <?php else: ?>
        <a href="<?= site_url('login') ?>">Login</a>
        <?php endif; ?>
    </div>
</nav>

<main class="container">

    <div class="page-header">
        <h1>All Tasks</h1>
        <p>Complete list of tasks stored in the database.</p>

        <a href="<?= site_url('tasks/new') ?>" class="btn">
            + New Task
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($tasks)): ?>

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

                        <td>

                            <a
                                href="<?= site_url('tasks/edit/' . $task['id']) ?>"
                                class="btn"
                            >
                                Edit
                            </a>

                            <form
                                action="<?= site_url('tasks/delete/' . $task['id']) ?>"
                                method="post"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to archive this task?');"
                            >
                                <button type="submit" class="btn">
                                    Archive
                                </button>
                            </form>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5">No active tasks found.</td>
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