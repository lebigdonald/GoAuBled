@extends('user.dashboard')

@section('dashboard_title') Factures @stop

@section('dashbord_content')

    <!-- Content Row -->
    <div class="row mt-4">

        @for ($i = 1; $i <= 4; $i++)

        <div class="card mt-4 m-2 border rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="">
                    FACTURE N° {{ $i }}
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                    <thead>
                        <tr>
                            <th>PRODUIT</th>
                            <th>SOMMES</th>
                            <th>CRÉÉ LE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Nombre de kIlos
                                <span class="badge badge-secondary">20</span>
                                <br>
                                <p class="text-secondary">
                                Prix du Kilos : 20 Euro
                                </p>
                            </td>
                            <td>
                                20 * 20 = 20 Euro
                            </td>
                            <td>
                                03/04/2020
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            
        @endfor
    
    </div>


@endsection