@extends('layouts.app')

@section('content')
<div class="row"  data-masonry='{"percentPosition": true }'>

  @foreach ($tugas as $item)
  <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$item->name}}</h5>
        <div class="card-subtitle text-muted mb-3">Batas Waktu: {{$item->batas_waktu}}</div>
        <p class="card-text">
          {{$item->deskripsi}}
        </p>
        <footer class="blockquote-footer">
          Untuk
          <cite title="Jumlah">{{count($item->penugasan)}} magang</cite>
        </footer>
        <a href="javascript:void(0)" class="card-link">Card link</a>
        <a href="javascript:void(0)" class="card-link">Another link</a>
      </div>
    </div>
  </div>
  @endforeach



  
</div>
@endsection