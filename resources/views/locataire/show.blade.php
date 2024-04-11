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
                            <h2> Voir Un Locataire</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('locataire.index') }}"> Retour</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nom:</strong>
                            {{ $locataire->nom }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prenom:</strong>
                            {{ $locataire->prenom }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Adresse:</strong>
                            {{ $locataire->adresse }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Telephone:</strong>
                            {{ $locataire->telephone }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $locataire->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Contrat de location:</strong>
                            {{ $locataire->contratlocation }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Paroisse:</strong>
                            {{ $locataire->paroisse }}
                        </div>
                    </div>
                </div>

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
