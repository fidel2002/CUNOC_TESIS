<!--Create students-->
<section>
    <div class="modal fade" id="createStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createStudentModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createStudentModalLabel">Agregar nuevo registro de estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstNameAdd" name="firstNameAdd"
                            placeholder="Juan">
                        <label for="firstNameAdd">First Name</label>
                    </div>

                    <!-- Second Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="secondNameAdd" name="secondNameAdd"
                            placeholder="Carlos">
                        <label for="secondNameAdd">Second Name</label>
                    </div>

                    <!-- Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastNameAdd" name="lastNameAdd" placeholder="Pérez">
                        <label for="lastNameAdd">Last Name</label>
                    </div>

                    <!-- Second Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="secondLastNameAdd" name="secondLastNameAdd"
                            placeholder="González">
                        <label for="secondLastNameAdd">Second Last Name</label>
                    </div>

                    <!-- Phone -->
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phoneAdd" name="phoneAdd" placeholder="123-456-7890">
                        <label for="phoneAdd">Phone</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="emailAdd" name="emailAdd"
                            placeholder="nombre@ejemplo.com">
                        <label for="emailAdd">Email Address</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" name="createStudentBtn" value="ok"
                        id="createStudentBtn">
                        Agregar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section> 

<!--delete students-->
<section>
    <div class="modal fade" id="deleteStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteStudentModalLabel">Eliminar estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="idDeleting" id="idDeleting">
                    ¿Eliminar al estudiante con codigo <span id="idDeletingDisplay"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger" name="deleteStudentBtn" value="ok"
                        id="deleteStudentBtn">
                        Eliminar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section> 