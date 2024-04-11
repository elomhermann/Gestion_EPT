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
                            <h2>Créer Un Loyer</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('loyer.index') }}"> Retour</a>
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

                <form action="{{ route('loyer.store') }}" method="POST">
                    @csrf

                     <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Propriete:</strong>
                                <select class="form-control" name="propriete[]" id="propriete" multiple required>
                                    <option value="">Sélectionnez une Propriete</option>
                                    @foreach ($propriete as $propriete)
                                        <option value="{{ $propriete->propriete }}">{{ $propriete->propriete }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Montant mensuel:</strong>
                                <input class="form-control" style="height:40px" name="montantmensuel" placeholder="Montantmensuel">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Montant annuel:</strong>
                                <input class="form-control" style="height:40px" name="montantannuel" placeholder="Montantannuel">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Date d'échéance:</strong>
                                <input class="form-control" type="date" style="height:40px" name="datedecheance" placeholder="Datedecheance">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Date de paiement:</strong>
                                <input class="form-control" type="date" style="height:40px" name="datepaiement" placeholder="Datepaiement">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Methode de paiement:</strong>
                                <select class="form-control" id="methodepaiement" name="methodepaiement" required>
                                    <option value="">select paiement</option>
                                    <option value="espèces">Espèces</option>
                                    <option value="virement">Virement</option>
                                    <option value="chèque">Chèque</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Statut:</strong>
                                <select class="form-control" id="statut" name="statut" required>
                                    <option value="">select statut</option>
                                    <option value="payé">Payé</option>
                                    <option value="en attente">En attente</option>
                                    <option value="en retard">En retard</option>
                                </select>
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
                        new MultiSelectTag('propriete')  // id
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
