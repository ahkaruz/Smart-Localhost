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
                    <a href="localhost/phpinfo.php" class="btn btn-phpinfo" target="_blank">
                        <i class="fas fa-list-alt"></i> View PHP Info
                    </a>
                </div>
            </div>
        </div>

        <!-- Copy phpMyAdmin -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-database"></i><span class="title">Copy phpMyAdmin to New Folder</span>

            </div>
            <div class="card-body">
                <form method="">
                    <div class="check-box">
                        <div class="phpmyadmin-type">
                            <div class="form-checkbox">
                                <input type="checkbox" id="config" name="option" checked>
                                <label for=config>Config</label>
                            </div>
                            <div class="form-checkbox">
                                <input type="checkbox" id="cookie" name="option">
                                <label for=cookie>Cookie</label>
                            </div>
                        </div>
                        <div class="form-checkbox">
                            <input type="checkbox" id="create-db" name="option"> 
                            <label for=create-db>Create Database</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="flex: 1;">
                            <label for="newname" class="label-newname" id="label-newname">New Folder Name</label>
                            <input type="text" id="input-newname" name="newname" class="form-control" placeholder="Enter folder name" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="host" id="label-host">MySQL Host (Default localhost)</label>
                            <input type="text" id="input-host" name="host" class="form-control" placeholder="Enter host address / Ip">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="database-name" id="label-dbname">Database Name (optional)</label>
                            <input type="text" id="input-dbname" name="dbname" class="form-control" placeholder="Enter your database">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="flex: 1;">
                            <label for="user" id="label-user" class="label-user">MySQL User</label>
                            <input type="text" id="input-user" name="user" class="form-control" placeholder="Enter user name" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="password" id="label-password" class="label-password">MySQL Password</label>
                            <input type="password" id="input-password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">

                            <button type="submit" class="btn btn-success ">
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
                <i class="fas fa-folder"></i><span class="title">Available Projects/Folders</span>
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