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
                            <a class="btn btn-success" href="{{ route('maison.create') }}"> Créer Une Maison</a>
                            <a class="btn btn-success" href="{{ route('export-maison') }}">Export Maison</a>
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
                        <th>Adresse</th>
                        <th>Description</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Budgetalloue</th>
                        <th>Suivi</th>
                        <th>Paroisse</th>
                        <th width="280px">Action</th>
                    </tr>

                    <tbody class="alldata">
                      
                    @foreach ($maison as $maison)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $maison->adresse }}</td>
                        <td>{{ $maison->description }}</td>
                        <td>{{ $maison->datedebut }}</td>
                        <td>{{ $maison->datefin }}</td>
                        <td>{{ $maison->budgetalloue }}</td>
                        <td>{{ $maison->suivi }}</td>
                        <td>{{ $maison->paroisse }}</td>
                        <td>
                            <form action="{{ route('maison.destroy',$maison->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('maison.show',$maison->id) }}">Voir</a>

                                <a class="btn btn-primary" href="{{ route('maison.edit',$maison->id) }}">Modifier</a>

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
        url:'{{URL::to('searchmaison')}}',
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
