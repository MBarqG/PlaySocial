function showForm(option) {
    if (option === 'option1') {
        document.getElementById('option1-form').style.display = 'block';
        document.getElementById('option2-form').style.display = 'none';
        document.getElementById('btn-1').classList.add("btn-danger");
        document.getElementById('btn-1').classList.remove("btn-outline-danger");
        document.getElementById('btn-2').classList.remove("btn-danger");
        document.getElementById('btn-2').classList.add("btn-outline-danger");
    } else if (option === 'option2') {
        document.getElementById('option1-form').style.display = 'none';
        document.getElementById('option2-form').style.display = 'block';
        document.getElementById('btn-2').classList.add("btn-danger");
        document.getElementById('btn-2').classList.remove("btn-outline-danger");
        document.getElementById('btn-1').classList.remove("btn-danger");
        document.getElementById('btn-1').classList.add("btn-outline-danger");
    }
}