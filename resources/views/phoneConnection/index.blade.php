@extends('layouts.app')
@section('content')


<section class="phone-connection">
    <div class="card">
        <div class="card-header">
            <div class="title">Customer Home Page</div>
            <div class="back-route"><a href="{{ route('pho.create') }}">Create</a></div>
        </div>
        <div class="card-body">
            @if(!$phoConnDatas->isEmpty())
            <div class="datatable">
                <table>
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Date of Birth</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phoConnDatas as $key => $phoConn)
                        <tr>
                            <td> <b>{{$key + 1}}</b></td>
                            <td>{{$phoConn->firstname}}</td>
                            <td>{{$phoConn->lastname}}</td>
                            <td>{{$phoConn->date_of_birth}}</td>
                            <td>{{$phoConn->email_address}}</td>
                            <td>{{$phoConn->date}}</td>
                            <td>{{$phoConn->time}}</td>
                            <td class="{{$phoConn->status}}">{{$phoConn->status}}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('pho.edit', $phoConn->id) }}">
                                        <button class="edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                    <form action="{{ route('pho.delete', $phoConn->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                            <button class="delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="nodata">No Data to Show</p>
            @endif
        </div>
    </div>
</section>
@endsection
