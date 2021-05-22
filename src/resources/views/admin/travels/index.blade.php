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
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Voyages</h6>
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
                  <th class="text-center admin__table-th">Nombre de Kilos</th>
                  <th class="text-center admin__table-th">Biellet d avion</th>
                  <th class="text-center admin__table-th">valider?</th>
                  <th class="text-center admin__table-th">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($travels as $index => $travel)
                    <tr class="admin__table-tr">
                      <td class="text-center admin__table-td">{{ $travel->id }}</td>
                      <td class="text-center admin__table-td">{{ $travel->from }}</td>
                      <td class="text-center admin__table-td">{{ $travel->to }}</td>
                      <td class="text-center admin__table-td">{{ $travel->getDateToAttribute() }}</td>
                      <td class="text-center admin__table-td">{{ $travel->kilo }}</td>
                      <td class="text-center admin__table-td"><show-images colis-name="{{ $travel->from }}" :images="{{ $travel->images }}"></show-images></td>
                      <td class="text-center admin__table-td">{{ $travel->publish == 0 ? 'non':'oui' }}</td>
                      <td class="text-center admin__table-td">
                        <a href="{{ route('admin.travel.validate',$travel->id) }}" class="btn btn-success">valider</a>
                        <a href="{{ route('admin.travel.reject',$travel->id) }}" class="btn btn-danger">retirer  </a>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $travels->links() }}
          </div>
        </div>
      </div>

    </div>

@endsection
<script>
    import ShowImages from "../../../js/components/utilities/cards/showImages";
    export default {
        components: {ShowImages}
    }
</script>
