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
                  <h4 class="card-title mb-2">Farm Products</h4>
                  <p class="mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                        </svg>
                    List of Farm Products
                  </p>
               </div>
               <button class="btn btn-success mb-2 float-start" id="createfarmtype">
                        <i class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                        </svg>
                        </i>
                        <span class="item-name">Add</span>
                    </button>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                    <table id="basic-table" class="table mb-0" role="grid">
                        <thead>
                            <tr class="table-info">
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php $count = 1;  @endphp
                            @foreach ($farmproduct as $fp)
                                <tr class="{{ $fp->id }}">
                                    <th scope="row">{{ $count }}</th>
                                    <td data-target='product'>{{ ucwords($fp->description) }}</td>
                                    <td data-target='farmtype'>{{ ucwords($fp->FarmType->description) }}</td>
                                    <td>
                                        <button class="btn btn-success" data-id='{{ $fp->id }}' data-role='update_product' title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        </button>
                                        <button class="btn btn-danger"  data-id='{{ $fp->id }}' data-role='delete_product' title="Delete">
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
@extends('modals.create-farmtype')
@extends('modals.delete-info')