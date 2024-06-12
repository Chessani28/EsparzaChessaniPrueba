@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Botones para abrir los modales -->
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#altaLibrosModal">
                        Alta de libros
                    </button>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#altaAutoresModal">
                        Alta de autores de libros
                    </button>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#altaCategoriasModal">
                        Alta de categorías
                    </button>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#altaEditorialesModal">
                        Alta de editoriales
                    </button>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#generateTicketModal">
                        Generación de ticket (préstamo de libro a cliente)
                    </button>
                    <!-- Modales -->
                    <!-- Modal Alta de Libros -->
                    <div class="modal fade" id="altaLibrosModal" tabindex="-1" role="dialog" aria-labelledby="altaLibrosModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="altaLibrosModalLabel">Alta de Libros</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="altaLibrosForm" method="POST" action="{{ route('libros.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Título</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Categoría</label>
                                            <select class="form-control" id="category_id" name="category_id" required>
                                                <option value="">Selecciona una categoría</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Cantidad</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editorials_id">Editorial</label>
                                            <select class="form-control" id="editorials_id" name="editorials_id" required>
                                                <option value="">Selecciona una editorial</option>
                                                @foreach($editoriales as $editorial)
                                                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- created_at, updated_at, and deleted_at will be handled by Laravel automatically -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" form="altaLibrosForm">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Alta de Autores de Libros -->
                    <div class="modal fade" id="altaAutoresModal" tabindex="-1" role="dialog" aria-labelledby="altaAutoresModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="altaAutoresModalLabel">Alta de Autores de Libros</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="altaAutoresForm" method="POST" action="{{ route('autores.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" form="altaAutoresForm">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Alta de Categorías -->
                    <div class="modal fade" id="altaCategoriasModal" tabindex="-1" role="dialog" aria-labelledby="altaCategoriasModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="altaCategoriasModalLabel">Alta de Categorías</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="altaCategoriasForm" method="POST" action="{{ route('categorias.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" form="altaCategoriasForm">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>


                <!-- Modal Alta de Editoriales -->
                <div class="modal fade" id="altaEditorialesModal" tabindex="-1" role="dialog" aria-labelledby="altaEditorialesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="altaEditorialesModalLabel">Alta de Editoriales</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="altaEditorialesForm" method="POST" action="{{ route('editoriales.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" form="altaEditorialesForm">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Modal Generación de Ticket -->
 <!-- Modal -->
 <div class="modal fade" id="generateTicketModal" tabindex="-1" role="dialog" aria-labelledby="generateTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="generateTicketModalLabel">Generación de tickets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select class="form-control" id="client_id" name="client_id">
                            <option value="">Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_id">Libro</label>
                        <select class="form-control" id="book_id" name="book_id">
                            <option value="">Selecciona un libro</option>
                            @foreach($libros as $libro)
                                <option value="{{ $libro->id }}">{{ $libro->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desired">Fecha Deseada</label>
                        <input type="date" class="form-control" id="desired" name="desired">
                    </div>
                    <div class="form-group">
                        <label for="start_date">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">Fecha de Fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Generar Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
