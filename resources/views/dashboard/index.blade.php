@extends('layouts/app')

@section('content')
<div class="container d-flex flex-column bg-light">
  <div>
      <h1 class="display-4 mb-4">Laba Rugi Report</h1>
  </div>
  <div class="mb-5 d-flex justify-content-between">
      <form method="POST" action="/dashboard" class="w-50">
        @csrf
          <div class="form-group row d-flex flex-row">
            <div class="w-25">
              <label for="fromDate" class="col-form-label">First Date</label>
              <input type="date" name="fromDate" class="form-control input-sm" id="fromDate" value="{{ old('fromDate') }}">
              @error('fromDate')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="w-25">
              <label for="toDate" class="col-form-label">End Date</label>
              <input type="date" name="toDate" class="form-control input-sm" id="toDate" value="{{ old('toDate') }}">
              @error('toDate')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="w-25 align-self-end">
              <button class="btn btn-outline-primary" type="submit">Submit</button>
            </div>
          </div>
      </form>
      <div class="align-self-end d-flex justify-content-end w-50">
        <a href="/chart"><button class="btn btn-outline-primary" type="button">Chart</button></a>
      </div>
  </div>
  @if ($fromDate != NULL && $toDate != NULL)
    <div class="d-flex align-items-center justify-content-center bg-secondary rounded text-light">
      <p class="my-2">Tanggal {{ $fromDate }} - {{ $toDate }}</p>
    </div>
    <hr>
    <div>
      <h4>Penghasilan Neto</h4>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Pendapatan Project: </p>
          <p>Rp. {{ number_format($total , 0, ',', '.') }}</p>
        </li>
      </ul>
      <div class="d-flex justify-content-between">
        <h5>Total Penghasilan Neto:</h5>
        <h5>Rp. {{ number_format($total , 0, ',', '.') }}</h5>
      </div>
    </div>
    <hr>
    <div>
      <h4>Beban Pokok Penjualan</h4>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Gaji Karyawan: </p>
          <p>Rp. {{ number_format($gajiKaryawan , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Pembelian material: </p>
          <p>Rp. {{ number_format($material , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>pembayaran lainnya untuk client: </p>
          <p>Rp. {{ number_format($pembayaranLainClient , 0, ',', '.') }}</p>
        </li>
      </ul>
      <div class="d-flex justify-content-between">
        <h5>Total Beban Pokok Penjualan:</h5>
        <h5>Rp. {{ number_format($bebanPokok , 0, ',', '.') }}</h5>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Laba Bruto:</h4>
      <h4>{{ number_format($labaBruto , 0, ',', '.') }}</h4>
    </div>
    <hr>
    <div>
      <h4>Beban Usaha</h4>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Penyusutan: </p>
          <p>Rp. {{ number_format($penyusutan , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Transportasi: </p>
          <p>Rp. {{ number_format($transportasi , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Pemeliharaan: </p>
          <p>Rp. {{ number_format($pemeliharaan , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Dokumen: </p>
          <p>Rp. {{ number_format($dokumen , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Listrik dan telepon: </p>
          <p>Rp. {{ number_format($listrikTelepon , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Kantor: </p>
          <p>Rp. {{ number_format($kantor , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Lain-lain: </p>
          <p>Rp. {{ number_format($pembayaranLain , 0, ',', '.') }}</p>
        </li>
      </ul>
      <div class="d-flex justify-content-between">
        <h5>Total Beban Usaha:</h5>
        <h5>Rp. {{ number_format($bebanUsaha  , 0, ',', '.') }}</h5>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Laba Usaha</h4>
      <h4>Rp. {{ number_format($labaUsaha  , 0, ',', '.') }}</h4>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Penghasilan (Beban) Lain-Lain</h4>
      <h4>-</h4>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Laba Sebelum Pajak Penghasilan</h4>
      <h4>Rp. {{ number_format($labaUsaha  , 0, ',', '.') }}</h4>
    </div>
    <hr>
    <div>
      <h4>Pajak Penghasilan</h4>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Kini: </p>
          <p>Rp. {{ number_format($pph , 0, ',', '.') }}</p>
        </li>
      </ul>
      <ul>
        <li class="d-flex justify-content-between">
          <p>Tangguhan: </p>
          <p>-</p>
        </li>
      </ul>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Laba Neto</h4>
      <h4>Rp. {{ number_format($labaUsaha - $pph  , 0, ',', '.') }}</h4>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <h4>Total Laba Komprehensif</h4>
      <h4>Rp. {{ number_format($labaUsaha - $pph  , 0, ',', '.') }}</h4>
    </div>
    <hr>
    {{-- <table class="table table-striped table-hover">
      <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Source</th>
          <th scope="col">Date</th>
          <th scope="col">Total</th>
          <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($outcomes as $outcome)
              <tr>
                  <th scope="row">{{ $outcomes->firstItem() + $loop->index }}</th>
                  <td>{{ $outcome->transaction_name }}</td>
                  <td>{{ $outcome->transaction_sources->transaction_source_name }}</td>
                  <td>{{ $outcome->date }}</td>    
                  <td>{{ $outcome->total }}</td>
                  <td class="d-flex">
                      <a class="me-2" href="/outcome/{{ $outcome->id }}/edit"><button type="button" class="btn btn-outline-success">Edit</button></a> 
                      <form action="/outcome/{{ $outcome->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-outline-danger show-alert-delete-box">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>  --}}
  @else
    <div>
      <h4>insert date to see the data</h4>
    </div>
  @endif
</div>

@endsection