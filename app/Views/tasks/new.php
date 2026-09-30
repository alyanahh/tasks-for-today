<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task - Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>
    <h2>New Task</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('tasks/create') ?>" method="post">

        <div>
            <label for="title">Title:</label>
            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
            >
        </div>

        <br>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Pending"
                    <?= old('status') == 'Pending' ? 'selected' : '' ?>>
                    Pending
                </option>

                <option value="Completed"
                    <?= old('status') == 'Completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </div>

        <br>

        <div>
            <label for="task_date">Task Date:</label>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
            >
        </div>

        <br>

        <button type="submit">Create Task</button>

        <a href="<?= site_url('tasks') ?>">Cancel</a>

    </form>

</body>
</html>