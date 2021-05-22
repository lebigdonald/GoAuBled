@extends('admin.layout')

@section('admin_content')

  <div class="col-md-12">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
  </div>

  <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Colis</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped admin__table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="admin__table-tr">
                  <th class="text-center admin__table-th">N°</th>
                  <th class="text-center admin__table-th">Depart</th>
                  <th class="text-center admin__table-th">Arrivee</th>
                  <th class="text-center admin__table-th">Depart le</th>
                  <th class="text-center admin__table-th">nom du colis</th>
                  <th class="text-center admin__table-th">poids du coli</th>
                  <th class="text-center admin__table-th">prix</th>
                  <th class="text-center admin__table-th">valider?</th>
                  <th class="text-center admin__table-th">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($colis as $index => $coli)
                    <tr class="admin__table-tr">
                      <td class="text-center admin__table-td">{{ $coli->id }}</td>
                      <td class="text-center admin__table-td">{{ $coli->from }}</td>
                      <td class="text-center admin__table-td">{{ $coli->to }}</td>
                      <td class="text-center admin__table-td">{{ $coli->getDateToAttribute() }}</td>
                      <td class="text-center admin__table-td">{{ $coli->colis_name }}</td>
                      <td class="text-center admin__table-td">{{ $coli->kilo }}</td>
                      <td class="text-center admin__table-td">{{ $coli->prix }}</td>
                      <td class="text-center admin__table-td">{{ $coli->publish == 0 ? 'non':'oui' }}</td>
                      <td class="text-center admin__table-td">
                        <a href="{{ route('admin.coli.validate',$coli->id) }}" class="btn btn-success">valider</a>
                        <a href="{{ route('admin.coli.reject',$coli->id) }}" class="btn btn-danger">retirer  </a>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $colis->links() }}
          </div>
        </div>
      </div>

    </div>

@endsection