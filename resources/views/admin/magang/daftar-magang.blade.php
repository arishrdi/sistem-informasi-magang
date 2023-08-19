@extends('layouts.app')

@section('content')




<div class="card">
  <h5 class="card-header">Daftar Magang</h5>
  <div class="table-responsive text-nowrap" style="overflow: visible">
    <table class="table table-striped">
      <caption class="ms-4">
        Total ({{$total}})
      </caption>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Instansi</th>
          <th>Mulai Magang</th>
          <th>Selesai Magang</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($magang as $i => $item)
        <tr>
          <td>{{$i + 1}}</td>
          <td>
            <strong>{{$item->name}}</strong>
          </td>
          <td>{{$item->magang->instansi}}</td>
          <td>{{$item->magang->mulai_magang}}</td>
          <td>{{$item->magang->selesai_magang}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <form action="{{route('magang.terima', ['user' => $item->id])}}" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit"><i class="bx bx-edit-alt me-1"></i> Terima</button>
                </form>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Nonaktifkan</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $magang->links() }}
  </div>
</div>
@endsection