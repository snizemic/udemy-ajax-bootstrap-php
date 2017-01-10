const ajax = (req) => {
    let xhr = new XMLHttpRequest();
    let url = 'http://localhost/udemy-ajax-bootstrap-php/data.php';

    let name = document.getElementById('name').value;
    let fee = document.getElementById('fee').value;
    let subject = document.getElementById('subject').value;

    url += `?req=${req}&name=${name}&fee=${fee}&subject=${subject}`;

    xhr.open('GET', url, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState = !4 || xhr.status != 200) {
            return;
        }
        document.getElementById('target').innerHTML = xhr.responseText;
        document.getElementById('name').value = '';
        document.getElementById('fee').value = '';
        document.getElementById('subject').value = '';
    }
    xhr.send();
};

document.getElementById('add')
    .addEventListener('click', (event) => {
        event.preventDefault();
        ajax('add');
        event.target.blur();
    })

window.onload = ajax('load');