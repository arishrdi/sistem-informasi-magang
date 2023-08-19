@extends('layouts.app')

@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Tambah Tugas</h5>
    <small class="text-muted float-end">Default label</small>
  </div>
  <div class="card-body">
    <form action="{{route('tugas.store')}}" method="POST">
      @method("POST")
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="judul">Judul</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="judul" placeholder="Masukkan judul tugas" name="name">
          @error('name')
          <div class="form-text text-danger">
            *{{$message}}
          </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="batas">Batas Waktu</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="batas" placeholder="Masukkan batas waktu" name="batas_waktu">
          @error('batas_waktu')
          <div class="form-text text-danger">
            *{{$message}}
          </div>
          @enderror
        </div>
      </div>

      {{-- <div class="mb-3">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Bagikan ke semua</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Desain Grafis</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Programmer</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Admin</label>
        </div>
      </div> --}}

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="detail">Tugas</label>
        <div class="col-sm-10">
          <textarea id="detail" class="form-control" placeholder="Deskripsikan tugas" name="deskripsi"
            aria-label="Hi, Do you have a moment to talk Joe?" rows="5"
            aria-describedby="basic-icon-default-message2"></textarea>
          @error('deskripsi')
          <div class="form-text text-danger">
            *{{$message}}
          </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="detail">Kepada</label>
        <div class="col-sm-10">
          <select class="selectpicker w-full" multiple name="user_id[]">
            @foreach ($users as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
          @error('user_id')
          <div class="form-text text-danger">
            *{{$message}}
          </div>
          @enderror
        </div>
      </div>

      <div class="row justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection