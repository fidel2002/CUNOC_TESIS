function prepareDeleteStudentModal(idStudent) {
    const idDisplay = document.getElementById('idDeletingDisplay');
    const inputId = document.getElementById('idDeleting');

    idDisplay.innerHTML = idStudent;
    inputId.value = idStudent;

    const myModal = new bootstrap.Modal(document.getElementById('deleteStudentModal'));
    myModal.show();
}

function prepareModifyStudentModal(idStudent){
    const idDisplay = document.getElementById('idModifyDisplay');
    const inputId = document.getElementById('idModify');

    idDisplay.innerHTML = idStudent;
    inputId.value = idStudent;

    const myModal = new bootstrap.Modal(document.getElementById('modifyStudentModal'));
    myModal.show();
}

function showMoreAboutStudent(idStudent) {
    var url = './controller/get_student.php?id=' + idStudent;
    fetch(url)
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    alert(errorData.error)
                    throw new Error(errorData.error);
                });
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('idStudentView').textContent = data.id || 'N/A';
            document.getElementById('firstNameView').textContent = data.firstName || 'N/A';
            document.getElementById('secondNameView').textContent = data.secondName || 'N/A';
            document.getElementById('lastNameView').textContent = data.lastName || 'N/A';
            document.getElementById('secondLastNameView').textContent = data.secondLastName || 'N/A';
            document.getElementById('addressView').textContent = data.address || 'N/A';
            document.getElementById('phoneView').textContent = data.phone || 'N/A';
            document.getElementById('emailView').textContent = data.email || 'N/A';

            const myModal = new bootstrap.Modal(document.getElementById('showStudentModal'));
            myModal.show();
        })
        .catch(error => {
            //console.log(error);
        });
}