const ajax = (req, id) => {
    let xhr = new XMLHttpRequest();
    let url = 'http://localhost/udemy-ajax-bootstrap-php/data.php';

    let name = document.getElementById('name').value;
    let fee = document.getElementById('fee').value;
    let subject = document.getElementById('subject').value;

    switch (req) {
        case undefined:
            break;
        case 'add':
            url += `?req=${req}&name=${name}&fee=${fee}&subject=${subject}`;
            break;
        case 'del':
            url += `?req=${req}&id=${id}`;
            break;
    }

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

const edit_ajax = (req, id) => {
    let xhr = new XMLHttpRequest();
    let url = 'http://localhost/udemy-ajax-bootstrap-php/edit.php';

    switch (req) {
        case 'upd':
            url += `?id=${id}&req=${req}`;
            break;
        case 'upd_btn':
            let name = document.getElementById('name').value;
            let fee = document.getElementById('fee').value;
            let subject = document.getElementById('subject').value;
            url += `?id=${id}&req=${req}&name=${name}&fee=${fee}&subject=${subject}`;
            break;
    }

    xhr.open('GET', url, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState = !4 || xhr.status != 200) {
            return;
        }
        if (req == 'upd_btn') {
            window.location.reload();            
        }
        document.getElementById('form-data').innerHTML = xhr.responseText;
    }
    xhr.send();

}

document.getElementById('add')
    .addEventListener('click', (event) => {
        event.preventDefault();
        ajax('add');
        event.target.blur();
    })

window.onload = ajax();