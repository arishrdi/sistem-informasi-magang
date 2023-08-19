@extends('layouts.app')

@section('content')
{{-- <div class="row row-cols-1 row-cols-md-3 g-4 mb-5"> --}}
<div class="row"  data-masonry='{"percentPosition": true }'>


  {{-- @foreach ($data as $item)
  <p>{{$item->name}}</p>
  {{count($item->penugasan)}}
  @foreach ($item->penugasan as $user)
  <p>{{$user->user->name}}</p>
  @endforeach
  @endforeach --}}


  @foreach ($tugas as $item)
  {{-- <div class="col"> --}}
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$item->name}}</h5>
        <div class="card-subtitle text-muted mb-3">Batas Waktu: {{$item->batas_waktu}}</div>
        <p class="card-text">
          {{$item->deskripsi}}
        </p>
        @role('admin')
        <footer class="blockquote-footer">
          Untuk
          <cite title="Jumlah">{{count($item->penugasan)}} magang</cite>
        </footer>
        @endrole
        <a href="javascript:void(0)" class="card-link">Card link</a>
        <a href="javascript:void(0)" class="card-link">Another link</a>
      </div>
    </div>
  </div>
  @endforeach



  
</div>
@endsection