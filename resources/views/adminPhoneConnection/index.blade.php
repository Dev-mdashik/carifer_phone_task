<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Phone Application</title>
     {{-- FONTS --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
     {{-- ICONS --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section class="app">
        {{-- <nav>
            <div class="flex">
                <h1 class="brand">Online <i class="">phone</i> Connection</h1>
                <p>Admin</p>
             </div>

            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <x-logout :value="__('logout')">
                        {{ __('Logout') }}
                    </x-logout>
                </form>
            </div>
        </nav> --}}
        <nav>
            <div class="wrapper">
                <h1 class="brand">Online <i class="fa-solid fa-phone-volume"></i> Connection</h1>
                @include('layouts.admin-navigation')
             </div>

            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <div class="user">
                        <h5>{{Auth()->user()->name}}</h5>
                        <h6>{{Auth()->user()->role}}</h6>
                    </div>
                    <x-logout :value="__('logout')">
                        {{ __('Logout') }}
                    </x-logout>
                </form>
            </div>
        </nav>

        <div class="message">
            @if(session()->has('success'))
                <div class="status">
                    <p class="success">{{session()->get('success')}}</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="status">
                    <p class="error">{{session()->get('error')}}</p>
                </div>
            @endif
        </div>
        <main>
            <section class="phone-connection admin">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Admin Home Page</div>
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
                                        <th>Address</th>
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
                                        <td>{{$phoConn->address}}</td>
                                        <td>{{$phoConn->email_address}}</td>
                                        <td>{{$phoConn->date}}</td>
                                        <td>{{$phoConn->time}}</td>
                                        <td class="{{$phoConn->status}}">{{$phoConn->status}}</td>
                                        <td>
                                            <form action="{{ route('admin.pho.update', $phoConn->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="actions">
                                                    @if($phoConn->status === 'pending')
                                                        <div class="form-control">
                                                            <button type="submit" name="status" value="approved">
                                                                Approve
                                                            </button>
                                                        </div>
                                                        <div class="form-control">
                                                            <button type="submit" name="status" value="rejected">
                                                                Reject
                                                            </button>
                                                        </div>
                                                    @else
                                                        <span>--</span>
                                                    @endif
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>No Data to Show</p>
                        @endif
                    </div>
                </div>
            </section>
        </main>
    </section>
</body>
</html>
