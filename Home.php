<?php
include 'SystemInfo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localhost Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="localhost/style.css">
</head>

<body>

    <header>
        <div class="container">
            <h1><i class="fas fa-tachometer-alt"></i>Localhost Dashboard</h1>
        </div>
    </header>

    <div class="container">
        <!-- System Info -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-info-circle"></i> System Information
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">PHP Version</span>
                        <span class="info-value"><?php echo phpversion(); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">MySQL Version</span>
                        <span class="info-value"><?php echo mysqlVersion(); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">MySQL Status</span>
                        <span class="info-value" id="mysql-status"><img src="localhost/loading.gif" alt="My Icon" height="15"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Xdebug</span>
                        <span class="info-value" id="xdebug"><?php echo xdebugVersion(); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Composer</span>
                        <span class="info-value" id="composer"><?php echo composerVersion(); ?></span>
                    </div>
                </div>
                <div style="margin-top: 15px;">
                    <a href="localhost/phpinfo.php" class="btn" target="_blank">
                        <i class="fas fa-list-alt"></i> View PHP Info
                    </a>
                </div>
            </div>
        </div>

        <!-- Copy phpMyAdmin -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-database"></i> Copy phpMyAdmin to New Folder
            </div>
            <div class="card-body">
                <form method="">
                    <div class="form-row">
                        <div class="form-group" style="flex: 1;">
                            <label for="newname">New Folder Name:</label>
                            <input type="text" id="newname" name="newname" class="form-control" placeholder="Enter folder name" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="user">MySQL User:</label>
                            <input type="text" id="user" name="user" class="form-control" placeholder="root">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="pass">MySQL Password:</label>
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex: 1;">
                            <label for="host">MySQL Host:</label>
                            <input type="text" id="host" name="host" class="form-control" placeholder="localhost">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="dbname">Database Name (optional):</label>
                            <input type="text" id="dbname" name="dbname" class="form-control" placeholder="Database name">
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-copy"></i> Copy Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Project Folders -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder"></i> Available Projects/Folders
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Folder Name</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <a href="/" target="_blank">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                            </td>
                            <td>
                                <div class="actions">
                                    <button class="btn btn-warning btn-sm rename-btn" data-folder="">
                                        <i class="fas fa-edit"></i> Rename
                                    </button>
                                    <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this folder?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="folder" value="">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="localhost/script.js"></script>
</body>

</html>