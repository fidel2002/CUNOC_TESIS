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
                     <!-- id -->
                     <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="idAdd" name="idAdd"
                            placeholder="2022xxxx" required>
                        <label for="idAdd">Carne</label>
                    </div>

                    <!-- First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstNameAdd" name="firstNameAdd"
                            placeholder="Juan" required>
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
                        <input type="text" class="form-control" id="lastNameAdd" name="lastNameAdd" 
                        placeholder="Pérez" required>
                        <label for="lastNameAdd">Last Name</label>
                    </div>

                    <!-- Second Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="secondLastNameAdd" name="secondLastNameAdd"
                            placeholder="González" required>
                        <label for="secondLastNameAdd">Second Last Name</label>
                    </div>

                    <!-- Phone -->
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phoneAdd" name="phoneAdd" 
                            placeholder="123-456-7890" required>
                        <label for="phoneAdd">Phone</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="emailAdd" name="emailAdd"
                            placeholder="nombre@ejemplo.com" required>
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

<!--View student modal-->
<div class="modal fade" id="showStudentModal" tabindex="-1" aria-labelledby="showStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showStudentModalLabel">Datos del Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><span class="fw-bold">Id:</span> <span id="idStudentView"></span></li>
                    <li><span class="fw-bold">Primer nombre:</span> <span id="firstNameView"></span></li>
                    <li><span class="fw-bold">Segundo nombre:</span> <span id="secondNameView"></span></li>
                    <li><span class="fw-bold">Primer apellido:</span> <span id="lastNameView"></span></li>
                    <li><span class="fw-bold">Segundo apellido:</span> <span id="secondLastNameView"></span></li>
                    <li><span class="fw-bold">Teléfono:</span> <span id="phoneView"></span></li>
                    <li><span class="fw-bold">Correo electrónico:</span> <span id="emailView"></span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
