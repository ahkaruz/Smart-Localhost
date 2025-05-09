//MySql Status check
function fetchMySQLStatus() {
    fetch('localhost/SystemInfo.php?ajax=mysql_status')
        .then(response => response.json())
        .then(data => {
            const status = document.getElementById('mysql-status');
            status.textContent = data.status;
            if (status.textContent === 'Error' || status.textContent === 'Not connected.') {
                status.style.color = 'red';
            }
            else {
                status.style.color = 'green';
            }

        })
        .catch(() => {
            document.getElementById('mysql-status').textContent = 'Error';
        });
}
document.addEventListener('DOMContentLoaded', () => {
    fetchMySQLStatus();
    handleInputs();
});

//Xdebug
const xdebStatus = document.getElementById('xdebug');
if (xdebStatus.textContent == 'Not installed.') {
    xdebStatus.style.color = 'red';
}

//Composer
const compStatus = document.getElementById('composer');
if (compStatus.innerText == 'Not installed.') {
    compStatus.style.color = 'red';
}

//checkbox and inputs
function handleInputs() {
    const config = document.getElementById('config');
    const cookie = document.getElementById('cookie');
    const createDb = document.getElementById('create-db');
    const inputDbName = document.getElementById('input-dbname')
    const inputUser = document.getElementById('input-user');
    const inputPassword = document.getElementById('input-password');
    const labelDbName = document.getElementById('label-dbname')
    const labelUser = document.getElementById('label-user');
    const labelPassword = document.getElementById('label-password');


    config.addEventListener('change', function () {
        if (this.checked) {
            cookie.checked = false;
            createDb.disabled = false;
            inputUser.disabled = false;
            inputPassword.disabled = false;
            inputUser.required = true;
            inputPassword.required = true;
            labelUser.classList.add('label-user');
            labelPassword.classList.add('label-password');
        }
        else if (!cookie.checked) {
            this.checked = true;
        }
    })

    cookie.addEventListener('change', function () {
        if (this.checked) {
            config.checked = false;
            createDb.disabled = true;
            createDb.checked = false;
            inputUser.disabled = true;
            inputPassword.disabled = true;
            labelUser.classList.remove('label-user');
            labelPassword.classList.remove('label-password');
            inputDbName.required = false;
            labelDbName.classList.remove('label-dbname');
        }
        else if (!cookie.checked) {
            this.checked = true;
        }
    })
    createDb.addEventListener('change', function () {
        if (this.checked) {
            inputDbName.required = true;
            labelDbName.classList.add('label-dbname');
        }
        else if (!this.checked) {
            inputDbName.required = false;
            labelDbName.classList.remove('label-dbname');
        }
    })
}












var modal = document.getElementById('renameModal');
var renameButtons = document.querySelectorAll('.rename-btn');
var closeBtn = document.querySelector('.close');
var oldFolderInput = document.getElementById('oldFolderName');
var newFolderInput = document.getElementById('newFolderName');

renameButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
        var folderName = this.dataset.folder;
        oldFolderInput.value = folderName;
        newFolderInput.value = folderName;
        modal.style.display = 'block';
    });
});

closeBtn.addEventListener('click', function () {
    modal.style.display = 'none';
});

window.addEventListener('click', function (event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});