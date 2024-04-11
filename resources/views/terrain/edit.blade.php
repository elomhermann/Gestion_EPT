@extends('layouts.app')

@extends('terrain.layout')

@section('content')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
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
                            <h2>Modifier Un Terrain</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('terrain.index') }}"> Retour</a>
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

                <form action="{{ route('terrain.update',$terrain->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Adresse:</strong>
                                <input type="text" name="adresse" value="{{ $terrain->adresse }}" class="form-control" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Superficie:</strong>
                                <input type="text" name="superficie" value="{{ $terrain->superficie }}" class="form-control" placeholder="Superficie">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Prix d'achat:</strong>
                                <textarea class="form-control" style="height:30px" name="prixdachat" placeholder="Prixdachat">{{ $terrain->prixdachat }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Statut:</strong>
                                <textarea class="form-control" style="height:30px" name="statut" placeholder="Statut">{{ $terrain->statut }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Documentation:</strong>
                                <textarea class="form-control" style="height:30px" name="documentation" placeholder="Documentation">{{ $terrain->documentation }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Date d'achat:</strong>
                                <textarea class="form-control" style="height:30px" name="datedachat" placeholder="Datedachat">{{ $terrain->datedachat }}</textarea>
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
