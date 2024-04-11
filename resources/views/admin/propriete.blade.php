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
          <input type="search" name="search" id="search" placeholder="Rechercher une propriete" class="form-control">
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
                            <a class="btn btn-success" href="{{ route('propriete.create') }}">Créer Une Propriete</a>
                            <a class="btn btn-success" href="{{ route('export-propriete') }}">Export Propriete</a>
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
                        <th>Paroisse</th>
                        <th>Adresse</th>
                        <th>Propriete</th>
                        <th>Valeur locative</th>
                        <th width="280px">Action</th>
                    </tr>
                    
                    <tbody class="alldata">
                    
                      @foreach ($propriete as $propriete)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $propriete->paroisse }}</td>
                        <td>{{ $propriete->adresse }}</td>
                        <td>{{ $propriete->propriete }}</td>
                        <td>{{ $propriete->valeurlocative }}</td>
                        <td>
                            <form action="{{ route('propriete.destroy',$propriete->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('propriete.show',$propriete->id) }}">Voir</a>

                                <a class="btn btn-primary" href="{{ route('propriete.edit',$propriete->id) }}">Modifier</a>

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
        url:'{{URL::to('searchpropriete')}}',
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
