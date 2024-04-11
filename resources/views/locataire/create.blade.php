@extends('layouts.app')

@extends('propriete.layout')

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
                            <h2>Créer Un Locataire</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('locataire.index') }}"> Retour</a>
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

                <form action="{{ route('locataire.store') }}" method="POST">
                    @csrf

                     <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Nom:</strong>
                                <input type="text" name="nom" class="form-control" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Prenom:</strong>
                                <input class="form-control" style="height:30px" name="prenom" placeholder="Prenom">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Adresse:</strong>
                                <input class="form-control" style="height:30px" name="adresse" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Telephone:</strong>
                                <input class="form-control" type="number" style="height:30px" name="telephone" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input class="form-control" style="height:30px" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Contrat de location:</strong>
                                <input class="form-control" style="height:30px" name="contratlocation" placeholder="Contratlocation">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Paroisse:</strong>
                                <select class="form-control" name="paroisse[]" id="paroisse" multiple required>
                                    <option value="">Sélectionnez une Paroisse</option>
                                    @foreach ($paroisse as $paroisse)
                                        <option value="{{ $paroisse->paroisse }}">{{ $paroisse->paroisse }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <a class="btn btn-primary"><button type="submit">Enregistrer</button></a>
                        </div>
                    </div>

                    <script>
                        new MultiSelectTag('paroisse')  // id
                    </script>

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
