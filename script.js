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