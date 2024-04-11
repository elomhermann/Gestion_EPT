@extends('layouts.app')

@extends('temple.layout')

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
                            <h2>Créer Un Temple</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('temple.index') }}"> Retour</a>
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

                <form action="{{ route('temple.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Nom du Temple:</strong>
                                <input type="text" name="nomtemple" class="form-control" placeholder="Nomtemple">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Adresse:</strong>
                                <input type="text" name="adresse" class="form-control" placeholder="adresse">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Budget Alloue:</strong>
                                <input class="form-control" style="height:30px" name="budgetalloue" placeholder="budgetalloue">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Date Debut:</strong>
                                <input class="form-control" type="date" style="height:30px" name="datedebut" placeholder="datedebut">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Date Fin:</strong>
                                <input class="form-control" type="date" style="height:30px" name="datefin" placeholder="datefin">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Region:</strong>
                                <input class="form-control" style="height:30px" name="region" placeholder="region">
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
