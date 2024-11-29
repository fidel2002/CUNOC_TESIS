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