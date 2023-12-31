<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa-solid fa-triangle-exclamation"></i> Supprimer Tâches
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Êtes-vous sûr de vouloir supprimer ce Tâches ?</h4>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="Task_id" name="id">
                    <div class="container pb-3 d-flex flex-row-reverse gap-2 bd-highlight">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" onclick="submitDeleteForm()" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
