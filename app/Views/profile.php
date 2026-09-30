<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Profile</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

<nav class="navbar">
    <a href="/" class="logo">TASKS FOR TODAY</a>

    <div class="nav-links">
        <a href="<?= site_url('/') ?>">Today</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
    </div>
</nav>

<main class="container">

    <div class="page-header">
        <h1>User Profile</h1>
        <p>Demo user information.</p>
    </div>

    <div class="card">

        <h2><?= esc($user['full_name']) ?></h2>

        <br>

        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>

        <br>

        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>

        <br>

        <p><strong>Account Created:</strong> <?= esc($user['created_at']) ?></p>

    </div>

</main>

<footer class="footer">
    Tasks for Today Management System | IT0049
</footer>

</body>
</html>