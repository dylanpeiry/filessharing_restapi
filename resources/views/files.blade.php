@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border border-primary">
        <div class="card-header bg-primary text-white font-weight-bold">Fichiers publics</div>
        <div class="card-body myfiles">
            <table class="table table-sm">
                <div class="alert alert-primary" role="alert">Aucun fichier public trouvé.</div>
            </table>
        </div>
    </div>
    <br>
    <div class="card border border-warning">
        <div class="card-header bg-warning font-weight-bold">Fichiers partagés</div>
        <div class="card-body myfiles">
            <table class="table table-sm">

                <div class="alert alert-warning" role="alert">Aucun fichier partagé avec vous.</div>

            </table>
        </div>
    </div>
    <br>
    <div class="card border border-danger">
        <div class="card-header bg-danger text-white font-weight-bold">Parcourir mes fichiers
            <i class="fas fa-plus fa-lg float-right align-content-center" id="fileUpload" title="Ajouter un fichier"
               style="line-height: normal;"></i>
        </div>
        <div class="card-body myfiles mf-private">
            <table class="table table-sm">

                <div class="alert alert-danger" role="alert">Vous n'avez pas de fichiers.</div>

            </table>
        </div>
    </div>
</div>
<!-- Popup partage d'un fichier -->
<div class="modal fade" id="modalFileShare" tabindex="-1" role="dialog" aria-labelledby="fileNameLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form enctype="multipart/form-data" method="post" action="process.php?e=share">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileNameLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="users" class="col-form-label">Partager le fichier :</label>
                    <div class="form-group shareselect">
                    </div>
                    <label for="toggleStatus">Statut :</label>
                    <div class="toggleStatus">
                        <div class="btn-group btn-group-toggle status-toggle" data-toggle="buttons">
                            <label class="btn btn-danger active">
                                <input type="radio" name="status" id="private" autocomplete="off" value="0"> Privé
                            </label>
                            <label class="btn btn-warning">
                                <input type="radio" name="status" id="shared" autocomplete="off" value="1"> Partagé
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="status" id="public" autocomplete="off" value="2"> Public
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="idFile" name="idFile">
                    <input type="hidden" value="" id="usersToAdd" name="usersToAdd">
                    <input type="hidden" value="" id="usersToDelete" name="usersToDelete">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" id="share">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
