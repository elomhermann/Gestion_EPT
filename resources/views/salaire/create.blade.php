@extends('layouts.app')

@extends('salaire.layout')

@section('content')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->

      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Créer Un Salaire</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('salaire.index') }}"> Retour</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('salaire.store') }}" method="POST">
                    @csrf

                     <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Nom:</strong>
                                <input class="form-control" style="height:40px" name="nom" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Prenom:</strong>
                                <input class="form-control" style="height:40px" name="prenom" placeholder="Prenom">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Poste:</strong>
                                <input class="form-control" style="height:40px" name="poste" placeholder="Poste">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Salaire:</strong>
                                <input class="form-control" type="number" style="height:40px" name="salaire" placeholder="Salaire">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Mois:</strong>
                                <select class="form-control" id="mois" name="mois" required>
                                    <option value="">choisissez un mois</option>
                                    <option value="Janvier">Janvier</option>
                                    <option value="Fevrier">Fevrier</option>
                                    <option value="Mars">Mars</option>
                                    <option value="Avril">Avril</option>
                                    <option value="Mai">Mai</option>
                                    <option value="Juin">Juin</option>
                                    <option value="Juillet">Juillet</option>
                                    <option value="Août">Août</option>
                                    <option value="Septembre">Septembre</option>
                                    <option value="Octobre">Octobre</option>
                                    <option value="Novembre">Novembre</option>
                                    <option value="Decembre">Decembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a class="btn btn-primary"><button type="submit">Enregistrer</button></a>
                        </div>
                    </div>

                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="../admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../admin/js/sidebarmenu.js"></script>
  <script src="../admin/js/app.min.js"></script>
  <script src="../admin/libs/simplebar/dist/simplebar.js"></script>
</body>

@endsection
