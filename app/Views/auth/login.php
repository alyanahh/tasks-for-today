<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>
    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">

        <label for="username">Username:</label>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= old('username') ?>"
            required
        >

        <br><br>

        <label for="password">Password:</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <br><br>

        <button type="submit">Login</button>

    </form>

</body>
</html>