<!--Modify students modal-->
<section>
    <div class="modal fade" id="modifyStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modifyStudentModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modifyStudentModalLabel">Modificar estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!--id-->
                    <input type="hidden" name="idModify" id="idModify" value="-1">
                    <p class="fw-bold">Id: <span id="idModifyDisplay"></span></p>

                    <!-- First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstNameM" name="firstNameM"
                            placeholder="Juan">
                        <label for="firstNameM">First Name</label>
                    </div>

                    <!-- Second Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="secondNameM" name="secondNameM"
                            placeholder="Carlos">
                        <label for="secondNameM">Second Name</label>
                    </div>

                    <!-- Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastNameM" name="lastNameM" placeholder="Pérez">
                        <label for="lastNameM">Last Name</label>
                    </div>

                    <!-- Second Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="secondLastNameM" name="secondLastNameM"
                            placeholder="González">
                        <label for="secondLastNameM">Second Last Name</label>
                    </div>

                    <!-- Phone -->
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phoneM" name="phoneM" placeholder="123-456-7890">
                        <label for="phoneM">Phone</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="emailM" name="emailM"
                            placeholder="nombre@ejemplo.com">
                        <label for="emailM">Email Address</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" name="modifyStudentBtn" value="ok"
                        id="modifyStudentBtn">
                        Modificar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>