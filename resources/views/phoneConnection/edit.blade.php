@extends('layouts.app')
@section('content')

<section class="phone-connection">
    <div class="card">
        <div class="card-header">
            <div class="title">Phone Updation</div>
            <div class="back-route"><a href="{{ route('pho.home') }}"><strong><i class="fa-solid fa-backward"></i></strong> Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('pho.update', $phoneConn->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="wrapper">
                    <div class="box box-1">
                        <div class="form-control">
                            <label for="firstname">First Name<span>*</span></label>
                            <input id="firstname" type="text" name="firstname" placeholder="Enter the First Name" value="{{ $phoneConn->firstname }}" />
                                @if($errors->has('firstname'))
                                    <p class="text-orange-700">{{$errors->first('firstname')}}</p>
                                @endif
                        </div>
                        <div class="form-control">
                            <label for="lastname">Last Name<span>*</span></label>
                            <input id="lastname" type="text" name="lastname" placeholder="Enter the Last Name" value="{{ $phoneConn->lastname }}" />
                                @if($errors->has('lastname'))
                                    <p class="text-orange-700">{{$errors->first('lastname')}}</p>
                                @endif
                        </div>
                        <div class="form-control">
                            <label for="email_address">Email Address<span>*</span></label>
                            <input id="email_address" type="email" name="email_address" placeholder="Enter the Email Address" value="{{ $phoneConn->email_address }}" />
                                @if($errors->has('email_address'))
                                    <p class="text-orange-700">{{$errors->first('email_address')}}</p>
                                @endif
                        </div>
                    </div>
                    <div class="box box-2">
                        <div class="form-control">
                            <label for="date_of_birth">Date of Birth<span>*</span></label>
                            <input id="date_of_birth" type="date" name="date_of_birth" placeholder="Enter the Date of Birth" value="{{ $phoneConn->date_of_birth }}" />
                            {{-- <input id="date_of_birth" type="datetime-local" name="date_of_birth" placeholder="Enter the Date of Birth" value="{{ old('date_of_birth') }}" /> --}}
                                @if($errors->has('date_of_birth'))
                                    <p class="text-orange-700">{{$errors->first('date_of_birth')}}</p>
                                @endif
                        </div>
                        <div class="form-control">
                            <label for="address">Address<span>*</span></label>
                            <textarea id="address" name="address" placeholder="Enter the Email Address">{{ $phoneConn->address }} </textarea>
                                @if($errors->has('address'))
                                    <p class="text-orange-700">{{$errors->first('address')}}</p>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="save-btn">
                    <x-button :value=" __('submit') ">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
