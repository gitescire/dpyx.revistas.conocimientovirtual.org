<div class="d-inline">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger  shadow-sm" data-toggle="modal"
        data-target="#deleteUser{{$user->id}}" data-toggle="tooltip" title="Eliminar usuario">
        <i class="fas fa-trash"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" 
         aria-labelledby="deleteUserModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg">
                <!-- Header con gradiente -->
                <div class="modal-header bg-gradient-danger text-white border-0">
                    <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 rounded p-2 me-3">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                        <div>
                            <h5 class="modal-title mb-0" id="deleteUserModalLabel{{$user->id}}">
                                Confirmar eliminación
                            </h5>
                            <small class="text-white-50">Esta acción no se puede deshacer</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Cerrar">
                    </button>
                </div>

                <form action="{{route('users.destroy',[$user])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body p-4">
                        <!-- Información del usuario -->
                        <div class="text-center mb-4">
                            <h6 class="mb-1 text-dark">{{$user->name}}</h6>
                            <p class="text-muted small mb-0">{{$user->email ?? 'Usuario del sistema'}}</p>
                        </div>

                        <!-- Advertencias y consecuencias -->
                        @if ($repositories->count() || $evaluations->count())
                        <div class="alert alert-warning border-0 shadow-sm mb-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-exclamation-circle text-warning"></i>
                                </div>
                                <div class="flex-fill">
                                    <h6 class="alert-heading mb-2">Atención: Datos relacionados</h6>
                                    <p class="mb-0 small">La eliminación de este usuario afectará los siguientes elementos:</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Revistas que serán eliminadas -->
                        @if ($repositories->count())
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-book text-danger"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <h6 class="mb-1">Revistas asociadas</h6>
                                        <p class="mb-0 small text-muted">
                                            <span class="badge bg-danger">{{$repositories->count()}}</span>
                                            revista{{ $repositories->count() > 1 ? 's' : '' }} 
                                            {{ $repositories->count() > 1 ? 'serán eliminadas' : 'será eliminada' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Evaluaciones que requieren reasignación -->
                        @if ($evaluations->count())
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body py-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-clipboard-check text-warning"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <h6 class="mb-1">Evaluaciones pendientes</h6>
                                        <p class="mb-0 small text-muted">
                                            <span class="badge bg-warning">{{$evaluations->count()}}</span>
                                            evaluacion{{ $evaluations->count() > 1 ? 'es' : '' }} 
                                            {{ $evaluations->count() > 1 ? 'requieren' : 'requiere' }} nuevo responsable
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label small fw-semibold">Reasignar evaluaciones a:</label>
                                    <select name="newEvaluatorId" class="form-select form-select-sm" required>
                                        <option value="" disabled selected>Seleccionar nuevo evaluador</option>
                                        @foreach ($evaluators as $evaluator)
                                            <option value="{{$evaluator->id}}">
                                                <i class="fas fa-user"></i> {{$evaluator->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Mensaje de confirmación -->
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0 small">
                                ¿Estás seguro de que deseas eliminar este usuario?<br>
                                <strong>Esta acción es permanente y no se puede deshacer.</strong>
                            </p>
                        </div>
                    </div>

                    <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-light btn-sm rounded px-4" data-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm rounded px-4 shadow-sm">
                            <i class="fas fa-trash me-1"></i> Eliminar usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.modal-content {
    border-radius: 8px;
    overflow: hidden;
}

.modal-header {
    border-radius: 8px 8px 0 0;
}

.btn-close-white {
    filter: invert(1) grayscale(100%) brightness(200%);
}


.card {
    transition: all 0.2s ease;
}

.card:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
}

.modal.fade .modal-dialog {
    transform: scale(0.8);
    transition: transform 0.3s ease-out;
}

.modal.show .modal-dialog {
    transform: scale(1);
}

.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}

.form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn:hover {
    transform: translateY(-1px);
    transition: all 0.2s ease;
}
</style>
