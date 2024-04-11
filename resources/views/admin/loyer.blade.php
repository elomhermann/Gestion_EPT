@extends('layouts.app')


@section('content')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  search Start -->

      <div class="container">
        <div class="search">
          <input type="search" name="search" id="search" placeholder="Rechercher un budget" class="form-control">
        </div>
      </div>

      <!--  search End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('loyer.create') }}"> Créer Un Loyer</a>
                            <a class="btn btn-success" href="{{ route('export-loyer') }}">Export Loyer</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Propriete</th>
                        <th>Montant mensuel</th>
                        <th>Montant annuel</th>
                        <th>Date d'échéance</th>
                        <th>Date de paiement</th>
                        <th>Methode de paiement</th>
                        <th>Statut</th>
                        <th>Paroisse</th>
                        <th width="280px">Action</th>
                    </tr>

                    <tbody class="alldata">
                      
                    @foreach ($loyer as $loyer)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $loyer->propriete }}</td>
                        <td>{{ $loyer->montantmensuel }}</td>
                        <td>{{ $loyer->montantannuel }}</td>
                        <td>{{ $loyer->datedecheance }}</td>
                        <td>{{ $loyer->datepaiement }}</td>
                        <td>{{ $loyer->methodepaiement }}</td>
                        <td>{{ $loyer->statut }}</td>
                        <td>{{ $loyer->paroisse }}</td>
                        <td>
                            <form action="{{ route('loyer.destroy',$loyer->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('loyer.show',$loyer->id) }}">Voir</a>

                                <a class="btn btn-primary" href="{{ route('loyer.edit',$loyer->id) }}">Modifier</a>

                                @csrf
                                @method('DELETE')

                                <a class="btn btn-danger"><button type="submit">Effacer</button></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>

                  <tbody id="Content" class="searchdata"></tbody>

                </table>

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

  <script type="text/javascript">
    $('#search').on('keyup', function()
    {
      $value=$(this).val();

      if($value)
      {
        $('.alldata').hide();
        $('.searchdata').show();
      }
      
      else
      {
        $('.alldata').show();
        $('.searchdata').hide();
      }

      $.ajax({

        type: 'get',
        url:'{{URL::to('searchloyer')}}',
        data:{'search':$value},

        success: function(data) 
        {
          console.log(data);
          $('#Content').html(data);
        }
      });
    })
  </script>

</body>

@endsection
