@php
   use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
                <div class="overflow-auto">
                <div class="card-header d-flex justify-content-between flex-wrap">
               <div class="header-title">
                  <h4 class="card-title mb-2">Pending Sellers</h4>
                  <p class="mb-0">
                    <svg class="text-danger ms-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                    </svg>
                    Account Under Review
                  </p>
               </div>
            </div>

               <div class="card-body p-0">
               <div class="table-responsive mt-4">
               <table id="basic-table" class="table mb-0" role="grid">
                        <thead>
                            <tr class="table-info">
                            <th scope="col">#</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Municipality</th>
                            <th scope="col">Barangay</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php $count = 1;  @endphp
                            @foreach ($pendingsellers as $pen)
                                <tr class='{{ $pen->id }}'>
                                    <td data-target='accountid' hidden>{{ $aes->encrypt($pen->seller_id) }}</td>
                                    <th scope="row">{{ $count }}</th>
                                    <td data-target="seller_name"><img src="{{asset('storage/images/client/photo/'. $pen->profile_picture)}}" alt="User-Profile" class=" theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                        <span class='ms-3'>{{ ucwords($pen->last_name) }}, {{ ucwords($pen->first_name) }} {{ ucwords($pen->middle_name) }}</span>
                                        <svg class="text-danger ms-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                                            <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                                        </svg>
                                    </td>    
                                    
                                    <td>{{ ucwords(strtolower($pen->Municipality->citymunDesc)) }}</td>
                                    <td>{{ ucwords(strtolower($pen->Barangay->brgyDesc)) }}</td>
                                    <td>
                                        <form class="d-inline" method="GET" action="{{ route('pending.seller') }}" data-toggle="validator" enctype="multipart/form-data">
                                        @csrf
                                            <input type="text" class="form-control" name='seller_id' value='{{ $aes->encrypt($pen->id) }}' hidden>
                                            <button class="btn btn-success" title="View" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                            </button>
                                        </form>
                                        <button class="btn btn-danger" data-id='{{ $pen->id }}' data-role='delete_seller' title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @php $count += 1;  @endphp
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
@extends('modals.delete-info')