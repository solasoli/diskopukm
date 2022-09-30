<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DATA KOPUKM</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            margin-left: 10px;
            margin-right: 10px;
        }
        .top-right {
                position: absolute;
                right: 10px;
                top: 35px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            #map { height: 500px; }
            
    </style>
    <body>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e2/Lambang_Kabupaten_Bogor.png" width="60" height="80" alt="">
                  SISTEM INFORMASI DATA KOPUKM
              </a>
              @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                      <a href="{{ url('/home') }}">Home</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif
          </nav>

          {{-- search --}}
          <div class="container">
            <form>
                <div class="row">
                    <h4 class="mt-5">Pencarian Koperasi & UMKM</h4>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="exampleFormControlSelect1">Nama Usaha (sl2)</label>
                                <input type="text" class="form-control" placeholder="ketik nama usaha">
                            </div>
                                <div class="col">
                                <label for="exampleFormControlSelect1">Kategori Pencarian</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Pilih...</option>
                                    <option>Koperasi</option>
                                    <option>UMKM</option>
                                    </select>
                                </div>
                                <div class="col">
                                <label for="exampleFormControlSelect1">Kecamatan (sl2)</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Cibinong</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>
                                </div>
                                <div class="col">
                                <label for="exampleFormControlSelect2">Kelurahan )</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Cibinong</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>
                                </div>
                                <div class="col d-flex justify-content-center" style="margin-top:20px">
                                    <button class="btn btn-info w-100">Cari</button>
                                </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-info w-10 advanced mt-3">Pencarian lebih rinci</button>
                </div>
                
                <div class="row">
                        <div class="mt-3">
                            <label for="exampleFormControlSelect1" class="title-kbli" hidden >KBLI</label>
                            <input id="kbli-search" type="text" class="form-control w-50" hidden placeholder="ketik nomor KBLI" >
                        </div>
                        
                        <div class="mt-3" >
                        <label for="exampleFormControlSelect1" class="title-kbli" hidden>Alamat Lengkap</label>
                        <input type="text" class="form-control w-50" id="alamat-search" hidden placeholder="ketik alamat">
                        </div>
                </div>
        </form>
            
          </div>
          
          {{-- end of search --}}
          <div class="row mt-3">
            <div class="col">
                <div id="map" class="mb-3"></div>
            </div>
            <div class="col">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009-01-12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012-03-29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008-11-28</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012-12-02</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012-08-06</td>
                            <td>$137,500</td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010-10-14</td>
                            <td>$327,900</td>
                        </tr>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009-09-15</td>
                            <td>$205,500</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
          </div>
    </body>
    <script>
        const kbli = $("#kbli-search");
        $(".advanced").click(function(){
            $('#kbli-search').removeAttr("hidden");
            $('.title-kbli').removeAttr("hidden");
            $('.atau').removeAttr("hidden");
            $('#alamat-search').removeAttr("hidden");
        });

        var map = L.map('map').setView([-6.497641, 106.828224], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        $(document).ready(function () {
            $('#example').DataTable();
        });
      </script>
</html>