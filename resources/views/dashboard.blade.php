@extends('layouts.app')


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
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">BIENVENUE A DRIVIN</p>
          <div class="row">
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../admin/images/products/jeune-femme afro.avif" class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">jeune-femme afro</h6>
                  <div class="d-flex align-items-center justify-content-between">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../admin/images/products/chauffeur taxi.avif" class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">Drvin</h6>
                  <div class="d-flex align-items-center justify-content-between">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../admin/images/products/cones circulation.avif" class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">cones circulation</h6>
                  <div class="d-flex align-items-center justify-content-between">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="../admin/images/products/vue perspective.avif" class="card-img-top rounded-0" alt="..."></a>
                  <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">vue perspective</h6>
                  <div class="d-flex align-items-center justify-content-between">

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
  <script src="../admin/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../admin/libs/simplebar/dist/simplebar.js"></script>
  <script src="../admin/js/dashboard.js"></script>
</body>

@endsection
