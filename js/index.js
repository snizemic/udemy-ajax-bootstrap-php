const ajax = () => {
    let xhr = new XMLHttpRequest();
    const url = 'http://localhost/udemy-ajax-bootstrap-php/data.php';
    xhr.open('GET', url, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState = !4 || xhr.status != 200) {
            return;
        }
        document.getElementById('target').innerHTML = xhr.responseText;
    }
    xhr.send();
};

document.getElementById('test')
    .addEventListener('click', ajax);